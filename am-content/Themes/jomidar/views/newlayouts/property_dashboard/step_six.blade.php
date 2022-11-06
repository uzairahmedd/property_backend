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
                    <span class="theme-text-sky ">6</span>/
                    <span class="theme-text-seondary-black">6</span>
                </div>
                <p class="font-18 theme-text-seondary-black" style="margin-bottom: 10px;">لماذا توثيق العقار</p>
                <ul class="img-ul mb-4_5">
                    <li class="mb-3 font-14 theme-text-sky">يجب التقاط الصور بشكل أفقي</li>
                    <li class="mb-3 font-14 theme-text-sky">حجم الصورة الواحدة لا يتجاوز 20 ميجا بت</li>
                    <li class="mb-3 font-14 theme-text-sky">عدد الصور لا يتجاوز 5 صور</li>
                </ul>
                <div class="document row theme-gx-32 justify-content-end">
                    <div class="col-xl-5 col-lg-4 id-number col-md-6 col-sm-12 d-flex flex-column align-items-end">
                        <label for="" class="font-18 theme-text-seondary-black">رقم الصك</label>
                        <input type="text" name="" id="" placeholder="الرجاء ادخال الكود ( تم ارساله لك عبر الرسالة نصية  )"
                               class="form-control payment theme-border">
                    </div>
                    <div class="col-xl-5 col-lg-4 id-number col-md-6 col-sm-12 d-flex flex-column align-items-end">
                        <label for="" class="font-18 theme-text-seondary-black">رقم الهوية</label>
                        <input type="text" name="" id="" placeholder="10251511212151" disabled
                               class="form-control payment theme-border">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button class="btn btn-theme"><a href="step_finish">التالي</a></button>
                <button class="btn btn-theme-secondary previous_btn">السابق</button>
            </div>
        </div>
        <!-- Property Description Section Ends Here -->
    </div>
@endsection
