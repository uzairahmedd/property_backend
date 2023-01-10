@extends('theme::newlayouts.app')
@section('content')
<script>
    var page_time = '{{$time}}';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/post-property.css')}}">

<div class="container number-verify-property d-flex justify-content-center align-items-center">
    <div class="form-right d-flex justify-content-center align-items-center flex-column">
        <img class="d-flex justify-content-center align-items-center" src="{{asset('assets/images/logo.png')}}" alt="">
        <input type="text" id="otp" value="{{$user_data->otp}}">
        <span class="post-prop-otp-h">{{__('labels.verify_phone_num')}}</span>
        <span class="post-prop-otp-p">{{__('labels.otp_phone_num_received')}}</span>
        <span class="post-prop-otp-p">
            +966 {{ltrim($user_data->phone,0)}}
            <a href="/user-phone/verification/{{encrypt($user_data->id)}}" class="theme-text-sky me-2"><i class="fa-solid fa-pen edit-num-pen" title="Edit phone number" data-toggle='tooltip'></i></a>
        </span>
        <form id="verify_otp" class="form number_form mt-4">
            <!-- <input type="hidden" name="user_id" value="{{$user_data->id}}"> -->
            <input type="hidden" name="user_mobile" id="user_mbl" value="{{$user_data->phone}}">
            <div class="otp-div d-flex justify-content-center gap-3 mb-4">
                <div class="otp-box d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="otp-input" name="otp[]" maxlength="1" id="otp1" value="" type="text">
                    </div>
                </div>
                <div class="otp-box d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="otp-input" name="otp[]" maxlength="1" id="otp2" value="" type="text">
                    </div>
                </div>
                <div class="otp-box d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="otp-input" name="otp[]" maxlength="1" id="otp3" value="" type="text">
                    </div>
                </div>
                <div class="otp-box d-flex align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="otp-input" name="otp[]" maxlength="1" id="otp4" value="" type="text">
                    </div>
                </div>
            </div>
            <p id="error_msg" class="text-center d-none mb-0">{{__('labels.resend_link_expire')}}<span class="otp-time theme-text-blue font-weight-600"> {{__('labels.resubmit_link')}} </span>
            </p>
            <!-- <span class="post-prop-otp-p mt-2 mb-2 text-danger d-flex justify-content-center">{{__('labels.otp_received_enter')}}</span> -->
            <button type="submit" class="btn" id="submit_otp">{{__('labels.verify_otp')}}</button>
        </form>
        <span class="post-prop-otp-p mt-2" id="otp_error"></span>
        <span class="post-prop-otp-p mt-2" id="otp_notification"></span>
        <span class="post-prop-otp-p mt-2">{{__('labels.did_receive_code')}} <span class="theme-text-sky" id="resend_otp">{{__('labels.resend_code')}}</span></span>
        <div class="timer">
            <p class="text-center">{{__('labels.code_expire')}}<span class="minute theme-red font-24">00</span><span class="theme-text-blue font-24">:</span><span class="second theme-red font-24">00</span> {{__('labels.second')}}
            </p>
        </div>
        <!-- <span class="post-prop-otp-p mt-2">{{__('labels.wait')}} <span class="theme-text-sky">34</span> {{__('labels.second_receive_otp')}}</span> -->
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
<script src="{{theme_asset('assets/newjs/otp.js')}}" type="text/javascript"></script>
@endsection
