@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/post-property.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/intlTelInput.css')}}">

    <div class="container number-verify-property d-flex justify-content-center align-items-center">
        <div class="form-right d-flex justify-content-center align-items-center flex-column">
            <img class="d-flex justify-content-center align-items-center" src="{{asset('assets/images/logo.png')}}" alt="">

            <form id="form" class="form">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="radio-container developer">
                        <input type="radio" name="status" id="developer" value="27">
                        <span class="checmark font-16 font-medium">Developer</span>
                    </div>
                    <div class="radio-container px-3 broker">
                        <input type="radio" name="status" id="broker" value="26">
                        <span class="checmark font-16 font-medium">Broker</span>
                    </div>
                    <div class="radio-container owner">
                        <input type="radio" name="status" id="owner" value="26" class="owner" checked>
                        <span class="checmark font-16 font-medium">Owner</span>
                    </div>
                </div>
                <div class="btn-content select-account d-flex justify-content-end align-items-center mt-4">
                    <div class="form-check company">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Company
                        </label>
                    </div>
                    <div class="form-check indi-broker">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Individual Brokers
                        </label>
                    </div>
                    <div class="form-check">
                        <p class="pb-0 mb-0">I am</p>
                    </div>

                </div>
                <div class="cr-num mt-4">
                    <div class="form-group">
                        <label for="cr_number" class="d-flex justify-content-end">CR Number</label>
                        <input type="email" class="form-control" id="cr_number" placeholder="CR Number">
                    </div>
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
