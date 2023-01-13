<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Role;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Hash;
use App\Usermeta;
use Auth;

class RegisterController extends controller
{
    /**
     * register function.
     * @return @response
     */
    public function user_register(Request $request)
    {
        //register validation
        $validator = $this->register_validations($request);
        if ($validator->fails()) {
            return error_response($validator->errors(), 'Validation error');
        }
        $mbl_exist = DB::table('users')->where('phone', $request->phone)->first();
        if (!empty($mbl_exist)) {
            return error_response(['message' => 'Phone number already exist', 'Validation error']);
        }

        $slug_name = Str::slug($request->name);

        $slug_generate = User::where('slug', $slug_name)->first();

        if ($slug_generate) {
            $slug = $slug_name . Str::random(5);
        } else {
            $slug = $slug_name;
        }

        $user = new User();
        $user->role_id = 2; //Agent
        $user->name = $request->name;
        $user->slug = $slug;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        if ($request->preview) {
            $user->avatar = $request->preview;
        } else {
            $user->avatar = 'https://ui-avatars.com/api/?size=250&background=random&name=' . $request->name;
        }
        $user->save();

        $usermeta = new Usermeta();
        $usermeta->user_id = $user->id;
        $usermeta->type = 'credit';
        $usermeta->content = 0;
        $usermeta->save();

        $data = [
            'address' => null,
            'phone' => $user->phone,
            'description' => null,
            'facebook' => null,
            'twitter' => null,
            'youtube' => null,
            'pinterest' => null,
            'linkedin' => null,
            'instagram' => null,
            'whatsapp' => null,
            'service_area' => null,
            'tax_number' => null,
            'license' => null
        ];

        $usermeta = new Usermeta();
        $usermeta->user_id = $user->id;
        $usermeta->type = 'content';
        $usermeta->content = json_encode($data);
        $usermeta->save();
        // $user->encrypt_id = encrypt($user->user_id);

        $user = $this->otp_processing($user, $request);

        return $user;
    }

    /**
     * Register validations.
     * @return @array
     */
    public function register_validations($request)
    {
        return  \Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
            'phone' => 'required|starts_with:+966|min:13|max:13|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'term_condition' => 'required'
        ], [
            'name.required' => 'Name is required',
            'name.regex' => 'Please provide correct name',
            'name.max' => 'Name is too long must be within 255 words',
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number must be numeric',
            'phone.phone' => 'Phone number is not corrects',
            'email.required' => 'Email is required',
            'email.email' => 'PLease enter valid email address',
            'email.unique' => 'Email must be unique',
            'password.required' => 'Password is required',
            'password.min' => 'Require at least 6 characters',
            'password.confirmed' => 'Password mismatch',
            'term_condition.required' => 'Term condition is required',

        ]);
    }

    /**
     *verify otp page
     * @return @view.
     */
    public function Verify_OTP_page($id)
    {
        $user_data = DB::table('users')
            ->where('id', decrypt($id))
            // ->where('is_verified', 0)
            ->first();
        if(!$user_data){
           abort(404);
        }
        //time diff for otp send to page reload
        $diff = Carbon::parse($user_data->updated_at)->diffInSeconds(\Carbon\Carbon::now());
        $time = 60 - $diff;
        //if time is in negative of greater then otp code
        if ($time < 0) {
            $time = 0;
        }
        return view('theme::newlayouts.pages.otp', compact('user_data', 'time'));
    }

    /**
     * Send otp using api
     * @return @response
     */
    public function send_otp(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'phone' => 'required|starts_with:+966|min:13|max:13',
        ]);
        if ($validator->fails())
        {
            return error_response('', $validator->errors()->first());
        }
            
        
        // $otp = rand(1000, 9999);
        $otp = 1234;
        $user = User::where('phone', $request->phone)->first();
        if($user){
            $user->otp = $otp;
            $user->updated_at = Carbon::now();
            $user->save();

            $diff = Carbon::parse($user->updated_at)->diffInSeconds(\Carbon\Carbon::now());
            $response['time'] = 60 - $diff;
            //if time is in negative of greater then otp code
            if ($response['time'] < 0) {
                $response['time'] = 0;
            }
            $response['otp'] = $otp;
            return $response;
        } else {
            return error_response([], "User doesn't exist");
        }
        // DB::table('users')->where('phone', $request->mobile)
        //     ->update(['otp' => $otp, 'updated_at' => Carbon::now()]);
        // $main_url = config('api_constants.sms_url');
        // $sms_username = config('api_constants.sms_username');
        // $sms_password = config('api_constants.sms_password');
        // $otp =  $otp; 
        // $otp_message = urlencode($otp);
        // $updated_mobile = ltrim($mobile, '0');
        // $url = $main_url . 'user=' . $sms_username . '&' . 'pwd=' . $sms_password . '&' . 'senderid=SMSAlert&mobileno=966' . $updated_mobile . '&msgtext=' . $otp_message . '&priority=High&CountryCode=ALL';
        // $response = '{"header_code":200,"body":"1355541590,966504454685,Send Successful\r\n"}';
        // $response = json_decode($response, true);
        // if (env("APP_ENV") == "Production") {
        //     //send otp using curl
        //     $response = @curl_request($url, '', false, '');
        // }
        // //time for countdown
        // $user_data = DB::table('users')->where('phone', $request->mobile)
        //     ->where('is_verified', '0')
        //     ->first();
        //time diff for otp send to page reload
        
    }

    /**
     *verify otp which is send to customer monile
     * @return @response.
     */
    public function verify_otp(Request $request)
    {
        $otp = $request->otp;
        $validator = \Validator::make($request->all(), [
            'phone' => 'required|starts_with:+966|min:13|max:13',
        ]);
        if ($validator->fails())
        {
            return error_response('', $validator->errors()->first());
        }
            
        
        if (!empty($otp)) {
            $user = User::where('phone', $request->phone)
                ->where('otp', $otp)  
                ->first();
            
            if(!$user) {
                return error_response(['otp' => 'OTP was not correct'], '');
            }
            if(!($user->updated_at > Carbon::now()->subMinute(1.01))){
                return error_response(['otp' => 'OTP has been expired'], '');
            }
            
            
            $token = $user->createToken($user->id)->plainTextToken;
            if($token){
                $user->otp = "";
                $user->save();
                Auth::login($user);
            }
            return success_response(['token' => $token, 'user' => $user], 'Authenticated successfully');
        }
    }

    /**
     * updating phone page
     * @return @view
     */
    public function Update_phone($id)
    {
        $user_data = DB::table('users')
            ->where('id', decrypt($id))
            ->where('is_verified', 0)
            ->first();
        return view('theme::newlayouts.pages.phone_no', compact('user_data'));
    }

    /**
     * updating phone
     * @return @response
     */
    public function modify_phone(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'phone' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return error_response($validator->errors(), 'Validation error');
        }
        $otp_response = $this->update_send_otp($request->all());
        if (is_array($otp_response) && str_contains($otp_response['body'], 'Send Successful')) {
            $url = env("APP_URL") . '/Verify_OTP_page/' . $request->user_id;
            return success_response(['url' => $url, 'Otp send successfully']);
        }
        return error_response(['phone' => 'OTP not Send', 'Otp error']);
    }


    /**
     * Send otp using api after updating phone
     * @return @response
     */
    public function update_send_otp($request)
    {
        $otp = rand(1000, 9999);
        DB::table('users')->where('id', decrypt($request['user_id']))
            ->update(['otp' => $otp, 'phone' => $request['phone'], 'updated_at' => Carbon::now()]);
        //update usermeta content
        $user_meta = DB::table('user_meta')->where('user_id', decrypt($request['user_id']))->where('type', 'content')->first();
        $get_content = json_decode($user_meta->content);
        $get_content->phone = $request['phone'];
        DB::table('user_meta')->where('user_id', decrypt($request['user_id']))->where('type', 'content')
            ->update(['content' => json_encode($get_content)]);
        $main_url = config('api_constants.sms_url');
        $sms_username = config('api_constants.sms_username');
        $sms_password = config('api_constants.sms_password');
        $otp = 'رمز تحقق تسجيلك من #حمايه هو: ' . $otp . ' \ Your Otp For Khiaratee registration is: ' . $otp;
        $otp_message = urlencode($otp);
        $updated_mobile = ltrim($request['phone'], '0');
        $url = $main_url . 'user=' . $sms_username . '&' . 'pwd=' . $sms_password . '&' . 'senderid=SMSAlert&mobileno=966' . $updated_mobile . '&msgtext=' . $otp_message . '&priority=High&CountryCode=ALL';
        $response = '{"header_code":200,"body":"1355541590,966504454685,Send Successful\r\n"}';
        $response = json_decode($response, true);
        if (env("APP_ENV") == 'Production') {
            //send otp using curl
            $response = @curl_request($url, '', false, '');
        }
        //time for countdown
        $user_data = DB::table('users')->where('id', decrypt($request['user_id']))
            // ->where('is_verified', '0')
            ->first();
        //time diff for otp send to page reload
        $diff = Carbon::parse($user_data->updated_at)->diffInSeconds(\Carbon\Carbon::now());
        $response['time'] = 60 - $diff;
        //if time is in negative of greater then otp code
        if ($response['time'] < 0) {
            $response['time'] = 0;
        }
        $response['otp'] = $otp;
        return $response;
    }
}
