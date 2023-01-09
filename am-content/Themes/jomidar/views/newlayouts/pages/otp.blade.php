@extends('theme::newlayouts.app')
@section('content')
<script>
    var page_time = '{{$time}}';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/term.css')}}">
<div>
    <!-- Otp Modal Starts Here -->
    <div class="otp-modal theme-bg-white theme-modal" id="otpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body px-0 position-relative">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="text-center w-100 bg-otp-clr">
                            <img src="{{theme_asset('assets/images/Verification 1.png')}}" alt="">
                            <input type="text" id="otp" value="{{$user_data->otp}}">
                            <!-- <input type="text" value="{{$time}}"> -->
                            <h1 class="font-24 font-medium theme-text-seondary-black mb-3">{{__('labels.activate_account')}}</h1>
                            <div class="d-flex align-items-end justify-content-center font-16 mb-2 modify-txt">
                                <a href="/Update-phone/{{encrypt($user_data->id)}}" class="theme-text-sky me-2">{{__('labels.modify')}}</a>
                                <h3 class="font-24 theme-text-blue">[{{$user_data->phone}}]&nbsp;</h3>
                                <span class="theme-text-grey">{{__('labels.activation_code')}}</span>
                            </div>
                            <form id="verify_otp">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user_data->id}}">
                                <input type="hidden" name="user_mobile" id="user_mbl" value="{{$user_data->phone}}">
                                <div class="d-flex align-items-center justify-content-center mb-4_5 otp-inputs" style="gap:24px">
                                    <input type="text" name="otp[]" id="otp1" maxlength="1" value="" class="form-control">
                                    <input type="text" name="otp[]" id="otp2" maxlength="1" value="" class="form-control">
                                    <input type="text" name="otp[]" id="otp3" maxlength="1" value="" class="form-control">
                                    <input type="text" name="otp[]" id="otp4" maxlength="1" value="" class="form-control">
                                </div>

                                <div class="col-6 mx-auto mb-4_5">
                                    <span id="otp_error"></span>
                                    <div id="otp_notification"></div>
                                    <button type="submit" id="submit_otp" class="chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                                        {{__('labels.next')}}
                                        <i class=""></i> </button>
                                </div>
                            </form>
                            <span id="otp_error"></span>
                            <div class="timer">
                                <p  class="text-center">{{__('labels.code_expire')}}<span class="minute theme-red font-24">00</span><span class="theme-text-blue font-24">:</span><span class="second theme-red font-24">00</span> {{__('labels.second')}}
                                </p>
                              <p id="error_msg" class="text-center d-none mb-0">{{__('labels.resend_link_expire')}}<span class="otp-time theme-text-blue font-weight-600"> {{__('labels.resubmit_link')}} </span>
                              </p>
                            </div>
                            <div class="d-flex justify-content-center font-14 resend-txt">
                                <button type="submit" class="border-0 theme-red font-weight-600" id="resend_otp">{{__('labels.resend')}}&nbsp;</button>
                                <span class="theme-text-grey">{{__('labels.resend_activate_code')}}</span>
                            </div>
                        </div>
                    </div>
                    {{-- <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Otp Modal Ends Here -->
</div>
@endsection
@section('OTPScript')
<script src="{{theme_asset('assets/newjs/otp.js')}}" type="text/javascript"></script>
@endsection