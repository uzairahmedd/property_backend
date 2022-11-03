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
            <div class="description-card card finished align-items-center">
                <h3 class="font-medium theme-text-seondary-black">انتهت العملية</h3>
                <img src="{{asset('assets/images/finished.svg')}}" alt="">
                <p class="col-7 text-center font-18 theme-text-seondary-black ads-p">تم نشر الإعلان بنجاح و جاري التحقق
                    منه عن
                    طريق فريق الجودة. سيتم اشعاركم عبر الرسائل النصية عن حالة
                    الطلب</p>
                <div class="d-flex align-items-center mb-4_5">
                    <img src="{{asset('assets/images/tick-verified.png')}}" alt="">
                    <span class="font-16 font-medium theme-text-sky mb-0 ms-2">الإعلان موثق</span>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="request text-center b-r-8">
                        <p class="font-medium theme-text-seondary-black">سيتم ارسال الطلبات على هذا الإعلان إلى</p>
                        <input type="text" name="" id="" placeholder="رقم الجوال" class="form-control theme-border">
                        <div class="d-flex">
                            <button class="btn modify-btn font-medium font-14 theme-text-white b-r-8">تعديل</button>
                        </div>
                    </div>
                    <button class="btn btn-theme-secondary my-ads-btns w-100 theme-text-sky">إعلاناتي</button>
                </div>
            </div>
        </div>
        <!-- Property Description Section Ends Here -->
    </div>
@endsection
