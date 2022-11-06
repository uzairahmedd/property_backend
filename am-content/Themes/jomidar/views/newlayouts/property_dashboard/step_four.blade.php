@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
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
                        <h3 class="font-24 font-medium theme-text-blue mb-0 ms-2">05546106060</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-flex flex-column align-items-end">
                    <span class="font-16 theme-text-sky">مسجل منذ</span>
                    <h3 class="font-24 font-medium theme-text-blue mb-0 ms-2">12-10-2022</h3>
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-items-center flex-column-reverse flex-lg-row">
                    <div class="col d-flex flex-column align-items-end text-sm-right welcome justify-content-end">
                        <span class="font-16 theme-text-sky">أهلا بك,</span>
                        <h3 class="font-24 font-medium theme-text-blue align-items-end mb-0 ms-2">خالد بن عبدالعزيز أل عثمان</h3>
                    </div>
                    <div class="dp-elipse ms-4 d-flex align-items-center justify-content-center">
                        <img src="assets/images/avatar.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Property Description Section Starts Here -->
        <div class="container">
            <div class="description-card card align-items-end">
                <div class="col-12 d-flex mt-n3 font-medium">
                    <span class="theme-text-sky ">4</span>/
                    <span class="theme-text-seondary-black">6</span>
                </div>
                <ul class="img-ul">
                    <li class="mb-3 font-18 theme-text-seondary-black">يجب التقاط الصور بشكل أفقي</li>
                    <li class="mb-3 font-18 theme-text-seondary-black">حجم الصورة الواحدة لا يتجاوز 20 ميجا بت</li>
                    <li class="mb-3 font-18 theme-text-seondary-black">عدد الصور لا يتجاوز 5 صور</li>
                </ul>
                <div class="col-12 row d-flex justify-content-between">
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div
                            class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div
                            class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div
                            class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div
                            class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div
                            class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex font-16">
                    <span class="theme-text-sky ">0</span>/
                    <span class="theme-text-seondary-black">5</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex flex-column align-items-end video-link">
                    <label for="" class="font-18 theme-text-seondary-black">رابط الفيديو ( اختياري )</label>
                    <input type="text" name="" id="" placeholder="مثال: http://youtube.be/dkdsds"
                           class="form-control theme-border">
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button class="btn btn-theme"><a href="step_five">التالي</a></button>
                <button class="btn btn-theme-secondary previous_btn">السابق</button>
            </div>
        </div>
        <!-- Property Description Section Ends Here -->
    </div>
@endsection
