@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/profile.css')}}">
@php
$info = json_decode(Auth::User()->usermeta->content ?? '');
@endphp
<div class="profile d-flex justify-content-between">
    <div class="col-12 col-lg-9 px-4 px-lg-3 mx-auto">
        <div class="main-content">
            <div class="mb-4_5 d-flex flex-column-reverse flex-lg-row align-items-end  card personal-card justify-content-between align-items-lg-center">
                <div class="d-flex flex-column align-items-end">
                    <span class="font-16 theme-text-sky">{{__('labels.mobile_number')}}</span>
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/tick-verified.png')}}" alt="">

                        <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">{{Auth::User()->phone ?? 'N/A' }}</h3>

                    </div>
                </div>
                <div class="d-flex flex-column align-items-end mb-3 mb-lg-0">
                    <span class="font-16 theme-text-sky">{{__('labels.registered_since')}}</span>
                    <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->created_at->format('m/d/Y') }}</h3>
                </div>

                <form class="form-signin text-center" id="user_save_profile_form" method="post"
                      action="{{ route('agent.profile.img') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="image_id" name="id">
                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                        <div class="col d-flex flex-column align-items-end">
                            <span class="font-16 theme-text-sky">{{__('labels.welcome')}}</span>
                            <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->name }}</h3>
                        </div>
                        <div class="dp-elipse photo-row d-flex align-items-center justify-content-center">
                            <img class="photo-img" id="image_user" src="{{asset('assets/images/avatar.png')}}" alt="" class="img-fluid">
                            <div class="file-container">
                                <input onchange="doAfterSelectImage(this)" type="file" id="profile_pic" name="picture" />
                                <img src="{{asset('assets/images/dp-camera.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row gy-3 flex-wrap justify-content-between">
                <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                    <div class="card stat-card align-items-end">
                        <span class="font-16 theme-text-sky mb-2">
                            {{__('labels.views')}}
                        </span>
                        <h2 class="theme-text-blue font-medium">
                           N/A
                        </h2>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                    <div class="card stat-card align-items-end">
                        <span class="font-16 theme-text-sky mb-2">
                            {{__('labels.participated_auction')}}
                        </span>
                        <h2 class="theme-text-blue font-medium">
                        N/A
                        </h2>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                    <div class="card stat-card align-items-end">
                        <span class="font-16 theme-text-sky mb-2">{{__('labels.no_of_property')}}</span>
                        <h2 class="theme-text-blue font-medium">
                        {{ isset($property_count) ? $property_count : 'N/A'}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('theme::newlayouts.partials.sidebar')
</div>
@endsection
@section('account_js')
    <script src="{{theme_asset('assets/newjs/user_account.js')}}"></script>
@endsection


