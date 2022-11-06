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
            <div class="description-card card">
                <div class="d-flex flex-column align-items-end">
                    <div class="col-12 d-flex mt-n3 font-medium">
                        <span class="theme-text-sky ">3</span>/
                        <span class="theme-text-seondary-black">6</span>
                    </div>
                    <!-- Bedroom Section Starts Here -->
                    <p class="theme-text-black font-18">غرف النوم</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="bedroom" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bedroom" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bedroom" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bedroom" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bedroom" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bedroom" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bedroom" id="" checked>
                            <span class="checmark checkmark-step3 font-16 font-medium">استوديو</span>
                        </div>
                    </div>
                    <!-- Bedroom Section Ends Here -->
                    <!-- Bathrooms Section Starts Here -->
                    <p class="theme-text-black font-18">دورات المياه</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="bathrooms" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bathrooms" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bathrooms" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bathrooms" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bathrooms" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="bathrooms" id="" checked>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                    </div>
                    <!-- Bathrooms Section Ends Here -->
                    <!-- lounges Section Starts Here -->
                    <p class="theme-text-black font-18">صالات</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="lounges" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="lounges" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="lounges" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="lounges" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="lounges" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="lounges" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="lounges" id="" checked>
                            <span class="checmark checkmark-step3 font-16 font-medium">غير متوفر</span>
                        </div>
                    </div>
                    <!-- lounges Section Ends Here -->
                    <!-- Boards Section Starts Here -->
                    <p class="theme-text-black font-18">مجالس</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="boards" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="boards" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="boards" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="boards" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="boards" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="boards" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="boards" id="" checked>
                            <span class="checmark checkmark-step3 font-16 font-medium">غير متوفر</span>
                        </div>
                    </div>
                    <!-- Boards Section Ends Here -->
                    <!-- Parking Section Starts Here -->
                    <p class="theme-text-black font-18">عدد المواقف</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="parking" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="parking" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="parking" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="parking" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="parking" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="parking" id="" checked>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                    </div>
                    <!-- Parking Section Ends Here -->
                    <!-- Furnishing Section Starts Here -->
                    <p class="theme-text-black font-18">التأثيث</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="furnishing" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">غير مفروشة</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="furnishing" id="">
                            <span class="checmark checkmark-step3 font-16 font-medium">نص مفروشة</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="furnishing" id="" checked>
                            <span class="checmark checkmark-step3 font-16 font-medium">مفروشة</span>
                        </div>
                    </div>
                    <!-- Furnishing Section Ends Here -->

                </div>
                <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end mt-5">
                    <div class="col-lg-6 col-md-8 col-sm-12 regional-street-1 d-flex align-items-end">
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
            <div class="d-flex justify-content-between description-btn-group">
                <button class="btn btn-theme"><a href="step_four">التالي</a></button>
                <button class="btn btn-theme-secondary previous_btn">السابق</button>
            </div>
        </div>
        <!-- Property Description Section Ends Here -->
    </div>
@endsection
