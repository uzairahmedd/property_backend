@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<link rel="stylesheet" href="{{theme_asset('css/app.css')}}">

<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
            <input type="hidden" name="user_id" value="{{encrypt(Auth::User()->id)}}">
            <div class="description-card card finished align-items-center">
                <h3 class="font-medium theme-text-seondary-black">{{__('labels.process_finished')}}</h3>
                <img src="{{asset('assets/images/finished.svg')}}" alt="">
                <p class="col-7 text-center font-18 theme-text-seondary-black ads-p">{{__('labels.property_published')}}</p>
                <div class="d-flex align-items-center mb-4_5 advertise-document">
                    <img src="{{asset('assets/images/tick-verified.png')}}" alt="">
                    <span class="font-16 font-medium theme-text-sky mb-0 ms-2">{{__('labels.advertisement_document')}}</span>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="request text-center b-r-8">
                        <p class="font-medium theme-text-seondary-black">{{__('labels.request_for_property')}}</p>
                        <input type="phone" name="phone" value="{{ Auth::User()->phone ?? '' }}" placeholder="رقم الجوال" class="form-control theme-border">
                        <div class="d-flex">
                            <a  href="/Update-phone/{{encrypt(Auth::User()->id)}}" class="btn modify-btn font-medium font-14 theme-text-white b-r-8">{{__('labels.modify')}} <i class=""></i> </a>
                        </div>
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
