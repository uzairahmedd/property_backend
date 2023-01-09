@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/post-property.css')}}">
<link rel="stylesheet" href="{{theme_asset('assets/newcss/intlTelInput.css')}}">

<div class="container number-verify-property d-flex justify-content-center align-items-center">
    <div class="form-right d-flex justify-content-center align-items-center flex-column">
        <img class="d-flex justify-content-center align-items-center" src="{{asset('assets/images/logo.png')}}" alt="">
        <p class="d-flex justify-content-end align-self-end hello-name">{{__('labels.hello')}}&nbsp; <span>{{$user->name}}</span></p>
        <p class="d-flex justify-content-end align-self-end">{{__('labels.list_property_as_a')}}</p>

        <p id="owner_errors_msg" class="d-flex justify-content-end align-self-end"></p>
        <form method="post" id="owner_data_form" class="form owner-form" action="{{ route('add_user_id') }}">
            @csrf
            <input type="hidden" name="id" value="{{encrypt($user->id)}}">
            <div class="d-flex justify-content-center align-items-center">
                <div class="radio-container developer">
                    <input type="radio" name="status" id="developer" value="3" class="developer-input">
                    <span class="checmark font-16 font-medium">{{__('labels.developer')}}</span>
                </div>
                <div class="radio-container px-3 broker">
                    <input type="radio" name="status" id="broker" value="2" class="broker-input">
                    <span class="checmark font-16 font-medium">{{__('labels.broker')}}</span>
                </div>
                <div class="radio-container owner">
                    <input type="radio" name="status" id="owner" value="1" class="owner-input" checked>
                    <span class="checmark font-16 font-medium">{{__('labels.owner')}}</span>
                </div>
            </div>
            <div class="btn-content select-account d-flex flex-column-reverse flex-lg-row justify-content-end align-items-end mt-4">
                <div class="form-check company">
                    <input class="form-check-input" type="radio" name="account_select" value="5" id="company_input">
                    <label class="form-check-label" for="company">
                        {{__('labels.company')}}
                    </label>
                </div>
                <div class="form-check indi-broker">
                    <input class="form-check-input" type="radio" name="account_select" value="4" id="indi_broker">
                    <label class="form-check-label" for="indi_broker">
                        {{__('labels.individual_brokers')}}
                    </label>
                </div>
                <div class="form-check iam">
                    <p class="pb-0 mb-0">{{__('labels.iam')}}</p>
                </div>
            </div>
            <div class="cr-num mt-4">
                <div class="form-group">
                    {{-- <label for="cr_number" class="d-flex justify-content-end">{{__('labels.crnum')}}</label>--}}
                    <input type="text" name="cr_number" class="form-control" id="cr_number" placeholder="{{__('labels.crnum')}}">
                </div>
            </div>
            <div class="rega-num mt-4">
                <div class="form-group">
                    {{-- <label for="cr_number" class="d-flex justify-content-end">{{__('labels.rega_advertisement')}}</label>--}}
                    <input type="text" name="rega_number" class="form-control" id="rega_number" placeholder="{{__('labels.rega_advertisement')}}">
                </div>
            </div>
            <button class="btn mt-4" type="submit" id="btn_owner">{{__('labels.next')}}</button>
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

@section('select_owner')
<script src="{{ asset('assets/newjs/select_owner.js') }}"></script>
@endsection