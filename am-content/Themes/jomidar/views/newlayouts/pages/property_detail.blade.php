@extends('theme::newlayouts.app')
@section('content')
{{--    User profile CSS--}}
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/profile.css')}}">
    <!-- Heder Sections Start Here -->
    <div class="item-header pt-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="d-flex justify-content-end align-items-center">
                <ul class="breadcrumb mb-0">
                    <li class="breadcrumb-item active theme-text-seondary-black" aria-current="page">فيلا إطلالة مميزة
                        في حي سكني هادئ</li>
                    <li class="breadcrumb-item"><a href="#" class="theme-text-blue text-decoration-none">للبيع</a></li>
                    <li class="breadcrumb-item"><a href="#" class="theme-text-blue text-decoration-none">الرئيسية</a>
                    </li>
                </ul>
            </nav>
            <div class="d-flex flex-wrap-reverse justify-content-end justify-content-lg-between align-items-center my-3">
                <div class="col-12 col-lg-8 col-xl-7 col-xxl-6">
                    <ul class="detail list-unstyled mb-0 d-flex flex-column flex-sm-row align-items-end justify-content-between align-items-sm-center">
                        <li class="d-flex mb-3 mb-sm-0">
                            <span>ابلاغ عن مخالفة</span>
                            <div class="icon d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/report.png')}}" alt="">
                            </div>
                        </li>
                        <li class="d-flex mb-3 mb-sm-0">
                            <span>مشاركة</span>
                            <div class="icon d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/share.png')}}" alt="">
                            </div>
                        </li>
                        <li class="d-flex mb-3 mb-sm-0">
                            <span>حفظ</span>
                            <div class="icon d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/fav.svg')}}" alt="">
                            </div>
                        </li>
                        <li class="d-flex mb-3 mb-sm-0">
                            <span><span class="theme-text-blue font-bold">750</span> شاهدوا هذا الإعلان</span>
                        </li>
                    </ul>
                </div>
                <h1 class="title font-medium theme-text-seondary-black mb-3 mb-lg-0">فيلا إطلالة مميزة في حي سكني هادئ</h1>
            </div>
        </div>
        <!-- Slider Starts Here -->
        <div class="container p-0">
            <div id="carouselExampleIndicators" class="carousel slide d-flex px-4 px-md-0" data-bs-ride="true">
                <div class="carousel-indicators mb-1 mb-md-4">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <button class="carousel-control-prev me-2 ms-4" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <div class="carousel-inner item-carousel b-r-8">
                    <div class="carousel-item active">
                        <img src="{{theme_asset('assets/images/item-slider.png')}}" class="d-block w-100 b-r-8" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{theme_asset('assets/images/item-slider.png')}}" class="d-block w-100 b-r-8" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{theme_asset('assets/images/item-slider.png')}}" class="d-block w-100 b-r-8" alt="...">
                    </div>
                </div>

                <button class="carousel-control-next ms-2 me-4" type="button"
                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Slider Ends Here -->
    </div>
    <!-- Heder Sections Ends Here -->
    <!-- Property Detail section -->
    <div class="property-detail my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xxl-5">
                    <div class="card text-end theme-bg-white align-items-end">
                        <h1 class="theme-text-blue font-medium">4.5 مليون ر.س</h1>
                        <hr>
                        <h3 class="font-medium mb-2">العنوان</h3>
                        <div class="d-flex align-items-start justify-content-end mb-4">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..
                            </p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                        <ul class="list-unstyled d-flex flex-column flex-sm-row align-items-center mb-5">
                            <li class="d-flex align-items-center mb-3 mb-sm-0">
                                <span>2 حمام</span>
                                <img src="{{theme_asset('assets/images/shower.png')}}" alt="">
                            </li>
                            <li class="d-flex align-items-center mb-3 mb-sm-0">
                                <span>2 حمام</span>
                                <img src="{{theme_asset('assets/images/room.png')}}" alt="">
                            </li>
                            <li class="d-flex align-items-center mb-3 mb-sm-0">
                                <span>2 حمام</span>
                                <img src="{{theme_asset('assets/images/area.png')}}" alt="">
                            </li>
                        </ul>
                        <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                            <button class="contact-btn col-12 col-sm-7 theme-bg-sky border-0 theme-text-white font-medium mb-3 mb-sm-0">
                                <img src="{{theme_asset('assets/images/phone.png')}}" alt="" class="phone position-absolute">
                                التواصل بالإتصال
                            </button>
                            <button class="contact-btn col-12 col-sm-4 theme-bg-white border-0 theme-text-blue font-medium">
                                <img src="{{theme_asset('assets/images/booking-calender.png')}}" alt="" class="me-3">
                                حجز موعد
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-7">
                    <div class="d-flex flex-column align-items-end py-4">
                        <div class="d-flex justify-content-between w-100 mb-2">
                            <h1 class="font-24 theme-text-blue font-medium">للبيع</h1>
                            <h1 class="font-24 theme-text-blue">وصف العقار</h1>
                        </div>
                        <p class="theme-text-seondary-black font-16 text-end mb-2">شرح وصف العقار. هذا النص هو مثال لنص
                            يمكن
                            أن يستبدل في نفس
                            المساحة، لقد تم توليد هذا النص من مولد النص العربى،</p>
                        <hr class="w-100">
                        <h1 class="font-24 theme-text-blue">المعلومات الأساسية</h1>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">سكني</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">طبيعة العقار</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">شقة</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">نوع العقار</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">لا</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">هل يوجد عداد كهرباء</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">لا</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">هل يوجد عداد ماء</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">1</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">عدد الشوارع</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">شارع 8متر , واجهة شرقية</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">معلومات الشارع</span>
                            </div>
                        </div>
                        <hr class="w-100">
                        <h1 class="font-24 theme-text-blue">المعلومات الإضافية</h1>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">ستوديو</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">غرف النوم</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">1</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">دورات المياه</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">غير متوفر</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">صاللات</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">غير متوفر</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">مجالس</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue">1</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">عدد المواقف</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue"> غير متوفر</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">التأثيث</span>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-6 text-start">
                                <h3 class="font-16 font-medium theme-text-blue"> 5 أدوار , الدور الثالث</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span class="font-16 theme-text-seondary-black">إجمالي الأدوار/ الدور</span>
                            </div>
                        </div>
                        <hr class="w-100">
                        <h1 class="font-24 theme-text-blue mb-3 mt-2">مميزات العقار</h1>
                        <div class="tags d-flex">
                            <div class="tag d-flex justify-content-center align-items-center">
                                <h3 class="font-16 font-medium theme-text-blue">مسبح خاص</h3>
                            </div>
                            <div class="tag d-flex justify-content-center align-items-center">
                                <h3 class="font-16 font-medium theme-text-blue">غرفة أطفال</h3>
                            </div>
                            <div class="tag d-flex justify-content-center align-items-center">
                                <h3 class="font-16 font-medium theme-text-blue">غرف ملابس</h3>
                            </div>
                        </div>
                    </div>
                    <div class="theme-bg-secondary text-center py-3 position-relative">
                        <h3 class="font-medium font-24 theme-text-white">اسم الحي</h3>
                        <img src="{{theme_asset('assets/images/map-location.png')}}" alt="" class="position-absolute" style="top:18px; right:18px;">
                    </div>
                    <img src="{{theme_asset('assets/images/map-img.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- Property Listing Sale Section Ends Here -->
@endsection
