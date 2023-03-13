@if (Auth::guest())
<!--Sign Up Modal -->
<div class="modal fade theme-modal send-modal signup-modal" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog px-3 px-md-0 modal-width">
        <div class="modal-content">
            <div class="modal-body position-relative">
                {{-- <img src="{{theme_asset('assets/images/logo.png')}}" class="modal-logo" alt="modal-logo">--}}
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="col-12 col-md-7 col-sm-7 ps-0 px-sm-3" style="z-index:11 ;">
                        <h1 class="font-24 font-medium theme-text-seondary-black text-center pb-2" style="margin-bottom:10px ;">{{__('labels.chat_with_adviser')}}</h1>
                        <p id="errors_msg"></p>
                        <form action="{{ route('user_register') }}" method="POST" id="register_form">
                            @csrf
                            <div class="mb-4_5 position-relative">
                                <input type="text" value="" class="form-control font-medium font-16" placeholder="{{__('labels.username')}}" name="name">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.username')}}</label>
                                <span id="reg_name_notification" class="error"></span>
                            </div>

                            <div class="position-relative mb-4_5">
                                <input type="email" value="" class="form-control font-medium font-16" placeholder="{{__('labels.email')}}" name="email">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.email')}}
                                </label>
                                <span id="reg_email_notification" class="error"></span>
                            </div>
                            <div class="position-relative mb-4_5">
                                <input type="phone" value="" class="form-control font-medium font-16" placeholder='{{__('labels.mobile_number')}}' name="phone">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8"> {{__('labels.mobile_number')}}
                                </label>
                                <span id="reg_mobile_notification" class="error"></span>
                            </div>

                            <div class="position-relative mb-4_5">
                                <input type="password" value="" class="form-control font-medium font-16" placeholder="{{__('labels.password')}}" name="password">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.password')}}</label>
                                <span id="reg_password_notification" class="error"></span>
                            </div>
                            <div class="position-relative mb-4_5">
                                <input type="password" value="" class="form-control font-medium font-16" placeholder="{{__('labels.confirm_password')}}" name="password_confirmation">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.confirm_password')}}</label>
                            </div>
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                                <a href="JavaScript:void(0)" class="text-decoration-none theme-text-blue font-12 font-medium">
                                    {{__('labels.check_terms_policy')}}
                                </a>
                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                <input type="checkbox" id="scales" name="term_condition">
                            </div>
                            <span id="reg_terms_notification" class="error"></span>
                            <div class="form-group">
                                <button class="basicbtn chat-btn theme-bg-blue theme-text-white border-0 font-bold font-16" type="submit">{{__('labels.create_account')}}</button>
                            </div>
                        </form>
                        <p class="subtitle mt-2">{{__('labels.have_account')}} <a href="#" class="theme-text-sky" data-bs-target="#login_modal" data-bs-toggle="modal">{{__('labels.sign_in')}}</a></p>
                        </form>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/logo.png')}}" alt="" class="position-absolute mesg">
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Sign Up Modal Ends Here -->
<!--Sign In Modal -->
<div class="modal fade theme-modal contact-modal" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog px-3 px-md-0 modal-width">
        <div class="modal-content">
            <div class="modal-body position-relative">
                {{-- <img src="{{theme_asset('assets/images/logo.png')}}" class="modal-logo" alt="modal-logo">--}}
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="col-12 col-sm-7 col-md-7 ps-0 px-sm-3" style="z-index:11 ;">
                        <h1 class="font-24 font-medium theme-text-seondary-black text-center pb-2" style="margin-bottom: 10px;">{{__('labels.chat_with_adviser')}}</h1>
                        <p id="login_error_msg" style="color:red ;"></p>
                        <form action="{{ route('login') }}" method="POST" id="login_form">
                            @csrf
                            <div class="mb-4_5 position-relative">
                                <input type="email" name="email" value="" class="form-control font-medium font-16" placeholder="{{__('labels.email')}}">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.email')}}</label>
                            </div>
                            <div class="position-relative mb-4_5">
                                <input type="password" name="password" value="" class="form-control font-medium font-16" placeholder="{{__('labels.password')}}">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.password')}}</label>
                            </div>
                            <button type="submit" class="basicbtn chat-btn theme-bg-blue theme-text-white border-0 font-bold font-16">
                                {{__('labels.login')}}
                            </button>
                        </form>
                        {{-- <a href="" class="d-flex justify-content-center mt-2 theme-text-blue" data-bs-target="#signup" data-bs-toggle="modal">{{__('labels.create_account')}}</a>--}}
                        <p class="or"><span>or</span></p>
                        {{-- <div class="social-login">--}}
                        {{-- <button class="fb-btn">--}}
                        {{-- <img alt="FB" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDI5MS4zMTkgMjkxLjMxOSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjkxLjMxOSAyOTEuMzE5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8Zz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojM0I1OTk4OyIgZD0iTTE0NS42NTksMGM4MC40NSwwLDE0NS42Niw2NS4yMTksMTQ1LjY2LDE0NS42NmMwLDgwLjQ1LTY1LjIxLDE0NS42NTktMTQ1LjY2LDE0NS42NTkNCgkJUzAsMjI2LjEwOSwwLDE0NS42NkMwLDY1LjIxOSw2NS4yMSwwLDE0NS42NTksMHoiLz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTE2My4zOTQsMTAwLjI3N2gxOC43NzJ2LTI3LjczaC0yMi4wNjd2MC4xYy0yNi43MzgsMC45NDctMzIuMjE4LDE1Ljk3Ny0zMi43MDEsMzEuNzYzaC0wLjA1NQ0KCQl2MTMuODQ3aC0xOC4yMDd2MjcuMTU2aDE4LjIwN3Y3Mi43OTNoMjcuNDM5di03Mi43OTNoMjIuNDc3bDQuMzQyLTI3LjE1NmgtMjYuODF2LTguMzY2DQoJCUMxNTQuNzkxLDEwNC41NTYsMTU4LjM0MSwxMDAuMjc3LDE2My4zOTQsMTAwLjI3N3oiLz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjwvc3ZnPg0K">--}}
                        {{-- </button>--}}
                        {{-- <button class="google-btn">--}}
                        {{-- <p class="btn-text mb-0">{{__('labels.sign_google')}}</p>--}}
                        {{-- <img alt="Google" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIHN0eWxlPSJmaWxsOiNGQkJCMDA7IiBkPSJNMTEzLjQ3LDMwOS40MDhMOTUuNjQ4LDM3NS45NGwtNjUuMTM5LDEuMzc4QzExLjA0MiwzNDEuMjExLDAsMjk5LjksMCwyNTYNCgljMC00Mi40NTEsMTAuMzI0LTgyLjQ4MywyOC42MjQtMTE3LjczMmgwLjAxNGw1Ny45OTIsMTAuNjMybDI1LjQwNCw1Ny42NDRjLTUuMzE3LDE1LjUwMS04LjIxNSwzMi4xNDEtOC4yMTUsNDkuNDU2DQoJQzEwMy44MjEsMjc0Ljc5MiwxMDcuMjI1LDI5Mi43OTcsMTEzLjQ3LDMwOS40MDh6Ii8+DQo8cGF0aCBzdHlsZT0iZmlsbDojNTE4RUY4OyIgZD0iTTUwNy41MjcsMjA4LjE3NkM1MTAuNDY3LDIyMy42NjIsNTEyLDIzOS42NTUsNTEyLDI1NmMwLDE4LjMyOC0xLjkyNywzNi4yMDYtNS41OTgsNTMuNDUxDQoJYy0xMi40NjIsNTguNjgzLTQ1LjAyNSwxMDkuOTI1LTkwLjEzNCwxNDYuMTg3bC0wLjAxNC0wLjAxNGwtNzMuMDQ0LTMuNzI3bC0xMC4zMzgtNjQuNTM1DQoJYzI5LjkzMi0xNy41NTQsNTMuMzI0LTQ1LjAyNSw2NS42NDYtNzcuOTExaC0xMzYuODlWMjA4LjE3NmgxMzguODg3TDUwNy41MjcsMjA4LjE3Nkw1MDcuNTI3LDIwOC4xNzZ6Ii8+DQo8cGF0aCBzdHlsZT0iZmlsbDojMjhCNDQ2OyIgZD0iTTQxNi4yNTMsNDU1LjYyNGwwLjAxNCwwLjAxNEMzNzIuMzk2LDQ5MC45MDEsMzE2LjY2Niw1MTIsMjU2LDUxMg0KCWMtOTcuNDkxLDAtMTgyLjI1Mi01NC40OTEtMjI1LjQ5MS0xMzQuNjgxbDgyLjk2MS02Ny45MWMyMS42MTksNTcuNjk4LDc3LjI3OCw5OC43NzEsMTQyLjUzLDk4Ljc3MQ0KCWMyOC4wNDcsMCw1NC4zMjMtNy41ODIsNzYuODctMjAuODE4TDQxNi4yNTMsNDU1LjYyNHoiLz4NCjxwYXRoIHN0eWxlPSJmaWxsOiNGMTQzMzY7IiBkPSJNNDE5LjQwNCw1OC45MzZsLTgyLjkzMyw2Ny44OTZjLTIzLjMzNS0xNC41ODYtNTAuOTE5LTIzLjAxMi04MC40NzEtMjMuMDEyDQoJYy02Ni43MjksMC0xMjMuNDI5LDQyLjk1Ny0xNDMuOTY1LDEwMi43MjRsLTgzLjM5Ny02OC4yNzZoLTAuMDE0QzcxLjIzLDU2LjEyMywxNTcuMDYsMCwyNTYsMA0KCUMzMTguMTE1LDAsMzc1LjA2OCwyMi4xMjYsNDE5LjQwNCw1OC45MzZ6Ii8+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==">--}}
                        {{-- </button>--}}
                        {{-- </div>--}}
                        <p class="subtitle mt-2">{{__('labels.not_have_account')}} <a href="#" class="theme-text-sky" data-bs-target="#signup" data-bs-toggle="modal">{{__('labels.sign_up')}}</a></p>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/logo.png')}}" alt="" class="position-absolute mesg">
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Sign Up Modal Ends Here -->


<!--Login Through Number Modal -->
<div class="modal fade theme-modal contact-modal" id="login_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog px-3 px-md-0 modal-width">
        <div class="modal-content">
            <div class="modal-body position-relative">
                <div class="d-flex flex-wrap justify-content-end number-login-div">
                    <div class="col-12 col-sm-7 col-md-7 ps-0 px-sm-3" style="z-index:11 ;">
                        <h1 class="font-24 font-medium theme-text-seondary-black text-center pb-2" style="margin-bottom: 10px;">{{__('labels.chat_with_adviser')}}</h1>
                        <p id="phone_login_error_msg" style="color:red ;"></p>
                        <form action="{{ route('user_login') }}" method="POST" id="phone_login_form">
                            @csrf
                            <div class="mb-4_5 position-relative">
                                <input type="text" name="phone" id="login_phone" autocomplete="off" value="" class="form-control font-medium font-16" placeholder="{{__('labels.mobile_number')}}">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.mobile_number')}}</label>
                            </div>
                            <div class="mb-4_5 position-relative">
                                <a class="form-check-label check-box-terms" for="remember">{{ __('labels.Remember_Me') }}</a>
                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                <input class="form-check-input" type="checkbox" name="remember">
                            </div>

                            <button type="submit" class="basicbtn chat-btn theme-bg-blue theme-text-white border-0 font-bold font-16">
                                {{__('labels.login')}}
                            </button>
                        </form>
                        <p class="subtitle mt-2">{{__('labels.not_have_account')}} <a href="{{ route('phone_verification') }}" class="theme-text-sky">{{__('labels.sign_up')}}</a></p>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/logo.png')}}" alt="" class="position-absolute mesg">
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Login Through Number Modal End -->
@endif

<!-- Sign In Modal Starts Here -->
<div class="modal fade signIn-modal theme-modal" id="signInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-0 position-relative">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-10 col-sm-8 col-md-7 text-center">
                        <img src="{{theme_asset('assets/images/Sign-in.png')}}" alt="">
                        <h1 class="font-24 font-medium theme-text-seondary-black">تسجيل دخول/ إنشاء حساب</h1>
                        <div class="mb-4_5 position-relative">
                            <input type="email" class="form-control font-medium font-16" placeholder="مثلا 5515151181">
                            <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black">رقم
                                الجوال</label>
                        </div>
                        <div class="px-3">
                            <button class="chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                                التالي
                            </button>
                        </div>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Sign In Modal Ends Here -->
<!-- Otp Modal Starts Here -->
<div class="modal fade otp-modal theme-modal" id="otpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-0 position-relative">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="text-center w-100">
                        <img src="{{theme_asset('assets/images/Verification 1.png')}}" alt="">
                        <h1 class="font-24 font-medium theme-text-seondary-black mb-3">تسجيل دخول/ إنشاء حساب</h1>
                        <div class="d-flex align-items-end justify-content-center font-16 mb-2">
                            <a href="" class="theme-text-sky me-2">تعديل</a>
                            <h3 class="font-medium theme-text-blue">[05985516161]</h3>
                            <span class="theme-text-grey">ادخل كود التفعيل المرسل إلى الرقم</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-4_5" style="gap:24px">
                            <input type="text" name="" class="form-control">
                            <input type="text" name="" class="form-control">
                            <input type="text" name="" class="form-control">
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-6 mx-auto mb-4_5">
                            <button class="chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                                التالي
                            </button>
                        </div>
                        <div class="d-flex justify-content-center font-14">
                            <a href="font-medium theme-text-blue">أرسل مرة أخرى</a>
                            <span class="theme-text-grey">لم يصلك كود التفعيل؟</span>
                        </div>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Otp Modal Ends Here -->
<!-- Property Listing Sale Section Ends Here -->

<!-- map modal box -->
<div class="modal fade" id="map_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{__('labels.address_property')}}</h5>
                <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body" style="height: 450px;">
                <div class="tab-content">
                    <div class="popup-message form-box">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <input type="hidden" id="default_coordinates">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div id="map"></div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('labels.close')}}</button>
                <button type="button" id="save_coordinates" class="btn btn-primary">{{__('labels.save_changes')}}</button>
            </div>
        </div>
    </div>
</div>


<!-- <div id="us6-dialog" class="modal fade custom-popup sharepopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i data-bs-dismiss="modal" aria-label="Close" class="fas fa-times close_map"></i>
            </div>
            <div class="modal-body">
                <div class="modal-head">
                    <h4 class="text-center">
                        العنوان الحالي
                    </h4>
                </div>
                <div class="tab-content">
                    <div id="ErrorMessageLocation" class="alert alert-info" style="display:none">
                        <i data-bs-dismiss="alert" aria-label="Close" class="fas fa-times close_map"></i>
                        خيار تحديد الموقع عبر خرائط جوجل غير مفعل في جهازك، يرجى تفعيل تحديد الموقع من أجل إيجاد موقعك
                        الحالي
                    </div>
                    <div class="popup-message form-box">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <span class="label-text">
                                    موقع
                                </span>
                            </div>
                            <div class="col-sm-5">
                                <div class="input-box">
                                    <input type="text" class="form-control clearable" id="us3-address" autocomplete="off" placeholder="" tabindex="107">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-box">
                                    <button type="button" onclick="setNewAddress()" data-dismiss="modal" class="btn btn-primary" tabindex="108">
                                        اضف هذا العنوان
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div id="GoogleMap" style="width:100%;height:300px"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->