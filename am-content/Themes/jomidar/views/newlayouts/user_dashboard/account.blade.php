@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/second-page.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/profile.css')}}">
    <div class="profile d-flex justify-content-end">
            <div class="col-9 mx-auto">
                <div class="main-content">
                    <div class="mb-4_5 d-flex flex-column-reverse flex-lg-row align-items-end  card personal-card justify-content-between align-items-lg-center">
                        <div class="d-flex flex-column align-items-end">
                            <span class="font-16 theme-text-sky">{{__('labels.mobile_number')}}</span>
                            <div class="d-flex align-items-center">
                                <img src="http://127.0.0.1:8000/assets/images/tick-verified.png" alt="">
                                <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->phone ?? 'N/A' }}</h3>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-end mb-3 mb-lg-0">
                            <span class="font-16 theme-text-sky">{{__('labels.registered_since')}}</span>
                            <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->created_at->format('m/d/Y') }}</h3>
                        </div>
                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                            <div class="col d-flex flex-column align-items-end">
<<<<<<< HEAD
                                <span class="font-16 theme-text-sky">{{__('labels.welcome')}}</span>
                                <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->name }}
                                    عثمان</h3>
=======
                                <span class="font-16 theme-text-sky">أهلا بك,</span>
                                <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->name }}</h3>
>>>>>>> 6d4e4c6e319013ee828ad30bdc1b22cfde38a73c
                            </div>
                            <div class="dp-elipse d-flex align-items-center justify-content-center">
                                <img src="http://127.0.0.1:8000/assets/images/avatar.png" alt="" class="img-fluid">
                                <div class="file-container">
                                    <input type="file">
                                    <img src="http://127.0.0.1:8000/assets/images/dp-camera.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-setting">
                        <form action="" class="row d-flex flex-wrap justify-content-end">
                            <div class="col-lg-4 col-md-8 col-sm-12 accout-id">
                                <div class="d-flex flex-column align-items-end">
                                    <label for="" class="font-16 theme-text-seondary-black mb-2">{{__('labels.email_optional')}}</label>
                                    <input type="email" value="{{ Auth::User()->email }}" name="email" placeholder="{{__('labels.email')}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-8 col-sm-12">
                                <div class="d-flex flex-column align-items-end">
                                    <label for="" class="font-16 theme-text-seondary-black mb-2">{{__('labels.id')}}</label>
                                    <input type="text" name="" id="" placeholder="123456788" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-5 mb-4_5">
                                <button class="btn acct-btn b-r-8  theme-bg-sky border-0 theme-text-white font-bold font-16">{{__('labels.save')}}</button>
                            </div>
                        </form>
                        <hr class="mb-4_5">
                        <div class="d-flex">
                            <button class="btn btn-outline-danger">
                                {{__('labels.delete_account')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @include('theme::newlayouts.partials.sidebar')
    </div>
@endsection
