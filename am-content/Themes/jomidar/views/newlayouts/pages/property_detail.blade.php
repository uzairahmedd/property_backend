@extends('theme::newlayouts.app')
@push('css')
<link rel="stylesheet" href="{{ theme_asset('assets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('assets/css/magnific-popup.css') }}">
@endpush
@section('content')
{{-- User profile CSS--}}
<link rel="stylesheet" href="{{theme_asset('assets/newcss/profile.css')}}">
<!-- Heder Sections Start Here -->
<div class="item-header pt-5">
    <div class="container">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end align-items-center">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item active theme-text-seondary-black" aria-current="page">{{ $property->title }}</li>
                <li class="breadcrumb-item"><a href="#" class="theme-text-blue text-decoration-none">{{$property->property_status_type->category->name}}</a></li>
                <li class="breadcrumb-item"><a href="/" class="theme-text-blue text-decoration-none">الرئيسية</a>
                </li>
            </ul>
        </nav>
        <div class="d-flex flex-wrap-reverse justify-content-end justify-content-lg-between align-items-center my-3">
            <div class="col-12 col-lg-8 col-xl-7 col-xxl-6">
                <ul class="detail list-unstyled mb-0 d-flex flex-column flex-sm-row align-items-end justify-content-between align-items-sm-center">
                    {{-- <li class="d-flex mb-3 mb-sm-0">--}}
                    {{-- <span>مشاركة</span>--}}
                    {{-- <div class="icon d-flex align-items-center justify-content-center">--}}
                    {{-- <img src="{{theme_asset('assets/images/share.png')}}" alt="">--}}
                    {{-- </div>--}}
                    {{-- </li>--}}

                    <li class="d-flex mb-3 mb-sm-0">
                        <span>مشاركة</span>
                        <div class="btn btn-primary dropdown-toggle icon d-flex align-items-center justify-content-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{theme_asset('assets/images/share.png')}}" class="border-0" alt="">
                        </div>
                        <ul class="dropdown-menu share-dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-brands fa-pinterest-p"></i> Pinterest</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-envelope"></i> Gmail</a></li>
                        </ul>
                    </li>





                    <li class="d-flex mb-3 mb-sm-0">
                        <span>حفظ</span>
                        @if (Auth::check())
                        <input type="hidden" value="{{ route('property.favourite') }}" id="favourite_property_url">
                        @php
                        $data = DB::table('terms_user')->where([
                        ['terms_id',$property->id],
                        ['user_id',Auth::User()->id]
                        ])->first(); Auth::User()->favourite_properties()->first();
                        if($data)
                        {
                        $property_id = $data->terms_id;
                        }else{
                        $property_id = null;
                        }
                        @endphp
                        <a href="javascript:void(0)" onclick="favourite_property('{{ $property->id }}')" id="favourite_btn" class="{{ $property_id == $property->id ? 'active' : '' }}">
                            {{-- <span class="iconify" data-icon="cil:heart" data-inline="false"></span>--}}
                            <i class="fa-regular fa-heart" id="heart"></i>
                        </a>
                        @else
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#contactModal">
                            {{-- <span class="iconify" data-icon="cil:heart" data-inline="false"></span>--}}
                            <i class="fa-regular fa-heart" id="heart"></i>
                        </a>
                        @endif
                    </li>
                    <li class="d-flex mb-3 mb-sm-0">
                        <span><span class="theme-text-blue font-bold">{{ $property->reviews_count }}</span> {{ __('Reviews') }}</span>
                    </li>
                </ul>
            </div>
            <h1 class="title font-medium theme-text-seondary-black mb-3 mb-lg-0">{{ $property->title }}</h1>
        </div>
    </div>
    <!-- Slider Starts Here -->
    <div class="container p-0">
        <div id="carouselExampleIndicators" class="carousel slide d-flex px-4 px-md-0" data-bs-ride="true">
            <div class="carousel-indicators mb-1 mb-md-4">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <button class="carousel-control-prev me-2 ms-4" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <div class="carousel-inner item-carousel b-r-8">
                @if($property->multiple_images)
                @foreach ($property->multiple_images as $key=>$media)
                <div class="carousel-item  {{  $key == 0 ? 'active' : '' }}">
                    <img src="{{ $media->media->url }}" class="d-block w-100 b-r-8" alt="...">
                </div>

                @endforeach
                @endif

                <div class="carousel-item active">
                    <img src="{{ $property->post_preview->media->url ?? asset('uploads/default.png') }}" class="d-block w-100 b-r-8" alt="...">
                </div>


            </div>

            <button class="carousel-control-next ms-2 me-4" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Slider Ends Here -->
</div>
<!-- Heder Sections Ends Here -->
<!-- Property Detail section -->
<div class="property-detail my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-xxl-5">
                <div class="card text-end theme-bg-white align-items-end">
                    <h1 class="theme-text-blue font-medium">{{ amount_format($property->min_price->price ?? 0) }} - {{ amount_format($property->max_price->price ?? 0) }}</h1>
                    <hr>
                    <h3 class="font-medium mb-2">العنوان</h3>
                    <div class="d-flex align-items-start justify-content-end mb-4">
                        <p class="mb-0 theme-text-seondary-black me-2">{{$property->post_city->value}} - {{$property->post_city->category->name}} - {{$property->post_state->category->name}}
                        </p>
                        <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                    </div>
                    <ul class="list-unstyled d-flex flex-column flex-sm-row align-items-end mb-5 flex-wrap justify-content-end">
                        @if($property->option_data)
                        @foreach ($property->option_data as $value)
                        <li class="d-flex align-items-center mb-3 mb-sm-3">
                            <span> {{ $value->value }}</span>
                            @if($value->category->name =='Bathrooms')

                            <img src="{{theme_asset('assets/images/shower.png')}}" title="{{ $value->category->name }}" data-toggle="tooltip" alt="">
                            @elseif($value->category->name =='Bedrooms')
                            <img src="{{theme_asset('assets/images/room.png')}}" title="{{ $value->category->name }}" data-toggle="tooltip" alt="">
                            @endif
                        </li>

                        @endforeach
                        @endif
                        @foreach ($property->floor_plans as $key=>$floor)
                        @php
                        $data = json_decode($floor->content);
                        @endphp
                        <li class="d-flex align-items-center mb-3 mb-sm-3">
                            <span> {{ $data->name }} {{ $data->square_ft }} {{ __('sq ft') }}</span>
                            <img src="{{theme_asset('assets/images/area.png')}}" alt="">
                        </li>
                        @endforeach
                    </ul>
                    @php
                    $info = isset($property->user->usermeta->content) ? json_decode($property->user->usermeta->content) : null ;
                    @endphp
                    <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                        <button class="contact-btn col-12 col-sm-7 theme-bg-sky border-0 theme-text-white font-medium mb-sm-0">
                            <img src="{{theme_asset('assets/images/phone.png')}}" alt="" class="phone me-2">
                            {{ isset($info->phone) ? $info->phone : 'N/A'  }}
                        </button>
                        <button class="contact-btn col-12 col-sm-4 theme-bg-white border-0 theme-text-blue font-medium" data-bs-toggle="modal" data-bs-target="#SendMsgModal">
                            <img src="{{theme_asset('assets/images/booking-calender.png')}}" alt="" class="me-3">
                            حجز موعد
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xxl-7">
                <div class="d-flex flex-column align-items-end py-4">
                    <div class="d-flex justify-content-between w-100 mb-2">
                        <h1 class="font-24 theme-text-blue font-medium">{{$property->property_status_type->category->name}}</h1>
                        <h1 class="font-24 theme-text-blue">{{ __('Description') }}</h1>
                    </div>
                    <p class="theme-text-seondary-black font-16 text-end mb-2">{{ content_format($property->content->content ?? '') }}</p>
                    <hr class="w-100">
                    <h1 class="font-24 theme-text-blue">{{ __('Detail & Information') }}</h1>
                    @if($property->option_data)
                    @foreach ($property->option_data as $value)
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start">
                            <h3 class="font-16 font-medium theme-text-blue">{{ $value->value }}</h3>
                        </div>
                        <div class="col-6 text-end">
                            <span class="font-16 theme-text-seondary-black">{{ $value->category->name }}</span>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start">
                            <h3 class="font-16 font-medium theme-text-blue">No info avaialable</h3>
                        </div>
                    </div>
                    @endif

                    <hr class="w-100">
                    <h1 class="font-24 theme-text-blue">{{ __('Distance key between facilities') }}</h1>
                    @if ($property->facilities_get->count() > 0)
                    @foreach ($property->facilities_get as $facility)
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start">
                            <h3 class="font-16 font-medium theme-text-blue">{{ $facility->value }}{{ __('KM') }}</h3>
                        </div>
                        <div class="col-6 text-end">
                            <span class="font-16 theme-text-seondary-black">{{ $facility->category->name }}</span>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start">
                            <h3 class="font-16 font-medium text-right theme-text-blue">No facilities avaialable</h3>
                        </div>
                    </div>
                    @endif
                    <hr class="w-100">
                    <h1 class="font-24 theme-text-blue mb-3 mt-2">مميزات العقار</h1>
                    <div class="tags d-flex flex-wrap justify-content-end prop-feature">
                        @if (isset($features))
                        @foreach ($features as $facility)
                        <div class="tag d-flex justify-content-center align-items-center mb-2">
                            <h3 class="font-16 font-medium theme-text-blue">{{ $facility->name }}</h3>
                        </div>
                        @endforeach
                        @else
                        <div class="tag d-flex justify-content-center align-items-center">
                            <h3 class="font-16 font-medium theme-text-blue">No feature avaialable</h3>
                        </div>
                        @endif
                    </div>
                </div>
                @isset($property->post_city->value)
                <div class="theme-bg-secondary text-center mb-0 pb-0 position-relative">
                    <h3 class="font-medium font-24 theme-text-white pb-2 pt-1">اسم الحي</h3>
                    <iframe id="gmap_canvas" width="100%" height="400" src="https://maps.google.com/maps?q={{ $property->post_city->value }}%20&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
                @endif
                <!-- @isset($property->latitude->value)
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5>{{ __('Street View') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <input type="hidden" value="{{ $property->latitude->value }}" id="latitude">
                                    <input type="hidden" value="{{ $property->longitude->value }}" id="longitude">
                                    <div id="street-view"></div>
                                </div>
                            </div>
                            @endisset -->
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="property_id" value="{{ $property->id }}">
<input type="hidden" id="reviews_url" value="{{ route('reviews.data') }}">
<!-- single property details area end -->
<input type="hidden" id="url_path" value="{{ $path }}">
<!-- Property Listing Sale Section Ends Here -->
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<!-- <script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script> -->
<script src="{{ theme_asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- <script src="{{ theme_asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jQuery.print.js') }}"></script> -->
<script src="{{ theme_asset('assets/js/property.js') }}"></script>
<script src="{{ theme_asset('assets/js/custommap.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initialize&libraries=&v=weekly" defer></script>
@endpush