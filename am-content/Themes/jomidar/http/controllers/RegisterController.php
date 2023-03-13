<?php

namespace Amcoders\Theme\jomidar\http\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NafathCallback;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserCredentials;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Hash;
use App\Usermeta;
use Auth;
use Facade\Ignition\DumpRecorder\Dump;
use Monolog\Registry;

class RegisterController extends controller
{
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'term_condition' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()[0]]);
        }

        $slug_name = Str::slug($request->name);

        $slug_generate = User::where('slug', $slug_name)->first();

        if ($slug_generate) {
            $slug = $slug_name . Str::random(5);
        } else {
            $slug = $slug_name;
        }

        $user = new User();
        $user->role_id = 2;
        $user->name = $request->name;
        $user->slug = $slug;
        $user->email = $request->email;
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
            'phone' => null,
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
        $user->encrypt_id = encrypt($user->user_id);
        Auth::login($user);

        return response()->json($user);
    }


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
        $user->role_id = 2;
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

        $user = $this->otp_processing($user);

        return $user;
    }


    public function otp_processing($user)
    {
        //send otp on registration
        if ($user->save()) {
            $otp_response = $this->send_otp($user->phone);
            if (is_array($otp_response) && str_contains($otp_response['body'], 'Send Successful')) {
                $url = env("APP_URL", 'http://mychoice.sa/') . 'Verify_OTP_page/' . encrypt($user->id);
                return success_response(['url' => $url, 'Otp send successfully']);
            }
            $user = error_response(['message' => 'OTP not Send', 'Otp error']);
        } else {

            $user = error_response(['message' => 'User not registered', 'Otp error']);
        }
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
            'phone' => 'required|numeric',
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
        if (!$user_data) {
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
    public function send_otp($mobile)
    {
        $otp = rand(1000, 9999);
        DB::table('users')->where('phone', $mobile)
            ->update(['otp' => $otp, 'updated_at' => Carbon::now()]);
        $main_url = config('api_constants.sms_url');
        $sms_username = config('api_constants.sms_username');
        $sms_password = config('api_constants.sms_password');
        // $otp =  $otp; 
        $otp_message = urlencode($otp);
        $updated_mobile = ltrim($mobile, '0');
        $url = $main_url . 'user=' . $sms_username . '&' . 'pwd=' . $sms_password . '&' . 'senderid=SMSAlert&mobileno=966' . $updated_mobile . '&msgtext=' . $otp_message . '&priority=High&CountryCode=ALL';
        $response = '{"header_code":200,"body":"1355541590,966504454685,Send Successful\r\n"}';
        $response = json_decode($response, true);
        if (env("APP_ENV") == "Production") {
            //send otp using curl
            $response = @curl_request($url, '', false, '');
        }
        //time for countdown
        $user_data = DB::table('users')->where('phone', $mobile)
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

    /**
     *verify otp which is send to customer monile
     * @return @response.
     */
    public function verify_otp(Request $request)
    {

        $otp = implode("", $request->otp);
        if (!empty($otp)) {
            $user_data = DB::table('users')
                ->where(['phone' => $request->user_mobile, 'otp' => $otp])
                ->where('updated_at', '>', Carbon::now()->subMinute(1.01))
                ->first();
            if (!$user_data) {
                return error_response(['otp' => 'OTP was not correct'], '');
            }

            DB::table('users')->where(['id' => $user_data->id, 'phone' => $request->user_mobile])
                ->update(['is_verified' => 1, 'updated_at' => Carbon::now()]);
            //after property add
            if (isset($request->user_id)) {
                $url = env("APP_URL", 'http://mychoice.sa/');

                return success_response($url, 'Mobile number Verifed successfully');
            }
            //after succefull verification 
            $url = env("APP_URL", 'http://mychoice.sa/') . 'select-owner/' . encrypt($user_data->id);

            return success_response($url, 'Mobile number Verifed successfully');
        }
        return error_response(['otp' => 'OTP Required'], 'validation error');
    }

    /**
     *User owner ship page
     * @return @page.
     */
    public function select_owner($id)
    {
        $user_credentials = DB::table('user_credentials')->where('user_id', decrypt($id))->first();
        if (!empty($user_credentials)) {
            abort(404);
        }
        $user = DB::table('users')
            ->where('id', decrypt($id))
            ->first();
        return view('theme::newlayouts.pages.select_owner', compact('user'));
    }

    /**
     *User phone verification page
     * @return @page.
     */
    public function phone_verification($id = null)
    {
        $user = '';
        if (!empty($id)) {
            $user = DB::table('users')
                ->where('id', decrypt($id))
                ->first();
        }
        return view('theme::newlayouts.pages.post_property', compact('user'));
    }

    /**
     * updating phone page
     * @return @view
     */
    public function Update_phone($id)
    {
        $user_data = DB::table('users')
            ->where('id', decrypt($id))
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
            $url = env("APP_URL", 'http://mychoice.sa/') . 'Verify_OTP_page/' . $request->user_id;
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

    /**
     * Registration via phone number
     * @return @response
     */
    public function phone_register(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'phone' => 'required|numeric|digits_between:1,9',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        if (substr($request->phone, 0, 1) == 0) {
            $message = ['phone' => 'Please enter valid phone number'];
            return back()->withErrors($message)->withInput();
        }
        //for already exist phone number
        $update_phone = '0' . $request->phone;
        $already_phone = DB::table('users')->where('phone', $update_phone)->first();
        if (isset($request->id)) {
            $already_phone = DB::table('users')->where('phone', $update_phone)->where('id', '!=', decrypt($request->id))->first();
        }
        if (!empty($already_phone)) {
            $message = ['phone' => 'Phone number already exist!'];
            return back()->withErrors($message)->withInput();
        }
        //save user data
        $latest_user = DB::table('users')->latest()->first();
        $slug_id = $latest_user->id + 1;
        $slug = 'User' . $slug_id;

        $user = '';
        if (!empty($request->id)) {
            $user = User::where('id', decrypt($request->id))->first();
        }

        if (empty($user)) {
            $user = new User();
            $user->role_id = 2;
            $user['slug'] = $slug;
            $user['name'] = $slug;
            $user['email'] = $slug . '@khiaratee.com';
            $user['password'] = Hash::make($slug);
            $user->status = 0;
            $user->avatar = 'https://ui-avatars.com/api/?size=250&background=random&name=' . $request->name;
        }
        $user->phone = $update_phone;
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

        $user = $this->otp_process($user);

        return $user;
    }


    /**
     * Send otp using api.
     */
    public function otp_process($user)
    {
        //send otp on registration
        if ($user->save()) {
            $otp_response = $this->send_otp($user->phone);
            if (is_array($otp_response) && str_contains($otp_response['body'], 'Send Successful')) {
                $url = env("APP_URL", 'http://mychoice.sa/') . 'otp-processing-page/' . encrypt($user->id);
                return redirect($url);
            }
            return back()->withErrors(['phone' => 'OTP not Send'])->withInput();
        } else {
            return back()->withErrors(['phone' => 'Something went wrong.'])->withInput();
        }
        return $user;
    }

    /**
     *verify otp page
     * @return @view.
     */
    public function otpProperty($id)
    {
        $user_data = DB::table('users')
            ->where('id', decrypt($id))
            ->first();
        if (!$user_data) {
            abort(404);
        }
        //time diff for otp send to page reload
        $diff = Carbon::parse($user_data->updated_at)->diffInSeconds(\Carbon\Carbon::now());
        $time = 60 - $diff;
        //if time is in negative of greater then otp code
        if ($time < 0) {
            $time = 0;
        }
        return view('theme::newlayouts.pages.otp_property', compact('user_data', 'time'));
    }

    /**
     *Store data of owner selection page
     * @return @Response.
     */
    public function add_user_id(Request $request)
    {
        //validation of owner id's
        if ($request->status == '2' && empty($request->account_select)) {
            $messsage = ['message' => 'Please select broker account type'];
            return error_response($messsage, 'Validation error');
        }

        if ($request->status == '2' && $request->account_select == '4' && empty($request->rega_number)) {
            $messsage = ['message' => 'Please give a valid REGA advertisement number'];
            return error_response($messsage, 'Validation error');
        }

        if ($request->status == '2' && $request->account_select == '5' && empty($request->cr_number)) {
            $messsage = ['message' => 'Please give a valid CR number'];
            return error_response($messsage, 'Validation error');
        }

        if ($request->status == '2' && $request->account_select == '5' && empty($request->rega_number)) {
            $messsage = ['message' => 'Please give a valid REGA advertisement number'];
            return error_response($messsage, 'Validation error');
        }

        if ($request->status == '3' && empty($request->cr_number)) {
            $messsage = ['message' => 'Please give a valid CR number'];
            return error_response($messsage, 'Validation error');
        }

        $advertiser_id = rand(1000000000, 9999999999);
        $user = User::find(decrypt($request->id));
        DB::table('users')->where('id', $user->id)->update(['status' => 1]);
        $user_data = new UserCredentials;
        $user_data->user_id = $user->id;
        $user_data->account_type = $request->status;
        $user_data->sub_account_type = $request->account_select;
        $user_data->advertiser_id = $advertiser_id;
        $user_data->cr_number = $request->cr_number;
        $user_data->rega_number = $request->rega_number;
        $user_data->save();

        $user = User::find(decrypt($request->id));
        Auth::login($user);

        $url = env("APP_URL", 'http://mychoice.sa/') . 'agent/profile/settings';
        return success_response(['url' => $url, 'User Account created successfully']);
    }

    /**
     *Agent login process
     * @return @Response.
     */
    public function user_login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'phone' => 'required|numeric|digits_between:1,10',
        ]);
        if ($validator->fails()) {
            return error_response($validator->errors(), 'Validation error');
        }

        $user = DB::table('users')->where('phone', $request->phone)->where('status', 1)->where('is_verified', 1)->first();
        if (!empty($user)) {
            $user = User::find($user->id);
            //for remember me 
            $remember = false;
            if (isset($request->remember)) {
                $remember = true;
            }
            Auth::login($user, $remember);

            $url = env("APP_URL", 'http://mychoice.sa/') . 'agent/profile/settings';
            return success_response(['url' => $url, 'User logged-in successfully']);
        }
        $messsage = ['phone' => 'User does not exist!'];
        return error_response($messsage, '');
    }

    //nafath api callback url
    public function callback_url(Request $request)
    {
        try {
            if (!$request->headers->get("Authorization")) {
                $messsage = ['messsage' => 'Header Authorization must be required'];
                return error_response($messsage, 'validation error');
            }
            if (!$request->headers->get("Content-Type")) {
                $messsage = ['messsage' => 'Header Content-type must be required'];
                return error_response($messsage, 'validation error');
            }
            if ($request->headers->get("content-Type") != 'application/json') {
                $messsage = ['messsage' => 'Header Content-type must be application/json'];
                return error_response($messsage, 'validation error');
            }
            // if($request->headers->get("Authorization") != env("nafath_api_key")){
            //     $messsage = ['messsage' => 'Header Authorization api-key not correct'];
            //     return error_response($messsage, '');
            // }
            $nafath_callback = new NafathCallback;
            $nafath_callback->response = json_encode($request->all());
            $nafath_callback->save();
            return success_response(['messsage' => 'Response get successfully', 'Response get successfully']);
        } catch (\Exception $e) {
            return error_response(['messsage' => 'Something went wrong!', '']);
        }
    }
}
