@extends('theme::newlayouts.app')
@section('content')
    <!-- Header Section Starts Here -->
    <div class="header d-flex flex-column align-items-center">
        <li class="col-12 col-sm-10 col-lg-8 col-xl-5">
            <h1 class="font-medium theme-text-white text-center">المنصة الحصرية للعقارات الموثقة في <span
                    class="font-bold">المملكة</span></h1>
        </li>
        <div class="col-12 row looking-for theme-bg-white d-flex flex-lg-row flex-sm-row align-items-center">

            <div class="col-lg-2 search-button-div col-md-2 col-sm-2 col-xs-12">
{{--                <button class="btn search-home-btn text-center" type="button">Button</button>--}}
                <a href="#" class="btn search-home-btn text-center" role="button">Search</a>
                <img class="search-home-img" src="{{theme_asset('assets/images/search.svg')}}" alt="">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="dropdown complete-rent-drop">
                    <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                    <button class="btn dropdown-toggle rent-dropdown-toggle rent-btn" role="button" id="dropdownMenuLink" onclick="disableScroll()" data-bs-toggle="dropdown" aria-expanded="false"
                            data-toggle="dropdown">ايجار
                    </button>
                    <ul class="dropdown-menu rent-dropdown" aria-labelledby="dropdownMenuLink">
                        <div class="rent-dropdown-content">
                            <li class="rent-all">
                                <input class="rent-select-dropdown" value="بيع" type="radio" id="radio02-01" name="radio-btn"/>
                                <label class="rent-box" for="radio02-01">بيع</label>
                            </li>
                            <li class="rent-all">
                                <input class="rent-select-dropdown drive_percent-box"  value="ايجار" type="radio" id="radio02-02"
                                       name="radio-btn" checked/>
                                <label class="rent-box" for="radio02-02">ايجار</label>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <select name="" class="rent-select" id="select-drop-btn">
                    <option value="1">الرياض</option>                    <option value="2">الخبر</option>
                    <option value="3">جازان</option>
                    <option value="1">بربدة</option>
                    <option value="2">نجران</option>
                    <option value="3">ابها</option>
                    <option value="4">تبوك</option>
                    <option value="5">الطائف</option>
                    <option value="6">الخرج</option>
                    <option value="7">عرعر</option>
                </select>
                <div class="city-toggle-icon">
                    <img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 search-input-bar">
                <input type="search" class="theme-text-secondary-black border-0" placeholder="تبحث عن عقار؟">

            </div>
        </div>
    </div>
    <!-- Header Section Ends Here -->
    <!-- Verified Section Starts Here -->
    <div class="col-12 verified theme-bg-white">
        <ul class="list-unstyled d-flex flex-column flex-md-row justify-content-between">
            <li class="d-flex flex-sm-column-reverse flex-lg-row align-items-end align-items-sm-center align-items-lg-end">
                <h3 class="col font-medium theme-text-blue text-end text-sm-center text-lg-end">معلومات شاملة عن
                    العقار</h3>
                <img src="{{theme_asset('assets/images/searching.svg')}}" alt="">
            </li>
            <li class="d-flex flex-sm-column-reverse flex-lg-row align-items-end align-items-sm-center align-items-lg-end">
                <h3 class="col font-medium theme-text-blue text-end text-sm-center text-lg-end">معلومات حقيقية
                    مدققة</h3>
                <img src="{{theme_asset('assets/images/verified.svg')}}" alt="">
            </li>
            <li class="d-flex flex-sm-column-reverse flex-lg-row align-items-end align-items-sm-center align-items-lg-end">
                <h3 class="col font-medium theme-text-blue text-end text-sm-center text-lg-end">أعضاء موثقين لدينا</h3>
                <img src="{{theme_asset('assets/images/verified2.svg')}}" alt="">
            </li>
        </ul>
    </div>
    <!-- Verified Section Ends Here -->
    <!-- Property Listing Sale Section Starts Here -->
    <div class="property-listing property-sale">
        <div class="container position-relative">
            <div class="property-listing-content d-flex align-items-center justify-content-between">
                <p class="mb-0 theme-text-sky font-medium"><a href="property_lists">عرض المزيد</a> </p>
                <div class="d-flex align-items-center gap-3">
                    <h2 class="mb-0 font-medium theme-text-blue">أضيفت مؤخرا</h2>
                    <div class="chip font-medium theme-text-secondary">
                        <span>للبيع</span>
                    </div>
                </div>
            </div>
            <div class="owl-carousel">
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/heart.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="property_detail"><h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3></a>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/heart.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/heart.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/heart.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Listing Sale Section Ends Here -->
    <!-- Property Listing Rent Section starts Here -->
    <div class="property-listing property-rent">
        <div class="container position-relative">
            <div class="property-listing-content d-flex align-items-center justify-content-between">
                <p class="mb-0 theme-text-sky font-medium"><a href="property_lists">عرض المزيد</a></p>
                <div class="d-flex align-items-center gap-3">
                    <h2 class="mb-0 font-medium theme-text-blue">أضيفت مؤخرا</h2>
                    <div class="chip font-medium theme-text-secondary">
                        <span>للايجار</span>
                    </div>
                </div>
            </div>
            <div class="owl-carousel">
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <a href="property_detail.blade.php"><img src="{{theme_asset('assets/images/heart.svg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/heart.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/heart.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="listing">
                    <div class="list">
                        <div class="content d-flex justify-content-between">
                            <div class="d-flex flex-column align-items-start theme-text-white">
                                <div class="sale theme-bg-sky">
                                    <span class="font-medium">للبيع</span>
                                </div>
                                <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div>
                            </div>
                            <div class="fav-elipse d-flex align-items-center justify-content-center">
                                <img src="{{theme_asset('assets/images/heart.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="price theme-text-white d-flex align-items-center justify-content-center">
                            <span class="font-bold">4.5 مليون ر.س</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">جدة - الطريق السريع - بالقرب من مسجد
                                الهداي..</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property Listing Rent Section Ends Here -->
    <!-- Property Sell and Buy section Starts Here -->
    <div class="property-sl-r d-flex justify-content-center align-items-center">
        <div class="col-12 col-sm-10 col-lg-8 col-xl-5">
            <h1 class="font-bold theme-text-white mb-0">هل عندك عقار للبيع أو للإيجار</h1>
            <h3 class="mb-0 theme-text-white">يمكنك تسويق عقارك على موقعنا بكل سهولة، او بإمكانك تفويض فريق وصلت لبيع
                وتأجير
                العقار بالنيابة عنك بكل
                سهولة
            </h3>
            <div>
                <button class="btn-add btn-theme">
                    اضف عقارك الأن
                </button>
            </div>
        </div>
    </div>
    <!-- Property Sell and Buy section Ends Here -->
    <!-- Auction Section Starts Here -->
    <div class="auction">
        <div class="container">
            <div class="auction-content d-flex flex-wrap justify-content-between">
                <div class="col-12 col-xl-7 zig-zag d-flex flex-column justify-content-between">
                    <div class="w-100 d-flex justify-content-end">
                        <div class="d-none hammer-circle d-md-flex align-items-center justify-content-center">
                            <img src="{{theme_asset('assets/images/hammer.svg')}}" alt="">
                        </div>
                    </div>
                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start">
                        <div class="card2 d-inline-block position-relative">
                            <p>الحد الأدنى للمزيدة</p>
                            <h1 class="my-3">1.8 مليون ريال</h1>
                            <h3>ينتهي المزاد في 20-10-2022</h3>
                        </div>
                        <div class="d-flex flex-column w-sm-100">
                            <div class="card">
                                <div class="d-flex flex-column">
                                    <h1>1.85</h1>
                                    <p>مليون ر.س</p>
                                </div>
                                <div class="d-flex flex-column ms-auto">
                                    <p>لديك مزايدة من</p>
                                    <h1>أحمد هشام</h1>
                                    <h3>قبل 35 دقيقة</h3>
                                </div>
                                <div class="circle d-flex align-items-center justify-content-center">
                                    <h1 class="text-uppercase m-0">AH</h1>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="d-flex flex-column">
                                    <h1>1.85</h1>
                                    <p>مليون ر.س</p>
                                </div>
                                <div class="d-flex flex-column ms-auto">
                                    <p>لديك مزايدة من</p>
                                    <h1>أحمد هشام</h1>
                                    <h3>قبل 35 دقيقة</h3>
                                </div>
                                <div class="circle d-flex align-items-center justify-content-center">
                                    <h1 class="text-uppercase m-0">AH</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-5 d-flex flex-column justify-content-center mt-5 mt-xl-0">
                    <h1>تقدم إلى المزادات العقارية الإلكترونية على منصتنا!</h1>
                    <div>
                        <button class="auction-btn btn-theme">
                            تصفح المزادات
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Auction Section Ends Here -->
    <!-- Apps Section Starts Here -->
    <div class="apps py-4 py-lg-0">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="col-12 col-lg-5 d-none d-lg-block mock-up">
                    <img src="{{theme_asset('assets/images/mockup.png')}}" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 text-end apps-content d-flex flex-column justify-content-center">
                    <h1>حمل التطبيق الآن</h1>
                    <h3>اضغط على الرابط لتحميل تطبيق خياراتي للهواتف الذكية وتصفح آلاف العقارات المعتمدة من فريقنا</h3>
                    <div class="d-flex flex-column flex-sm-row justify-content-end apps-store">
                        <img src="{{theme_asset('assets/images/google-store.png')}}" alt="google-store"
                             class="mb-3 mb-sm-0 img-fluid">
                        <img src="{{theme_asset('assets/images/apple-store.png')}}"
                             class="mb-3 mb-sm-0 ms-sm-4 img-fluid"
                             alt="apple-store">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Apps Section Ends Here -->
@endsection
