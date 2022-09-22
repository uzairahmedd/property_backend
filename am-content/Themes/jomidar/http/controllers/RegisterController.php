<?php 

namespace Amcoders\Theme\jomidar\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Hash;
use App\Usermeta;
use Auth;

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
    
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()[0]]);
        }

        $slug_name = Str::slug($request->name);

        $slug_generate = User::where('slug',$slug_name)->first();

        if($slug_generate)
        {
            $slug = $slug_name.Str::random(5);
        }else{
            $slug = $slug_name;
        }

        $user = new User();
        $user->role_id = 2;
        $user->name = $request->name;
        $user->slug = $slug;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        if($request->preview)
        {
            $user->avatar = $request->preview;
        }else{
            $user->avatar = 'https://ui-avatars.com/api/?size=250&background=random&name='.$request->name;
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

        Auth::login($user);

        return response()->json($user);
    }
}