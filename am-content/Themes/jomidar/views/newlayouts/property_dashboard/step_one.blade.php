@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
    @php
$info = json_decode(Auth::User()->usermeta->content ?? '');
@endphp
    <div class="add-property row-style">
        <div class="head text-center">
            <h1 class="font-bold theme-text-white pt-5">أدرج عقارك معنا</h1>
            <p class="theme-text-white font-medium mb-0 mt-2">يمكنك بسهولة تسويق عقارك على موقعنا</p>
        </div>
        <div class="col-9 mx-auto profile">
            <div class="row mb-4_5 d-flex flex-column-reverse flex-lg-row card personal-card justify-content-between align-items-right align-items-lg-center">
                <div class="col-lg-4 col-md-4 d-flex flex-column align-items-end">
                    <span class="font-16 theme-text-sky">رقم الجوال</span>
                    <div class="d-flex align-items-center">
                        <img src="assets/images/tick-verified.png" alt="">
                        <h3 class="font-24 font-medium theme-text-blue mb-0 ms-2">{{ $info->phone ?? 'N/A' }}</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-flex flex-column align-items-end">
                    <span class="font-16 theme-text-sky">مسجل منذ</span>
                    <h3 class="font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->created_at->format('m/d/Y') }}</h3>
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-items-center flex-column-reverse flex-lg-row">
                    <div class="col d-flex flex-column align-items-end text-sm-right welcome justify-content-end">
                        <span class="font-16 theme-text-sky">أهلا بك,</span>
                        <h3 class="font-24 font-medium theme-text-blue align-items-end mb-0 ms-2">{{ Auth::User()->name }}</h3>
                    </div>
                    <div class="dp-elipse ms-4 d-flex align-items-center justify-content-center">
                        <img src="assets/images/avatar.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Property Description Section Starts Here -->
        <div class="container">
            <div class="description-card card">
                <div class="d-flex flex-column align-items-end">
                    <div class="col-12 d-flex mt-n3 font-medium">
                        <span class="theme-text-sky ">1</span>/
                        <span class="theme-text-seondary-black">6</span>
                    </div>
                    <p class="theme-text-black font-18">وصف العقار</p>
                    <div class="row theme-gx-3 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="property" id="">
                            <span class="checmark font-16 font-medium">بيع</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="property" id="" checked>
                            <span class="checmark font-16 font-medium">ايجار</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-wrap justify-content-end mb-4_5">
                        <label for="" class="d-flex flex-column-reverse flex-lg-row align-items-end">
                            <span class="font-16 theme-text-sky">( مثال: شقة سكنية هادئة في مكان مميز )</span>
                            <span class="theme-text-seondary-black">وصف العقار</span>
                        </label>
                        <div class="col-12">
                            <textarea name="" id="" cols="30" rows="3" placeholder="ادخل هنا.." class="form-control b-r-8 theme-border"></textarea>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-column-reverse flex-lg-row justify-content-evenly">
                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-end">
                            <label for="" class="font-14 theme-text-seondary-black">مساحة العقار</label>
                            <div class="dropdown position-relative d-flex align-items-center w-100">
                                <button class="btn dropdown-toggle add_prop_btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    المنطقة ( اختياري )
                                </button>
                                <img src="{{asset('assets/images/arrow-down.svg')}}" alt="" class="position-absolute input-drop-icon">
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                                    <li><a class="dropdown-item" href="#">Option 3</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-end property_address">
                            <label for="" class="font-14 theme-text-seondary-black">عنوان العقار</label>
                            <div class="position-relative d-flex align-items-center w-100">
                                <input type="text" name="" id="" placeholder="المدينة" class="form-control theme-border">
                                <img src="{{asset('assets/images/location.png')}}" alt="" class="position-absolute input-icon">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-end">
                            <label for="" class="font-14 theme-text-seondary-black">مساحة العقار</label>
                            <input type="text" name="" id="" placeholder="المساحة بالمتر المربع" class="form-control theme-border">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button class="btn btn-theme"><a href="step_two">التالي</a> </button>
                <button class="btn btn-theme-secondary previous_btn">السابق</button>
            </div>
        </div>
        <!-- Property Description Section Ends Here -->
    </div>
@endsection
