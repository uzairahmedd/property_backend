@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/select-style.css')}}">
<!-- Header Section Starts Here -->
<div class="header d-flex flex-column align-items-center">
    <li class="col-12 col-sm-10 col-lg-8 col-xl-5">
        <h1 class="font-medium theme-text-white text-center">المنصة الحصرية للعقارات الموثقة في <span class="font-bold">المملكة</span></h1>
    </li>
    <div class="col-12 row looking-for theme-bg-white d-flex flex-lg-row flex-sm-row align-items-center">
        <div class="col-lg-2 search-button-div col-md-2 col-sm-2 col-xs-12" id="search">
            {{-- <button class="btn search-home-btn text-center" type="button">Button</button>--}}
            <a href="#" class="btn search-home-btn text-center" role="button">Search</a>
            <img class="search-home-img" src="{{theme_asset('assets/images/search.svg')}}" alt="">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="dropdown complete-rent-drop">
                <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                <button class="btn dropdown-toggle rent-dropdown-toggle rent-btn" role="button" id="dropdownMenuLink" onclick="" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">للايجار
                </button>
                <ul class="dropdown-menu rent-dropdown" aria-labelledby="dropdownMenuLink">
                    <div class="rent-dropdown-content">
                         <li class="rent-all">
                           <input class="rent-select-dropdown" value="بيع" type="radio" id="radio02-01" name="radio-btn" />
                           <label class="rent-box" for="radio02-01">بيع</label>
                       </li>
                       <li class="rent-all">
                           <input class="rent-select-dropdown drive_percent-box" value="ايجار" type="radio" id="radio02-02" name="radio-btn" checked />
                           <label class="rent-box" for="radio02-02">ايجار</label>
                       </li>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="dropdown complete-resident-drop">
                <span class="rent-toggle-icon" id="rent-t-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                <button class="btn dropdown-toggle resident-dropdown-toggle resident-btn" role="button" id="dropdownMenuLink1" onclick="" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">سكني
                </button>
                <ul class="dropdown-menu resident-dropdown" aria-labelledby="dropdownMenuLink1">
                    <div class="resident-dropdown-content">
                        <div class="row">
                            <div class="col-12 p-0">
                                <!-- Tab -->
                                <nav>
                                    <div class="nav nav-tabs mb-4 resident-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link resident-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">تجاري</a>
                                        <a class="nav-item nav-link resident-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">سكني</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="d-flex justify-content-between resident-centent">
                                            <div class="resident-pans">
                                                <li class="resident-pan" value="1">فیلا<i class="fa-solid fa-house-circle-check"></i></li>
                                                <li class="resident-pan" value="2">بنتهاوس<i class="fa-solid fa-house-flag"></i></li>
                                                <li class="resident-pan" value="3">شقة فندقية<i class="fa-solid fa-bed"></i></li>
                                                <li class="resident-pan" value="4">طابق سكني<i class="fa-solid fa-lines-leaning"></i></li>
                                            </div>
                                            <div class="resident-pans">
                                                <li class="resident-pan" value="5">شقة<i class="fa-solid fa-building-user"></i></li>
                                                <li class="resident-pan" value="6">تاون هاوس<i class="fa-solid fa-house-user"></i></li>
                                                <li class="resident-pan" value="7">فيلا مجمع سكني<i class="fa-solid fa-house-chimney-window"></i></li>
                                                <li class="resident-pan" value="8">ارض سكنية<i class="fa-solid fa-house-signal"></i></li>
                                                <li class="resident-pan" value="9">مبنى سكني<i class="fa-solid fa-building-flag"></i></li>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <button class="complete-btn"><a href="">تم</a></button>
                                            <button class="reset-btn"><a href="">إعادة ضبط</a></button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="d-flex justify-content-between resident-centent">
                                            <div class="resident-pans">
                                                <li class="resident-pan" value="10" data-val="1">محل تجاري<i class="fa-solid fa-store"></i></li>
                                                <li class="resident-pan" value="11" data-val="2">سكن عمال <i class="fa-solid fa-house-user"></i></li>
                                                <li class="resident-pan" value="12" data-val="3">مجمع سكني<i class="fa-solid fa-building-user"></i></li>
                                                <li class="resident-pan" value="13" data-val="4">طابق تجاري<i class="fa-solid fa-house-flood-water"></i></li>
                                                <li class="resident-pan" value="14" data-val="5">مصنع<i class="fa-solid fa-industry"></i></li>
                                                {{-- <li class="resident-pan" value="15" data-val="6">ارض استخدام متعدد<i class="fa fa-globe drop-icons" aria-hidden="true"></i></li>--}}
                                                <li class="resident-pan" value="16" data-val="7">عقارات تجارية اخرى<i class="fa-solid fa-sign-hanging"></i></li>
                                                <li class="resident-pan" value="17" data-val="7">ارض استخدام متعدد<i class="fa-solid fa-globe"></i></li>
                                            </div>
                                            <div class="resident-pans">
                                                <li class="resident-pan" value="18" data-val="9">مکتب<i class="fa-solid fa-briefcase drop-icons"></i></li>
                                                <li class="resident-pan" value="19" data-val="9">مستودع<i class="fa-solid fa-dumpster drop-icons"></i></li>
                                                <li class="resident-pan" value="20" data-val="10">فيلا تجارية<i class="fa-solid fa-building-user drop-icons"></i></li>
                                                <li class="resident-pan" value="21" data-val="11">ارض تجارية<i class="fa-solid fa-industry drop-icons"></i></li>
                                                <li class="resident-pan" value="22" data-val="12">مبنی تجاري<i class="fa-solid fa-dumpster-fire drop-icons"></i></li>
                                                <li class="resident-pan" value="23" data-val="13">ارض صناعية<i class="fa-solid fa-land-mine-on drop-icons"></i></li>
                                                <li class="resident-pan" value="24" data-val="14">معرض تجاري<i class="fa-solid fa-plane drop-icons"></i></li>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <button class="complete-btn"><a href="">تم</a></button>
                                            <button class="reset-btn"><a href="">إعادة ضبط</a></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of tab -->
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 search-input-bar">
{{--            <input type="search" class="theme-text-secondary-black border-0" placeholder="تبحث عن عقار؟">--}}
            <select class="theme-text-secondary-black border-0" theme="google" width="400" style="appearance: none;" placeholder=" تبحث عن عقار؟" data-search="true">
                <option class="d-none"></option>
                <option value="AX">الرياض<span class="property_num">(1)</span></option>
                <option value="AX">جدة<span class="property_num">(132)</span></option>
                <option value="AX">مكة المكرمة<span class="property_num">(1234)</span></option>
                <option value="AX">المدينة المنورة<span class="property_num">(143)</span></option>
                <option value="AX">جميع المدن<span class="property_num">(1234)</span></option>
                <option value="AX">الدمام<span class="property_num">(164)</span></option>
                <option value="AX">حائل<span class="property_num">(1454)</span></option>
                <option value="AX">الخبر<span class="property_num">(1765)</span></option>
            </select>
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
        @if(isset($status_properties['sell_property']) && count($status_properties['sell_property']) > 0)
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
            @foreach($status_properties['sell_property'] as $sale_data)
            @php
            $image='';
            if($sale_data->post_preview != null){
            $image = $sale_data->post_preview->media->url;
            }else{
            $image = asset('/') .'uploads/default.png';
            }
            @endphp
            <div class="listing">

                <div class="list" style="background-image: url({{$image}});">

                    <div class="content d-flex justify-content-between">
                        <div class="d-flex flex-column align-items-start theme-text-white">
                            <div class="sale theme-bg-sky">
                                <span class="font-medium">للبيع</span>
                            </div>
                            <!-- <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div> -->
                        </div>
                        @if (Auth::check())
                        <div class="fav-elipse d-flex align-items-center justify-content-center" onclick="favourite_property('{{$sale_data->id}}')">
                            <i class="fa-regular fa-heart" id="heart"></i>
                        </div>
                        @else
                        <div class="fav-elipse d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="fa-regular fa-heart" id="heart"></i>
                        </div>
                        @endif
                    </div>
                    <div class="price theme-text-white d-flex align-items-center justify-content-center">
                        <span class="font-bold">{{$sale_data->max_price->price}}- {{$sale_data->min_price->price}} مليون ر.س</span>
                    </div>
                </div>
                <a href="property/{{$sale_data->slug}}">
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">{{$sale_data->title}}</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">{{$sale_data->post_city->value}}</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
</div>
<!-- Property Listing Sale Section Ends Here -->
<!-- Property Listing Rent Section starts Here -->
<div class="property-listing property-rent">
    @if(isset($status_properties['rent_property']) && count($status_properties['rent_property']) > 0)
    <div class="container position-relative">
        <div class="property-listing-content d-flex align-items-center justify-content-between">
            <p class="mb-0 theme-text-sky font-medium"><a href="http://127.0.0.1:8000/list?status=26">عرض المزيد</a></p>
            <div class="d-flex align-items-center gap-3">
                <h2 class="mb-0 font-medium theme-text-blue">أضيفت مؤخرا</h2>
                <div class="chip font-medium theme-text-secondary">
                    <span>للايجار</span>
                </div>
            </div>
        </div>
        <div class="owl-carousel">
            @foreach($status_properties['rent_property'] as $rent_data)
            @php
            $rent_image='';
            if($rent_data->post_preview != null){
            $rent_image = $rent_data->post_preview->media->url;
            }else{
            $rent_image = asset('/') .'uploads/default.png';
            }
            @endphp
            <div class="listing">

                <div class="list" style="background-image: url({{$rent_image}});">

                    <div class="content d-flex justify-content-between">
                        <div class="d-flex flex-column align-items-start theme-text-white">
                            <div class="sale theme-bg-sky">
                                <span class="font-medium">للايجار</span>
                            </div>
                            <!-- <div class="sale theme-bg-blue">
                                    <span class="font-medium">متاح</span>
                                </div> -->
                        </div>
                        @if (Auth::check())
                        <div class="fav-elipse d-flex align-items-center justify-content-center" onclick="favourite_property('{{$rent_data->id}}')">
                            <i class="fa-regular fa-heart" id="heart"></i>
                        </div>
                        @else
                        <div class="fav-elipse d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="fa-regular fa-heart" id="heart"></i>
                        </div>
                        @endif
                    </div>
                    <div class="price theme-text-white d-flex align-items-center justify-content-center">
                        <span class="font-bold">{{$rent_data->max_price->price}}- {{$rent_data->min_price->price}} مليون ر.س</span>
                    </div>
                </div>
                <a href="property/{{$rent_data->slug}}">
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">{{$rent_data->title}}</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">{{$rent_data->post_city->value}}</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<!-- Property Listing Rent Section Ends Here -->
<!-- Property Sell and Buy section Starts Here -->
<div class="property-sl-r d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-10 col-lg-8 col-xl-5">
        <h1 class="font-bold theme-text-white mb-0">هل عندك عقار للبيع أو للإيجار</h1>
        <h3 class="mb-0 theme-text-white">يمكنك تسويق عقارك على موقعنا بكل سهولة، او بإمكانك تفويض فريق خياراتي لبيع
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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start">
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
                    <img src="{{theme_asset('assets/images/google-store.png')}}" alt="google-store" class="mb-3 mb-sm-0 img-fluid">
                    <img src="{{theme_asset('assets/images/apple-store.png')}}" class="mb-3 mb-sm-0 ms-sm-4 img-fluid" alt="apple-store">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Apps Section Ends Here -->
@endsection

@section('dropdown-select')
    <script src="{{theme_asset('assets/newjs/select-style.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $('select').selectstyle({
                width  : 400,
                height : 300,
                theme  : 'light',
                onchange : function(val){}
            });
        });
    </script>
@endsection


