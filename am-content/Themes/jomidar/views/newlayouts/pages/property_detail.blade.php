@extends('theme::newlayouts.app')
@push('css')
<style>
    .none {
        display: none;
    }
</style>
<link rel="stylesheet" href="{{ theme_asset('assets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('assets/css/magnific-popup.css') }}">
@endpush
@section('content')

<!-- Heder Sections Start Here -->
<div class="item-header pt-3">
    <div class="container">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end align-items-center">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item active theme-text-seondary-black category-title-bread" aria-current="page">{{ Session::get('locale') == 'ar' ? $property->ar_title : $property->title }}</li>
                <li class="breadcrumb-item"><a href="#" class="theme-text-blue text-decoration-none category-breadicon"> {{ Session::get('locale') == 'ar' ? $property->property_status_type->category->ar_name : $property->property_status_type->category->name}}</a>
                </li>
                <li class="breadcrumb-item home-breadcrumb"><a href="/" class="theme-text-blue text-decoration-none first-hom-breadicon">{{__('labels.home')}}</a>
                </li>
            </ul>
        </nav>
        <div class="d-flex flex-wrap-reverse justify-content-between justify-content-lg-between align-items-center my-3">
            <div class="">
                <ul class="detail list-unstyled mb-0 d-flex flex-column flex-sm-row align-items-end justify-content-between align-items-sm-center">
                    <li class="d-flex mb-3 mb-sm-0">
                        <span>{{__('labels.share')}}</span>
                        <div class="btn btn-primary dropdown-toggle icon d-flex align-items-center justify-content-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{theme_asset('assets/images/share.png')}}" class="border-0" alt="">
                        </div>
                        <ul class="dropdown-menu share-dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item share-drop-item" href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" target="_blank"><i class="fa-brands fa-facebook-f"></i> Facebook</a></li>
                            <li><a class="dropdown-item share-drop-item" href="https://twitter.com/intent/tweet?text={{ URL::current() }}" target="_blank"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                            <li><a class="dropdown-item share-drop-item" href="https://pinterest.com/pin/create/button/?url={{ URL::current() }}&media={{ $property->post_preview->media->url ?? asset('uploads/default.png') }}" target="_blank"><i class="fa-brands fa-pinterest-p"></i> Pinterest</a></li>
                            <li><a class="dropdown-item share-drop-item" href="https://api.whatsapp.com/send?text={{ URL::current() }}" target="_blank"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a></li>
                            <li><a class="dropdown-item share-drop-item" href="mailto:{{ $property->user->email }}?subject={{ $property->title }}&body={{ URL::current() }}"><i class="fa-regular fa-envelope"></i> Gmail</a></li>
                        </ul>
                    </li>
                    <li class="d-flex mb-3 mb-sm-0">
                        <span class="save-item">{{__('labels.save')}}</span>
                        @if (Auth::check())
                        @php
                        $data = DB::table('terms_user')->where([
                        ['terms_id',$property->id],
                        ['user_id',Auth::User()->id]
                        ])->first();
                        if($data)
                        {
                        $property_id = $data->terms_id;
                        }else{
                        $property_id = null;
                        }
                        @endphp
                        <a href="javascript:void(0)" onclick="favourite_property('{{ $property->id }}')" id="favourite_btn" class="{{ $property_id == $property->id ? 'active' : '' }}">
                            <i class="{{isset($property_id) ? 'fa-solid' : 'fa-regular'}} fa-heart ps-1" id="heart"></i>
                        </a>
                        @else
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="fa-regular fa-heart ps-1" id="heart"></i>
                        </a>
                        @endif
                    </li>
                    <li class="d-flex mb-3 mb-sm-0">
                        <span><span class="theme-text-blue font-bold">{{ $property->reviews_count }}</span> {{__('labels.reviews')}}</span>
                    </li>
                </ul>
            </div>
            <div>
                <h1 class="title d-flex justify-content-start flex-wrap font-medium theme-text-seondary-black mb-3 mb-lg-0">{{ Session::get('locale') == 'ar' ? $property->ar_title : $property->title }}</h1>
            </div>
        </div>
    </div>
    <!-- Slider Starts Here -->
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel carousel-single-item slide d-flex px-4 px-md-0" data-bs-ride="true">
            <div class="carousel-indicators mb-1 mb-md-4">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <button class="carousel-control-prev me-2 ms-4" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <div class="carousel-inner single-item-carousel item-carousel b-r-8" id="single-item-carousel">
                @if(isset($property->multiple_images) && count($property->multiple_images) > 0)
                @foreach ($property->multiple_images as $key=>$media)
                <div class="carousel-item sin-carousel-items  {{  $key == 0 ? 'active' : '' }}">
                    <img src="{{ $media->media->url }}" class="d-block w-100 b-r-8" alt="...">
                </div>

                @endforeach
                @else
                <div class="carousel-item sin-carousel-items active">
                    <img src="{{ $property->post_preview->media->url ?? asset('uploads/default.png') }}" class="d-block w-100 b-r-8" alt="...">
                </div>
                @endif
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
                    <h1 class="theme-text-blue font-medium">{{ new_amount_format($property->price->price ?? 0) }}</h1>
                    <hr>
                    <h3 class="font-medium mb-2">{{__('labels.address')}}</h3>
                    <div class="d-flex align-items-start justify-content-end mb-4">
                        <p class="mb-0 theme-text-seondary-black me-2">
                            <!-- {{$property->post_district->value}} -->
                              {{ Session::get('locale') == 'ar' ? $property->post_district->district->ar_name : $property->post_district->district->name }}
                            , {{ Session::get('locale') == 'ar' ? $property->post_new_city->city->ar_name : $property->post_new_city->city->name }}
                        </p>
                        <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                    </div>
                    <ul class="list-unstyled d-flex flex-column flex-sm-row align-items-end mb-5 flex-wrap justify-content-end property-list-feature">
                        @if($property->option_data)
                        @foreach ($property->option_data as $value)
                        @if( $value->value != 0)
                        <li class="d-flex align-items-center mb-3 mb-sm-3">
                            <span> {{ $value->value }}</span>
                            <img src="{{ !empty($value->category->preview) ? $value->category->preview->content : '' }}" title="{{ Session::get('locale') == 'ar' ? $value->category->ar_name : $value->category->name}}" data-toggle="tooltip" alt="">
                        </li>
                        @endif
                        @endforeach
                        @endif
                        @if(!empty($property->landarea))
                        <li class="d-flex align-items-center mb-3 mb-sm-3 sqm-ltr-square">
                            <img src="{{theme_asset('assets/images/area.png')}}" title="{{ $property->landarea->type }}{{__("labels.sqm")}} {{__("labels.in")}} " data-toggle="tooltip">
                            <span> {{ $property->landarea->content }} {{__('labels.sqm')}}</span>
                        </li>
                        @endif
                    </ul>
                    @php
                    $info = isset($property->user->usermeta->content) ? json_decode($property->user->usermeta->content) : null ;
                    @endphp
                    <div class="d-flex flex-column flex-sm-row me-3 justify-content-center detail-book-btns w-100">
                        <button class="contact-btn col-12 col-sm-6 theme-bg-sky mx-2 px-2 border-0 theme-text-white font-medium mb-3">
                            <img src="{{theme_asset('assets/images/phone.png')}}" alt="" class="phone me-2">
                            {{ isset($info->phone) ? $info->phone : 'N/A'  }}
                        </button>
                        <button class="contact-btn col-12 col-sm-6 theme-bg-white border-0 mx-2 px-2 theme-text-blue font-medium mb-3" data-bs-toggle="modal" data-bs-target="#inquiry_form">
                            <img src="{{theme_asset('assets/images/booking-calender.png')}}" alt="" class="me-3">
                            {{__('labels.book_appoint')}}
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-column align-items-end basic-property-info pt-4">
                    <div class="d-flex justify-content-between w-100 mb-2">
                        <h1 class="font-24 theme-text-blue font-medium">{{ Session::get('locale') == 'ar' ? $property->property_status_type->category->ar_name : $property->property_status_type->category->name}}</h1>
                        <h1 class="font-24 theme-text-blue text-bold">{{__('labels.property_description')}}</h1>
                    </div>
                    <div class="prop-description-detail mt-0 pt-0">
                        <p class="theme-text-seondary-black font-16 text-end mb-2">
                        <p class="mb-1">
                            <span>{{ Session::get('locale') == 'ar' && !empty($property->property_type) ? $property->property_type->category->ar_name : $property->property_type->category->name}}</span>
                            {{__('labels.for')}}
                            <span>{{ Session::get('locale') == 'ar' && !empty($property->property_status_type) ? $property->property_status_type->category->ar_name : $property->property_status_type->category->name}} </span>{{__('labels.in')}}
                            <span>
                                <!-- {{$property->post_district->value}} -->
                              {{ Session::get('locale') == 'ar' ? $property->post_district->district->ar_name : $property->post_district->district->name }} , {{ Session::get('locale') == 'ar' ? $property->post_new_city->city->ar_name : $property->post_new_city->city->name }}</span>
                        </p>
                        @if(!empty($property->landarea))
                        <p class="mb-1 land-area-txt">{{__('labels.land_area')}}: <span>{{$property->landarea->content}} {{__('labels.sqm')}}</span></p>
                        @endif
                        <div id="show-more"><a href="javascript:void(0)" class="font-weight-bold theme-text-sky">{{__('labels.show_more')}}</a></div>
                    </div>
                    <div id="show-more-content">
                        <p class="mb-1">{{__('labels.built_up_area')}}: <span>{{$property->builtarea->content}} {{__('labels.sqm')}}</span></p>
                        @if($property->option_data)
                        @foreach ($property->option_data as $value)
                        @if( $value->value != 0)
                        <p class="mb-1">{{__('labels.the_property_has')}}
                            <span>{{ $value->value }} </span> {{ Session::get('locale') == 'ar' ? $value->category->ar_name : $value->category->name}}
                        </p>
                        @endif
                        @endforeach
                        @endif
                        <p class="mb-1">{{ Session::get('locale') == 'ar' && !empty($property->property_type) ? $property->property_type->category->ar_name : $property->property_type->category->name}}
                            {{__('labels.has')}}
                            <span>{{ $property->electricity_facility->content == 0 ? __('labels.electricity') : __('labels.no_electricity') }}</span>
                            {{__('labels.and')}} <span>{{ $property->water_facility->content == 0 ? __('labels.water') : __('labels.no_water') }}</span>
                            {{__('labels.connections')}}
                        </p>
                        <p class="mb-1">{{__('labels.building_year')}}:
                            <span>{{!empty($property->property_age) ? $property->property_age->content : 'N/A'}}</span>
                        </p>
                        @if (isset($features))
                        <p class="mb-1 text-bold">{{__('labels.property_amenities')}}</p>
                        <ul class="list-unstyled text-decoration-none properties-of-amineties mb-1">
                            @foreach ($features as $facility)
                            <li> {{ Session::get('locale') == 'ar' ?  $facility->ar_name : $facility->name}} <span> * </span></li>
                            @endforeach
                        </ul>
                        @endif
                        <p class="mb-1">{{__('labels.price')}}: <span>{{$property->price->price}} {{__('labels.sar')}}</span></p>
                        </p>
                        <div id="show-less"><a href="javascript:void(0)" class="font-weight-bold theme-text-sky">{{__('labels.show_less')}}</a></div>
                    </div>
                </div>
                <hr class="w-100">
                <div class="basic-info-detail">
                    <h1 class="font-24 theme-text-blue detail-heading mb-3 text-bold">{{__('labels.basic_info')}}</h1>
                    @foreach ($property_type_nature as $value)
                    @if( $value->type == 'parent_category')
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start detail-txt-right">
                            <h3 class="font-16 text-bold">{{ Session::get('locale') == 'ar' ? $value->ar_name : $value->name}}</h3>
                        </div>
                        <div class="col-6 detail-txt-left">
                            <span class="font-16 theme-text-seondary-black b-info-txt">{{__('labels.property_nature')}}</span>
                        </div>
                    </div>
                    @elseif( $value->type == 'category')
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start detail-txt-right">
                            <h3 class="font-16 text-bold">{{ Session::get('locale') == 'ar' ? $value->ar_name : $value->name}}</h3>
                        </div>
                        <div class="col-6 detail-txt-left">
                            <span class="font-16 theme-text-seondary-black b-info-txt">{{__('labels.type_property')}} </span>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start detail-txt-right">
                            <h3 class="font-16 text-bold">{{ $property->electricity_facility->content == 0 ? __('labels.yes') : __('labels.no') }}</h3>
                        </div>
                        <div class="col-6 detail-txt-left">
                            <span class="font-16 theme-text-seondary-black b-info-txt">{{__('labels.electricity_meter_is_there')}}</span>
                        </div>
                    </div>

                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start detail-txt-right">
                            <h3 class="font-16 text-bold">{{ $property->water_facility->content == 0 ? __('labels.yes') : __('labels.no') }}</h3>
                        </div>
                        <div class="col-6 detail-txt-left">
                            <span class="font-16 theme-text-seondary-black b-info-txt">{{__('labels.water_meter_is_there')}}</span>
                        </div>
                    </div>

                    @if(isset($property->landarea->content))
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start detail-txt-right sqm-rtl">
                            <h3 class="font-16 text-bold">{{ isset($property->landarea->content) ? $property->landarea->content.' '.__('labels.sqm') : '' }}</h3>
                        </div>
                        <div class="col-6 detail-txt-left b-info-txt">
                            <span class="font-16 theme-text-seondary-black">{{__('labels.land_area')}}</span>
                        </div>
                    </div>
                    @endif

                    @if(isset($property->builtarea->content))
                    <div class="row w-100 mb-3">
                        <div class="col-6 text-start detail-txt-right sqm-rtl">
                            <h3 class="font-16 text-bold">{{ isset($property->builtarea->content) ? $property->builtarea->content.' '.__('labels.sqm')  : '' }}</h3>
                        </div>
                        <div class="col-6 detail-txt-left b-info-txt">
                            <span class="font-16 theme-text-seondary-black">{{__('labels.built_up_area')}}</span>
                        </div>
                    </div>
                    @endif
                </div>
                @if(!empty($property->streets))
                <hr class="w-100">
                <div class="basic-info-detail">
                    <h1 class="font-24 theme-text-blue detail-heading mb-3 text-bold">{{__('labels.street_info')}}</h1>
                    @for($i=0; $i<$property->streets->content; $i++)
                        <div class="d-flex street-information-detail justify-content-end">
                            <div class="d-flex justify-content-center align-items-center">
                                @if(Session::get('locale') == 'ar' && $street_face[$i] == 'East')
                                <p class="text-bold">شرقية</p>
                                @elseif($street_face[$i] == 'East')
                                <p class="text-bold">East</p>
                                @endif
                                @if(Session::get('locale') == 'ar' && $street_face[$i] == 'West')
                                <p class="text-bold">غربية</p>
                                @elseif($street_face[$i] == 'West')
                                <p class="text-bold">West</p>
                                @endif
                                @if(Session::get('locale') == 'ar' && $street_face[$i] == 'North')
                                <p class="text-bold">شمالية</p>
                                @elseif($street_face[$i] == 'North')
                                <p class="text-bold">North</p>
                                @endif
                                @if(Session::get('locale') == 'ar' && $street_face[$i] == 'South')
                                <p class="text-bold">جنوبية</p>
                                @elseif($street_face[$i] == 'South')
                                <p class="text-bold">South</p>
                                @endif

                                <p>{{__('labels.facing')}}</p>
                            </div>
                            <div class="horizontal-line "></div>
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="theme-text-blue text-bold">{{ !empty($street_width) ? $street_width[$i].' '.__("labels.meter") : ''}}</p>
                                <p>{{__('labels.width')}}</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="theme-text-blue text-bold">{{$count=1+$i;}}</p>
                                <p>{{__('labels.street')}}</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-start p-1"><i class="fa-solid fa-location-crosshairs"></i></div>
                        </div>
                        @endfor
                </div>
                @endif

                @if(count($property->option_data) > 0 || !empty($property->property_condition) || !empty($property->role))
                <hr class="w-100">
                <h1 class="font-24 theme-text-blue detail-heading mb-3 text-bold">{{__('labels.additional_info')}}</h1>
                @foreach ($property->option_data as $options_data)
                <div class="row w-100 mb-3">
                    <div class="col-6 text-start detail-txt-right">
                        <h3 class="font-16 text-bold">{{ $options_data->value == 0 ? 'غير متوفر' : $options_data->value}}</h3>
                    </div>
                    <div class="col-6 detail-txt-left">
                        <span class="font-16 theme-text-seondary-black "> {{ Session::get('locale') == 'ar' ? $options_data->category->ar_name : $options_data->category->name}}</span>
                    </div>
                </div>
                @endforeach
                @if(isset($property->property_condition))
                <div class="row w-100 mb-3">
                    <div class="col-6 text-start detail-txt-right">
                        @if(isset($property->property_condition->content) && $property->property_condition->content == 3 )
                        <h3 class="font-16 text-bold">{{__('labels.furnishing')}}</h3>
                        @elseif(isset($property->property_condition->content) && $property->property_condition->content == 2 )
                        <h3 class="font-16 text-bold">{{__('labels.txt_furnished')}}</h3>
                        @elseif(isset($property->property_condition->content) && $property->property_condition->content == 1 )
                        <h3 class="font-16 text-bold">{{__('labels.unfurnished')}}</h3>
                        @endif

                    </div>
                    <div class="col-6 detail-txt-left">
                        <span class="font-16 theme-text-seondary-black">{{__('labels.furnishing')}}</span>
                    </div>
                </div>
                @endif
                @if(isset($property->total_floors->content))
                <div class="row w-100 mb-3">
                    <div class="col-6 text-start detail-txt-right">
                        <h3 class="font-16 text-bold">{{ $property->total_floors->content }}</h3>
                    </div>
                    <div class="col-6 detail-txt-left">
                        <span class="font-16 theme-text-seondary-black">{{__('labels.total_floors')}}</span>
                    </div>
                </div>
                @endif

                @if(isset($property->property_floor->content))
                <div class="row w-100 mb-3">
                    <div class="col-6 text-start detail-txt-right">
                        <h3 class="font-16 text-bold">{{ $property->property_floor->content }}</h3>
                    </div>
                    <div class="col-6 detail-txt-left">
                        <span class="font-16 theme-text-seondary-black">{{__('labels.property_floor')}}</span>
                    </div>
                </div>
                @endif

                @if(isset($property->property_age->content))
                <div class="row w-100 mb-3">
                    <div class="col-6 text-start detail-txt-right">
                        <h3 class="font-16 text-bold">{{ $property->property_age->content }}</h3>
                    </div>
                    <div class="col-6 detail-txt-left">
                        <span class="font-16 theme-text-seondary-black">{{__("labels.building_age")}}</span>
                    </div>
                </div>
                @endif

                @if(isset($property->length->content))
                <div class="row w-100 mb-3">
                    <div class="col-6 text-start detail-txt-right">
                        <h3 class="font-16 meter-rtl text-bold"> {{ $property->length->content }} {{__("labels.meter")}}</h3>
                    </div>
                    <div class="col-6 detail-txt-left">
                        <span class="font-16 theme-text-seondary-black">{{__("labels.property_length")}}</span>
                    </div>
                </div>
                @endif

                @if(isset($property->depth->content))
                <div class="row w-100 mb-3">
                    <div class="col-6 text-start detail-txt-right meter-rtl">
                        <h3 class="font-16 text-bold"> {{ $property->depth->content }} {{__("labels.meter")}} </h3>
                    </div>
                    <div class="col-6 detail-txt-left">
                        <span class="font-16 theme-text-seondary-black">{{__("labels.property_depth")}}</span>
                    </div>
                </div>
                @endif

                @endif
                <hr class="w-100">
                <h1 class="font-24 theme-text-blue mb-3 mt-2 detail-heading text-bold">{{__('labels.property_features')}}</h1>
                <div class="tags d-flex flex-wrap justify-content-end prop-feature">
                    @if (isset($features))
                    @foreach ($features as $facility)
                    <div class="tag d-flex justify-content-center align-items-center mb-2">
                        <h3 class="font-16 font-medium theme-text-blue">{{ Session::get('locale') == 'ar' ?  $facility->ar_name : $facility->name}}</h3>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="col-6 text-start detail-txt-right">
                    <h3 class="font-16 font-medium text-right theme-text-blue">No data avaialable</h3>
                </div>
                @endif
                @isset($property->post_district->value)
                <div class="theme-bg-secondary text-center mb-0 pb-0 position-relative mt-3">
                    <h3 class="font-medium font-24 theme-text-white pb-2 pt-1">اسم الحي</h3>
                    <iframe id="gmap_canvas" width="100%" height="400" src="https://maps.google.com/maps?q={{ $property->post_district->value }}%20&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
                @endif
                @if(!empty($property->virtual_tour->content) && isset($property->virtual_tour))
                <div class="text-center mb-0 pb-0 position-relative">
                    <h3 class="font-medium font-24 theme-text-white pb-2 pt-1">Virtual Tour</h3>
                    <iframe src="{{ $property->virtual_tour->content}}" frameborder="0" allowfullscreen width="100%" height="480"></iframe>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<input type="hidden" id="property_id" value="{{ $property->id }}">
<input type="hidden" id="reviews_url" value="{{ route('reviews.data') }}">
<!-- single property details area end -->
<input type="hidden" id="url_path" value="{{ $path }}">
<!-- Property Listing Sale Section Ends Here -->


<!--Send Message Modal -->
<div class="modal fade theme-modal send-modal" id="inquiry_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog px-3 px-md-0">
        <div class="modal-content">
            <div class="modal-body position-relative">
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="col-12 col-sm-12 col-md-12 ps-0 px-sm-3" style="z-index:11 ;">
                        <h1 class="font-24 font-medium theme-text-seondary-black mb-4" style="margin-bottom: 10px;">
                            اتصل بنا</h1>
                        <p id="login_error_msg" style="color:red ;"></p>
                        <form action="{{ route('property.inquiryform') }}" method="POST" id="inquiryform">
                            @csrf
                            <div class="mb-4_5 position-relative">
                                <input type="text" placeholder="{{ __('Your Name') }}" name="name" class="form-control font-medium font-16">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">اسمك</label>
                            </div>
                            <div class="position-relative mb-4_5">
                                <input type="email" placeholder="{{ __('Email') }}" name="email" class="form-control font-medium font-16">
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">البريد
                                    الإلكتروني</label>
                            </div>
                            <div class="position-relative mb-4_5">
                                <textarea name="message" cols="30" rows="5" class="form-control" placeholder="{{ __('Message') }}" class="form-control font-medium font-16" style="height: 100px;"></textarea>
                                <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">رسالة</label>
                            </div>
                            <input type="hidden" value="{{ isset($property->user->email) ? $property->user->email : 'N/A'  }}" name="agent_email">
                            @if(env('NOCAPTCHA_SITEKEY') != null)
                            <div class="form-group">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}


                            </div>
                            @endif
                            <button type="submit" class="basicbtn chat-btn theme-bg-sky theme-text-white border-0 font-bold font-16">
                                {{ __('Send Message') }}
                            </button>
                        </form>
                    </div>

                    <div class="alert alert-success none" role="alert">

                    </div>
                    <div class="alert alert-danger none" role="alert">

                    </div>
                    </form>
                </div>
            </div>
            <img src="{{theme_asset('assets/images/close-modal.png')}}" data-bs-dismiss="modal" alt="" class="position-absolute close-modal">
        </div>
    </div>
</div>
</div>
<!-- Send Message Ends Here -->
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/property.js') }}"></script>
<script src="{{ theme_asset('assets/js/custommap.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initialize&libraries=&v=weekly" defer></script>
@endpush