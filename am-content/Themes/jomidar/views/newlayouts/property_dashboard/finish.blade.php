@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
{{--<link rel="stylesheet" href="{{theme_asset('css/app.css')}}">--}}
{{--<link rel="stylesheet" href="{{theme_asset('css/app.css')}}">--}}

<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
            <input type="hidden" name="user_id" value="{{encrypt(Auth::User()->id)}}">
            <div class="description-card card finished align-items-center">
                <h3 class="font-medium theme-text-seondary-black">{{__('labels.process_finished')}}</h3>
{{--                Check Mark Icon--}}
                <svg class="check-spinner" viewBox="0 0 100 100" width="100px" height="100px">
                    <defs>
                        <linearGradient id="cs-grad-1" x1="0.5" y1="0" x2="0.5" y2="1">
                            <stop offset="0%" stop-color="hsl(0,0%,100%)" />
                            <stop offset="100%" stop-color="hsl(0,0%,80%)" />
                        </linearGradient>
                        <linearGradient id="cs-grad-2a" x1="0.5" y1="0" x2="0.5" y2="1" gradientTransform="rotate(90,0.5,0.5)">
                            <stop offset="0%" stop-color="hsl(123,90%,55%)" />
                            <stop offset="100%" stop-color="hsl(183,90%,25%)" />
                        </linearGradient>
                        <linearGradient id="cs-grad-2b" x1="0.5" y1="0" x2="0.5" y2="1">
                            <stop offset="0%" stop-color="hsl(123,90%,55%)" />
                            <stop offset="100%" stop-color="hsl(183,90%,25%)" />
                        </linearGradient>
                    </defs>
                    <circle class="check-spinner__circle" cx="50" cy="50" r="0" fill="url(#cs-grad-1)" />
                    <circle class="check-spinner__worm-a" cx="50" cy="50" r="46" fill="none" stroke="url(#cs-grad-2a)" stroke-width="8" stroke-linecap="round" stroke-dasharray="72.2 216.8" stroke-dashoffset="36.1" transform="rotate(-90,50,50)" />
                    <path class="check-spinner__worm-b" d="M 17.473 17.473 C 25.797 9.15 37.297 4 50 4 C 75.4 4 96 24.6 96 50 C 96 75.4 75.4 96 50 96 C 24.6 96 4 75.4 4 50 C 4 44.253 6.909 36.33 12.5 35 C 21.269 32.913 35 50 35 50 L 45 60 L 65 40" fill="none" stroke="url(#cs-grad-2b)" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="0 0 72.2 341.3" />
                </svg>
                <p class="col-7 text-center font-18 theme-text-seondary-black ads-p">{{__('labels.property_published')}}</p>
                <div class="col-7 note-txt" style="">
                    <p class="font-18 p-0 m-0"><b>{{__('labels.note')}}</b>
                        {{__('labels.note_text_property_finish')}}
                    </p>
                </div>
                <div class="d-flex align-items-center mb-4_5 advertise-document">
                    <img src="{{asset('assets/images/tick-verified.png')}}" alt="">
                    <span class="font-16 font-medium theme-text-sky mb-0 ms-2">{{__('labels.advertisement_document')}}</span>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="request text-center b-r-8">
                        <p class="font-medium theme-text-seondary-black">{{__('labels.request_for_property')}}</p>
                        <input disabled type="phone" name="phone" value="{{ Auth::User()->phone ?? '' }}" placeholder="رقم الجوال" class="form-control theme-border">
                        <!-- <div class="d-flex">
                            <a  href="/Update-phone/{{encrypt(Auth::User()->id)}}" class="btn modify-btn font-medium font-14 theme-text-white b-r-8">{{__('labels.modify')}} <i class=""></i> </a>
                        </div> -->
                        <span id="phone_errors"></span>
                    </div>
                    <a href="{{ route('agent.property.property_list') }}" class="btn btn-theme-secondary my-ads-btns w-100 theme-text-sky center_property">{{__('labels.my_properties')}}</a>
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
