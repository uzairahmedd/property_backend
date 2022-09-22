<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
use Hash;
use Illuminate\Support\Str;
use Session;
use Illuminate\Http\Request;
use Socialite;
use App\Usermeta;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  //  protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
       $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        dd();
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        dd();
        $users = Socialite::driver($provider)->user();

        

        $user = User::where('email',$users->getEmail())->first();

        if($user)
        {
            Auth::login($user,true);
            
            return redirect()->route('login');
           
        }else{
           $user_data = new User();
           $user_data->role_id = 2;
           $user_data->name = $users->name;
           $user_data->slug = Str::slug($users->name);
           $user_data->email = $users->getEmail();
           $user_data->avatar = $users->getAvatar();
           $user_data->password = Hash::make('rootadmin');
           $user_data->save();

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
            $usermeta->user_id = $user_data->id;
            $usermeta->type = 'content';
            $usermeta->content = json_encode($data);
            $usermeta->save();

            Auth::login($user_data,true);

            return redirect()->route('login');
        }

    }

    public function redirectTo()
    {  
         if (Auth::user()->role_id==1) {
          return $this->redirectTo=route('admin.dashboard');
        }
        elseif (Auth::user()->role_id==2) {
                  
           return $this->redirectTo=route('agent.dashboard');
       }
       // elseif (Auth::user()->role_id==3) {
          
       //     return $this->redirectTo=route('seller.dashboard');
       // }
       $this->middleware('guest')->except('logout');
    }
}
