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
                            <h1 class="font-24 font-medium theme-text-seondary-black mb-3">تفعيل الحساب</h1>
                            <div class="d-flex align-items-end justify-content-center font-16 mb-2">
                                <a href="/Update-phone/{{encrypt($user_data->id)}}" class="theme-text-sky me-2">تعديل</a>
                                <h3 class="font-medium theme-text-blue">[{{$user_data->phone}}]</h3>
                                <span class="theme-text-grey">ادخل كود التفعيل المرسل إلى الرقم</span>
                            </div>
                            <div id="otp_notification" style="color: green;"></div>
                            <form id="verify_otp">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user_data->id}}">
                                <input type="hidden" name="user_mobile" id="user_mbl" value="{{$user_data->phone}}">
                                <div class="d-flex align-items-center justify-content-center mb-4_5" style="gap:24px">
                                    <input type="text" name="otp[]" id="otp1" maxlength="1" value="" class="form-control">
                                    <input type="text" name="otp[]" id="otp2" maxlength="1" value="" maxlength="1" value="" class="form-control">
                                    <input type="text" name="otp[]" id="otp3" maxlength="1" value="" class="form-control">
                                    <input type="text" name="otp[]" id="otp4" maxlength="1" value="" class="form-control">
                                </div>
                                <span id="otp_error"></span>
                                <div class="col-6 mx-auto mb-4_5">
                                    <button type="submit" id="submit_otp" class="chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                                        التالي
                                        <i class=""></i> </button>
                                </div>
                            </form>
                            <span id="otp_error"></span>
                            <div class="timer">

                                <p>صلاحية الكود تنتهي خلال <span class="minute" style="color: red;">00</span><span style="font-size: 30px; color:red ">:</span><span class="second" style="color: red;">00</span> ثانية
                                </p>
                                <p id="error_msg" class="d-none">انتهت صلاحية الرمز الذي تم إدخالهئ,<span class="otp-time"> الرجاء النقر على رابط اعادة الارسال. </span>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center font-14">
                                <button type="submit" id="resend_otp">أرسل مرة أخرى</button>
                                <span class="theme-text-grey">لم يصلك كود التفعيل؟</span>
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