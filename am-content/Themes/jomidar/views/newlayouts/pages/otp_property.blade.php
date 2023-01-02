@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/post-property.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/intlTelInput.css')}}">

    <div class="container number-verify-property d-flex justify-content-center align-items-center">
        <div class="form-right d-flex justify-content-center align-items-center flex-column">
            <img class="d-flex justify-content-center align-items-center" src="{{asset('assets/images/logo.png')}}" alt="">
            <span class="post-prop-otp-h">{{__('labels.verify_phone_num')}}</span>
            <span class="post-prop-otp-p">{{__('labels.otp_phone_num_received')}}</span>
            <span class="post-prop-otp-p">+966 576422052</span>
            <form id="form" class="form number_form mt-4">
               <div class="otp-div d-flex justify-content-center gap-3 mb-4">
                    <div class="otp-box d-flex align-items-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="otp-input" type="text">
                        </div>
                    </div>
                   <div class="otp-box d-flex align-items-center">
                       <div class="d-flex justify-content-center align-items-center">
                           <input class="otp-input" type="text">
                       </div>
                   </div>
                   <div class="otp-box d-flex align-items-center">
                       <div class="d-flex justify-content-center align-items-center">
                           <input class="otp-input" type="text">
                       </div>
                   </div>
                   <div class="otp-box d-flex align-items-center">
                       <div class="d-flex justify-content-center align-items-center">
                           <input class="otp-input" type="text">
                       </div>
                   </div>
               </div>
                <span class="post-prop-otp-p mt-2 mb-2 text-danger d-flex justify-content-center">{{__('labels.otp_received_enter')}}</span>
                <button class="btn" id="btn">{{__('labels.verify_otp')}}</button>
            </form>
            <span class="post-prop-otp-p mt-2">{{__('labels.did_receive_code')}} <span class="theme-text-sky">{{__('labels.resend_code')}}</span></span>
            <span class="post-prop-otp-p mt-2">{{__('labels.wait')}} <span class="theme-text-sky">34</span> {{__('labels.second_receive_otp')}}</span>
        </div>
        <div class="form-left">
            <div class="d-flex">
                <i class="fas fa-check d-flex justify-content-center align-items-center"></i>
                <h4>{{__('labels.instant_queries')}}</h4>
                <h5>{{__('labels.que_over_sms_email')}}</h5>
            </div>
            <div>
                <i class="fas fa-check d-flex justify-content-center align-items-center"></i>
                <h4>{{__('labels.lack_buyer')}}</h4>
                <h5>{{__('labels.access_buyer')}}</h5>
            </div>
            <div>
                <i class="fas fa-check d-flex justify-content-center align-items-center"></i>
                <h4>{{__('labels.property_info')}}</h4>
                <h5>{{__('labels.property_detail')}}</h5>
            </div>
        </div>
    </div>
@endsection

@section('post_property_js')
    <script src="{{ asset('assets/newjs/intlTelInput.js') }}"></script>
    <script src="{{ asset('assets/newjs/post_property.js') }}"></script>
@endsection
