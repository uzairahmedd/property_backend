{{-- Modal Launch Button--}}
{{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">--}}
{{-- Launch demo modal--}}
{{--</button>--}}

@if (Auth::guest())
<!--Sign Up Modal -->
<div class="modal fade theme-modal send-modal signup-modal" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog px-3 px-md-0">
        <div class="modal-content">
            <div class="modal-body position-relative">
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="col-12 col-sm-8 col-md-7 ps-0 px-sm-3" style="z-index:11 ;">
                        <h1 class="font-24 font-medium theme-text-seondary-black" style="margin-bottom:10px ;">{{__('labels.chat_with_adviser')}}</h1>
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
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-end">
                                <a href="JavaScript:void(0)" class="text-decoration-none theme-text-blue font-12 font-medium">
                                    {{__('labels.check_terms_policy')}}
                                </a>
                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                <input type="checkbox" id="scales" name="term_condition">
                            </div>
                            <span id="reg_terms_notification" class="error"></span>
                            <div class="form-group">
                                <button class="basicbtn chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16" type="submit">{{__('labels.create_account')}}</button>
                            </div>
                        </form>
                        <p href="" class="d-flex justify-content-center mt-2"><a href="#" class="text-decoration-none ms-1" data-bs-target="#contactModal" data-bs-toggle="modal"> {{__('labels.do_you_have_account')}} </a>&nbsp;


                        </p>
                        </form>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/Messaging.png')}}" alt="" class="position-absolute mesg">
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Sign Up Modal Ends Here -->
<!--Sign In Modal -->
<div class="modal fade theme-modal contact-modal" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog px-3 px-md-0">
        <div class="modal-content">
            <div class="modal-body position-relative">
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="col-12 col-sm-8 col-md-7 ps-0 px-sm-3" style="z-index:11 ;">
                        <h1 class="font-24 font-medium theme-text-seondary-black" style="margin-bottom: 10px;">{{__('labels.chat_with_adviser')}}</h1>
                        <p id="login_error_msg" style="color:red ;"></p>
                        <form action="{{ route('login') }}" method="POST" id="login_form">
                            @csrf
                            <div class="mb-4_5 position-relative">
                                <input type="email" name="email" value="" class="form-control font-medium font-16" placeholder="{{__('labels.username')}}">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.username')}}</label>
                            </div>
                            <div class="position-relative mb-4_5">
                                <input type="password" name="password" value="" class="form-control font-medium font-16" placeholder="{{__('labels.password')}}">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.password')}}</label>
                            </div>
                            <button type="submit" class="basicbtn chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                                {{__('labels.login')}}
                            </button>
                        </form>
                        <a href="" class="d-flex justify-content-center mt-2 theme-text-blue" data-bs-target="#signup" data-bs-toggle="modal">{{__('labels.create_account')}}</a>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/Messaging.png')}}" alt="" class="position-absolute mesg">
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Sign Up Modal Ends Here -->
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
