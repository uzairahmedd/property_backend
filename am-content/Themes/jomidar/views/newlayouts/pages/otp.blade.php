@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/term.css')}}">
    <div>
        <!-- Otp Modal Starts Here -->
        <div class="otp-modal theme-bg-white theme-modal" id="otpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body px-0 position-relative">
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="text-center w-100 bg-otp-clr">
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
{{--                        <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Otp Modal Ends Here -->
    </div>
@endsection
