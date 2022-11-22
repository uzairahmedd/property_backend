<?php 

namespace Amcoders\Theme\jomidar\http\controllers\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\Usermeta;
use App\Models\User;
use Illuminate\Support\Str;
/**
 * 
 */
class ProfileController extends controller
{
    public function index()
    {
        return view('theme::newlayouts.user_dashboard.profile');
        // return view('view::agent.settings');
    }

    public function update(Request $request)
    {
        $user = Auth::User();
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()[0]]);
        }

        if($request->current_password)
        {
            $validator = \Validator::make($request->all(), [
                'current_password' => 'password',
                'password' => 'required|confirmed'
            ]);
    
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()[0]]);
            }

            $user->password = Hash::make($request->password);

        }

        

        $user->name = $request->name;
        $str_slug = Str::slug($request->name);
        $slug_check = User::where('slug',$str_slug)->first();
        if($slug_check)
        {
            $slug = $str_slug.Str::random(5);
        }else{
            $slug = $str_slug;
        }
        $user->slug = $slug;
        $user->email = $request->email;
        $user->save();

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'service_area' => $request->service_area,
            'tax_number' => $request->tax_number,
            'license' => $request->license
        ];

        $usermeta = Usermeta::where([
            ['user_id',$user->id],
            ['type','content']
        ])->first();
        if(empty($usermeta)){
            $usermeta = new Usermeta();
            $usermeta->user_id=$user->id;
            $usermeta->type='content';
        }

        $usermeta->content = json_encode($data);
        $usermeta->save();

        return response()->json('Settings Updated');


    }
}