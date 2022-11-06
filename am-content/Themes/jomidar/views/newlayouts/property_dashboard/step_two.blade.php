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
                        <img src="{{asset('assets/images/avatar.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Property Description Section Starts Here -->
        <div class="container">
            <div class="description-card card">
                <div class="d-flex flex-column align-items-end">
                    <div class="col-12 d-flex mt-n3 font-medium">
                        <span class="theme-text-sky ">2</span>/
                        <span class="theme-text-seondary-black">6</span>
                    </div>
                    <p class="theme-text-black font-18">طبيعة العقار</p>
                    <div class="row theme-gx-3 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="property" id="">
                            <span class="checmark font-16 font-medium">تجاري</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="property" id="" checked>
                            <span class="checmark font-16 font-medium">سكني</span>
                        </div>
                    </div>
                    <p class="theme-text-black font-18">نوع العقار</p>
                    <div class="col-12 justify-content-end property_types row theme-gx-3 mb-4_5">
                        <div class="radio-container property_radio">
                            <input type="radio" name="property-type" id="">
                            <span class="checmark font-16 font-medium">استراحة</span>
                        </div>
                        <div class="radio-container property_radio">
                            <input type="radio" name="property-type" id="">
                            <span class="checmark font-16 font-medium">شاليه</span>
                        </div>
                        <div class="radio-container property_radio">
                            <input type="radio" name="property-type" id="">
                            <span class="checmark font-16 font-medium">دوبلكس</span>
                        </div>
                        <div class="radio-container property_radio">
                            <input type="radio" name="property-type" id="">
                            <span class="checmark font-16 font-medium">عمارة</span>
                        </div>
                        <div class="radio-container property_radio">
                            <input type="radio" name="property-type" id="">
                            <span class="checmark font-16 font-medium">أرض سكنية</span>
                        </div>
                        <div class="radio-container property_radio">
                            <input type="radio" name="property-type" id="">
                            <span class="checmark font-16 font-medium">فيلا</span>
                        </div>
                        <div class="radio-container property_radio">
                            <input type="radio" name="property-type" id="" checked>
                            <span class="checmark font-16 font-medium">شقة</span>
                        </div>
                    </div>
                    <!-- property value Section Starts Here -->
                    <div class="col-12 d-flex flex-column-reverse flex-lg-row property-value">
                        <div class="col-lg-6 col-md-12 flex-column">
                            <div class="d-flex justify-content-end mb-2">
                                <div class="row d-flex yesno-btn gx-2">
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="property-type" id="" checked>
                                        <span class="checmark font-16 font-medium">لا</span>
                                    </div>
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="property-type" id="">
                                        <span class="checmark font-16 font-medium">نعم</span>
                                    </div>
                                </div>
                                <p class="mb-0 font-18 theme-text-seondary-black meter_txt">هل يوجد عداد كهرباء</p>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <div class="row d-flex yesno-btn justify-content-start gx-2">
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="property-type" id="" checked>
                                        <span class="checmark font-16 font-medium">لا</span>
                                    </div>
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="property-type" id="">
                                        <span class="checmark font-16 font-medium">نعم</span>
                                    </div>
                                </div>
                                <p class="mb-0 font-18 theme-text-seondary-black meter_txt">هل يوجد عداد كهرباء</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 d-flex add-address justify-content-end">
                            <div class="col-lg-8 col-md-10 col-sm-12 d-flex flex-column align-items-end">
                                <label for="" class="font-14 theme-text-seondary-black">عنوان العقار</label>
                                <div class="position-relative d-flex align-items-center w-100">
                                    <input type="text" name="" id="" placeholder="المدينة"
                                           class="form-control theme-border">
                                    <span class="font-14 font-medium position-absolute theme-text-blue price-unit">ر.س</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- property value Section Ends Here -->
                    <!-- Street Section Starts Here -->
                    <p class="theme-text-black font-18">عدد الشوارع</p>
                    <div class="row row d-flex flex-row-reverse justify-content-end flex-lg-row gx-2">
                        <div class="radio-container">
                            <input type="radio" name="streets" id="">
                            <span class="checmark font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="streets" id="">
                            <span class="checmark font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="streets" id="">
                            <span class="checmark font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="streets" id="" checked>
                            <span class="checmark font-16 font-medium">1</span>
                        </div>
                    </div>
                    <!-- Street Section Ends Here -->
                    {{--input with dropdown button start--}}
                    <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end mt-5">
                        <div class="col-lg-5 col-md-4 col-sm-12 d-flex align-items-end">
                            <div class="dropdown regional-drop d-flex">
                                <button class="btn dropdown-toggle regional-drop-btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    الواجهة
                                </button>
                                <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">
                                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                                    <li><a class="dropdown-item" href="#">Option 3</a></li>
                                </ul>
                                <p class="ps-3">متر</p>
                            </div>
                            <div class="position-relative d-flex flex-column align-items-end w-100">
                                <label for="" class="font-14 theme-text-seondary-black"> معلومات الشارع 2</label>
                                <input type="text" name="" id="" placeholder="عرض الشارع" class="form-control street_view theme-border">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-4 col-sm-12 regional-street-1 d-flex align-items-end">
                            <div class="dropdown regional-drop d-flex">
                                <button class="btn dropdown-toggle regional-drop-btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    الواجهة
                                </button>
                                <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">
                                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                                    <li><a class="dropdown-item" href="#">Option 3</a></li>
                                </ul>
                                <p class="ps-3">متر</p>
                            </div>
                            <div class="position-relative d-flex flex-column align-items-end w-100">
                                <label for="" class="font-14 theme-text-seondary-black"> معلومات الشارع 1</label>
                                <input type="text" name="" id="" placeholder="عرض الشارع" class="form-control street_view theme-border">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button class="btn btn-theme"><a href="step_three">التالي</a></button>
                <button class="btn btn-theme-secondary previous_btn">السابق</button>
            </div>
        </div>
        <!-- Property Description Section Ends Here -->
    </div>
@endsection
