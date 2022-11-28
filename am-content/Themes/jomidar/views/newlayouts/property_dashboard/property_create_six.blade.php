@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
    <div class="add-property row-style">
        <div class="head text-center">
            <h1 class="font-bold theme-text-white pt-5">أدرج عقارك معنا</h1>
            <p class="theme-text-white font-medium mb-0 mt-2">يمكنك بسهولة تسويق عقارك على موقعنا</p>
        </div>
        @include('theme::newlayouts.partials.user_header')
        <!-- Property Description Section Starts Here -->
        <div class="container">
        <form method="post" action="{{ route('agent.property.six_update_property',$id) }}" class="post_form">
            @csrf
            @method('PUT')
            <div class="description-card card align-items-end">
                <div class="col-12 d-flex mt-n3 font-medium">
                    <span class="theme-text-sky ">6</span>/
                    <span class="theme-text-seondary-black">6</span>
                </div>
                <p class="font-18 theme-text-seondary-black" style="margin-bottom: 10px;">لماذا توثيق العقار</p>
                <ul class="img-ul mb-4_5">
                    <li class="mb-3 font-14 theme-text-sky">عرضة أيقونة موثق على العقار و كسب ثقة المستخدمين</li>
                    <li class="mb-3 font-14 theme-text-sky">أولوية في نتائج البحث</li>
                    <li class="mb-3 font-14 theme-text-sky">ضمان تواصل مع المستخدمين أكثر</li>
                </ul>
                <div class="document row theme-gx-32 justify-content-end">
                    <div class="col-xl-5 col-lg-4 id-number col-md-6 col-sm-12 d-flex flex-column align-items-end">
                        <label for="" class="font-18 theme-text-seondary-black">رقم الصك</label>
                        <input type="text" name="id_number"  placeholder="الرجاء ادخال الكود ( تم ارساله لك عبر الرسالة نصية  )"
                               class="form-control payment theme-border">
                    </div>
                    <div class="col-xl-5 col-lg-4 id-number col-md-6 col-sm-12 d-flex flex-column align-items-end">
                        <label for="" class="font-18 theme-text-seondary-black">رقم الهوية</label>
                        <input type="text" name="instrument_number" placeholder="10251511212151" 
                               class="form-control payment theme-border">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">التالي</button>
                <button class="btn btn-theme-secondary previous_btn">السابق</button>
            </div>
            </form>   
        </div>
        <!-- Property Description Section Ends Here -->
    </div>
@endsection
