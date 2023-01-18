@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/post-property.css')}}">
<link rel="stylesheet" href="{{theme_asset('assets/newcss/intlTelInput.css')}}">

<div class="container number-verify-property d-flex justify-content-center align-items-center">
    <div class="form-right d-flex justify-content-center align-items-center flex-column">
        <img class="d-flex justify-content-center align-items-center" src="{{asset('assets/images/logo.png')}}" alt="">
        <p class='d-flex justify-content-end mb-0'>{{__('labels.enter_phone_num')}}</p>
        <form id="form" method="post" action="{{ route('phone_register') }}" class="form number_form">
            @csrf
            <input type="hidden" name='id' value="{{!empty($user) ? encrypt($user->id) : ''}}">
            <div class="phone-div form-group">
                <input id="phone" name="phone" type="tel" value="{{!empty($user) ? ltrim($user->phone, '0') : old('phone')}}" class="form-control" placeholder="559851174">
            </div>
            @if($errors->has('phone'))
            <div class="error d-flex justify-content-end pt-1">{{ $errors->first('phone') }}</div>
            @endif
            <div class="otp-txt">
                <p>{{__('labels.four_digit_code')}}</p>
            </div>
            <button class="btn" id="btn">{{__('labels.next')}}</button>
        </form>
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