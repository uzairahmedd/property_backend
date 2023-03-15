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
use Illuminate\Validation\ValidationException;


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

     /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        
        abort(404);
    }

     /**
     * Show the admin's login form.
     *
     * @return \Illuminate\View\View
     */
    public function admin_login()
    {
        
        return view('auth.login');
    }


    public function redirectToProvider($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {

        $users = Socialite::driver($provider)->user();



        $user = User::where('email', $users->getEmail())->first();

        if ($user) {
            Auth::login($user, true);

            return redirect()->route('login');
        } else {
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

            Auth::login($user_data, true);
            return redirect()->route('agent.profile.settings');
            // return redirect()->route('login');
        }
    }

    public function redirectTo()
    {

        if (Auth::user()->role_id != 2) {
            return $this->redirectTo = route('admin.dashboard');
        } elseif (Auth::user()->role_id == 2) {

            return $this->redirectTo = route('agent.profile.settings');
        }
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id != 2) {
            return redirect()->route('admin.dashboard');
        } else if ($user->role_id == 2) {
            return redirect()->route('agent.profile.settings');
        } else {
            return redirect()->route('/');
        }
    }
    // public function redirectPath()
    // {

    //     if (Auth::user()->role_id != 2) {
    //         return $this->redirectTo = route('admin.dashboard');
    //     }
    //     if (Auth::user()->role_id == 2) {

    //         return $this->redirectTo = route('agent.profile.settings');
    //     }
    // }

    // public function authenticated($request, $user)
    // {
    //     switch ($user->role_id) {
    //         case '2':
    //             return redirect()->route('agent.profile.settings');
    //         case '1':
    //             return redirect()->route('admin.dashboard');
    //         case '3':
    //             return redirect()->route('admin.dashboard');
    //         default:
    //             return redirect()->route('agent.profile.settings');
    //     }
    // }

    public function login(Request $request)
    {
        
        $this->validateLogin($request);
        //
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            //check user status        
            if (Auth::user()->status == '1') return $this->sendLoginResponse($request);
            // if user_status != '1' raise exception
            else {
                $this->guard()->logout();
                return $this->sendAccountBlocked($request);
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
        //
    } //

    protected function sendAccountBlocked(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => ['Your account was suspended.'],
        ]);
    }
    
}
