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
            <input type="hidden" name="user_id" value="{{encrypt(Auth::User()->id)}}">
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
                        <input type="phone" name="phone" value="{{ Auth::User()->phone ?? '' }}" placeholder="رقم الجوال" class="form-control theme-border">
                        <div class="d-flex">
                            <a  href="/Update-phone/{{encrypt(Auth::User()->id)}}" class="btn modify-btn font-medium font-14 theme-text-white b-r-8">تعديل <i class=""></i> </a>
                        </div>
                        <span id="phone_errors"></span>
                    </div>
                    <a href="{{ route('agent.property.property_list') }}" class="btn btn-theme-secondary my-ads-btns w-100 theme-text-sky center_property">إعلاناتي</a>
                </div>
            </div>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection
@push('js')
<!-- <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script> -->
<script src="{{theme_asset('assets/newjs/property_create.js')}}"></script>
@endpush