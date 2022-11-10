@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/term.css')}}">
    <div>
        <div class="signIn-modal theme-bg-white theme-modal" id="signInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body px-0 position-relative bg-number-clr">
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
{{--                        <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
