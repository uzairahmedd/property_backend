<header>
    <div class="header-area" id="header">
        <div class="container">
            <div class="row align-items-center header-top">
                <div class="col-lg-6">
                    <div class="header-top-left-area">
                        <div class="header-phone-section">
                            <span class="iconify" data-icon="ant-design:phone-outlined" data-inline="false"></span> <span id="header_phone_number">{{ content('header','header_phone_number') }}</span>
                        </div>
                        <div class="header-email-section">
                            <span class="iconify" data-icon="cib:gmail" data-inline="false"></span> <span id="header_email_address">{{ content('header','header_email_address') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-right-section f-right">
                        @php
                            $langs = App\Category::where([
                                ['type','lang'],
                                ['status',1],
                                ['name','thakorbari']
                            ])->get();
                        @endphp
                        <div class="single-header-select-form">
                            <input type="hidden" value="{{ route('language.set') }}" id="lang_select_url">
                            <select class="form-control selectric" id="lang_select">
                                @foreach ($langs as $lang)
                                @php
                                    $info = json_decode($lang->langmeta->content);
                                @endphp
                                <option {{ Session::get('locale') == $lang->slug ? 'selected' : '' }} value="{{ $lang->slug }}">{{ $info->lang_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="single-header-select-form">
                            <form method="get" class="change_currency_form mb-0" action="{{ route('change_currency') }}">
                            <select name="currency" class="currency_option form-control selectric">
                                @php
                                $get_currency_info=get_currency_info();
                                $currency_id=$get_currency_info['id'] ?? '';
                                @endphp
                                @foreach(all_currency() as $row)
                                <option value="{{ $row->id }}" @if($currency_id == $row->id) selected @endif>{{ $row->name }}</option>
                                @endforeach
                            </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-1">
                    <div class="header-logo">
                        <a href="{{ url('/') }}"><img id="logo" src="{{ asset(content('header','logo')) }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="header-menu">
                        <div class="mobile-menu">
                            <a class="toggle f-right" href="#" role="button" aria-controls="hc-nav-1"><span class="iconify" data-icon="heroicons-outline:menu" data-inline="false"></span></a>
                        </div>
                        <nav id="main-nav">
                            <ul>
                                {{ Menu('Header','submenu','','','',true) }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-right-area f-right">
                        @if (Auth::guest())
                        <div class="single">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#login"><span class="iconify" data-icon="ri:user-3-line" data-inline="false"></span> <span id="header_signin_title">{{ content('header','header_signin_title') }}</span></a>
                        </div>
                        @endif
                        @if (Auth::check())
                        <div class="user-dropdown-img">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Auth::User()->avatar }}" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('agent.dashboard') }}"><span class="iconify" data-icon="feather:home" data-inline="false"></span> {{ __('Dashboard') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('agent.property.index') }}"><span class="iconify" data-icon="teenyicons:search-property-outline" data-inline="false"></span> {{ __('My Properties') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('agent.favourite.index') }}"><span class="iconify" data-icon="bx:bx-heart" data-inline="false"></span> {{ __('My Favourite') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('agent.profile.settings') }}"><span class="iconify" data-icon="ant-design:user-outlined" data-inline="false"></span> {{ __('My Profile') }}</a></li>
                                <li><a class="dropdown-item" href="{{ route('agent.logout') }}"><span class="iconify" data-icon="ant-design:logout-outlined" data-inline="false"></span> {{ __('Logout') }}</a></li>
                              </ul>
                        </div>
                        @endif
                        <div class="single">
                            <a href="{{ route('agent.property.create') }}"><span class="iconify" data-icon="ri:add-circle-line" data-inline="false"></span> <span id="header_create_property_title">{{ content('header','header_create_property_title') }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
 @if (Auth::guest())
 <!-- login model area start -->
 <div class="modal fade" id="login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-main-area-start">
           <div class="modal-title">
                <h4>{{ __('Sign into your account') }}</h4>
                <div class="modal-close-btn">
                    <span class="iconify" data-icon="gg:close" data-inline="false"></span>
                </div>
           </div>
           <div class="modal-form">
               <div class="error-msg text-center">
                   <p id="error_msg"></p>
               </div>
               <div class="register-section d-none">
                    <form action="{{ route('user.register') }}" method="POST" id="registerform">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="{{ __('Email') }}" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="{{ __('Password') }}" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="remember-me-section">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="term_condition" name="term_condition">
                                        <label class="form-check-label" for="term_condition">
                                            {{ __('agree') }} <a href="#">{{ __('Terms & Conditions') }}</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="basicbtn" type="submit">{{ __('Register') }}</button>
                        </div>
                    </form>
                    <div class="form-or-area text-center">
                        <p>{{ __('Already Have An Account') }} <a id="login_btn" href="javascript:void(0)">{{ __('Login') }}</a></p>
                        <p>{{ __('OR') }}</p>
                    </div>
               </div>
               <div class="login-section">
                    <form action="{{ route('login') }}" method="POST" id="loginform">
                    @csrf
                        <div class="form-group">
                            <input type="email" placeholder="{{ __('Email') }}" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="{{ __('Password') }}" class="form-control" name="password">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="remember-me-section">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">
                                        {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                @if (Route::has('password.request'))
                                <div class="forgotten-password-area f-right">
                                    <a href="{{ route('password.request') }}">{{ __('Forgotten Password') }}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="basicbtn" type="submit">{{ __('Login') }}</button>
                        </div>
                    </form>
                    <div class="form-or-area text-center">
                        <p>{{ __('Not Registered') }} <a id="register_btn" href="javascript:void(0)">{{ __('SignUp') }}</a></p>
                        <p>{{ __('OR') }}</p>
                    </div>
               </div>
                <div class="social-login-area">
                <a href="login/facebook">
                    <div class="single-social-login">
                        <div class="social-icon">
                            <span class="iconify" data-icon="bx:bxl-facebook" data-inline="false"></span>
                        </div>
                        <div class="social-content">
                            <p>{{ __('Login With Facebook') }}</p>
                        </div>
                    </div>
                </a>
                <a href="login/google">
                    <div class="single-social-login google">
                        <div class="social-icon">
                            <span class="iconify" data-icon="ant-design:google-outlined" data-inline="false"></span>
                        </div>
                        <div class="social-content">
                            <p>{{ __('Login With Google') }}</p>
                        </div>
                    </div>
                </a>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
  @endif
<!-- login model area end -->

