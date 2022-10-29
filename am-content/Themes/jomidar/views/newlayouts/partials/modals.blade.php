{{--    Modal Launch Button--}}
{{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">--}}
{{--    Launch demo modal--}}
{{--</button>--}}
<!--Sign Up Modal -->
<div class="modal fade theme-modal contact-modal" id="contactModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog px-3 px-md-0">
        <div class="modal-content">
            <div class="modal-body position-relative">
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="col-12 col-sm-8 col-md-7 ps-0 px-sm-3" style="z-index:11 ;">
                        <h1 class="font-24 font-medium theme-text-seondary-black">يرجى إدخال بياناتك للمحادثة مع
                            صاحب الإعلان</h1>
                        <div class="mb-4_5 position-relative">
                            <input type="email" class="form-control font-medium font-16" id=""
                                   placeholder="ادخل الاسم كاملا">
                            <label for="floating-Input"
                                   class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">الاسم
                                كامل</label>
                        </div>
                        <div class="position-relative mb-4_5">
                            <input type="email" class="form-control font-medium font-16" id=""
                                   placeholder="ادخل الاسم كاملا">
                            <label for="floating-Input"
                                   class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">الاسم
                                كامل</label>
                        </div>
                        <button class="chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                            البدء بالتواصل
                        </button>
                    </div>
                    <div class="col-12 mt-4 d-flex align-items-center justify-content-end">
                        <a href="" class="text-decoration-none theme-text-blue font-16 font-medium">
                            على سياسة الخصوصية و الشروط والأحكام
                        </a>
                        <span class="theme-text-seondary-black font-16 ms-1"> أوافق</span>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/Messaging.png')}}" alt="" class="position-absolute mesg">
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt=""
                     class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Sign Up Modal Ends Here -->
<!-- Sign In Modal Starts Here -->
<div class="modal fade signIn-modal theme-modal" id="signInModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-0 position-relative">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-10 col-sm-8 col-md-7 text-center">
                        <img src="{{theme_asset('assets/images/Sign-in.png')}}" alt="">
                        <h1 class="font-24 font-medium theme-text-seondary-black">تسجيل دخول/ إنشاء حساب</h1>
                        <div class="mb-4_5 position-relative">
                            <input type="email" class="form-control font-medium font-16" id=""
                                   placeholder="مثلا 5515151181">
                            <label for="floating-Input"
                                   class="floating-Input position-absolute font-medium theme-text-seondary-black">رقم
                                الجوال</label>
                        </div>
                        <div class="px-3">
                            <button class="chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                                التالي
                            </button>
                        </div>
                    </div>
                </div>
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt=""
                     class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Sign In Modal Ends Here -->
<!-- Otp Modal Starts Here -->
<div class="modal fade otp-modal theme-modal" id="otpModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" name="" id="" class="form-control">
                            <input type="text" name="" id="" class="form-control">
                            <input type="text" name="" id="" class="form-control">
                            <input type="text" name="" id="" class="form-control">
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
                <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt=""
                     class="position-absolute close-modal">
            </div>
        </div>
    </div>
</div>
<!-- Otp Modal Ends Here -->
<!-- Property Listing Sale Section Ends Here -->
