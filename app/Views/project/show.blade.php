@extends('theme::layouts.app')

@push('css')
<link rel="stylesheet" href="{{ theme_asset('assets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('assets/css/magnific-popup.css') }}">
@endpush

@section('content')

 <!-- hero area start -->
 <section id="property_details_breadcrumb">
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');" id="bg_breadcrumb_img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2 id="breadcrumb_title">{{ $property->title }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li><a href="{{ url('/project') }}">{{ __('Project') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li id="breadcrumb_des">{{ $property->title }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->

<!-- single property details area start -->
<section>
    <div class="single-property-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-property-section">
                        <div class="property-img">
                            <div id="property_single_img">
                                <a href="#"><img src="{{ $property->post_preview->media->url ?? asset('uploads/default.png') }}" alt=""></a>
                            </div>
                            <div class="property-title-content">
                                <div class="property-agent-img-content">
                                    <img src="{{ $property->user->avatar ?? null }}" alt="">
                                    <div class="property-title-info">
                                        <h4>{{ $property->title }}</h4>

                                    </div>
                                </div>

                                <div class="property-wishlist-compare">

                                    <a href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="iconify" data-icon="dashicons:share" data-inline="false"></span>
                                    </a>
                                    <div class="share-dropdown">
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" target="_blank"><span class="iconify" data-icon="entypo-social:facebook-with-circle" data-inline="false"></span> <span>{{ __('Facebook') }}</span></a>
                                            <a class="dropdown-item" href="https://twitter.com/intent/tweet?text={{ URL::current() }}" target="_blank"><span class="iconify" data-icon="ant-design:twitter-outlined" data-inline="false"></span>{{ __('Twitter') }}</span></a>
                                            <a class="dropdown-item" href="https://pinterest.com/pin/create/button/?url={{ URL::current() }}&media={{ $property->post_preview->media->url ?? asset('uploads/default.png') }}" target="_blank"><span class="iconify" data-icon="cib:pinterest-p" data-inline="false"></span> {{ __('Pinterest') }}</span></a>
                                            <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ URL::current() }}" target="_blank"><span class="iconify" data-icon="bx:bxl-whatsapp" data-inline="false"></span> {{ __('Whatsapp') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-gallary-img owl-carousel property_gallery">
                            @if($property->multiple_images)
                            @foreach ($property->multiple_images as $media)
                            <div class="single-img" onclick="img_set('{{ $media->media->url }}')">
                                <img src="{{ $media->media->url }}" alt="">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div id="left_section">
                            <div class="property-card-area">
                                <div class="property-card-header">
                                    <h5 id="des_title">{{ __('Description') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <p>{{ $property->content->content }}</p>
                                </div>
                            </div>
                             <div class="property-card-area mt-10">
                                <div class="property-card-header mb-3">
                                    <h6 >{{ __('Selling Date') }}</h6>
                                </div>
                                <div class="property-card-body">
                                    <div class="property-features-menu">
                                        <div class="row">
                                           <div class="col-lg-4">
                                                <div class="single-features">
                                                    <strong>{{ __('Start Selling') }}:</strong> {{ $property->open_sell_date->content ?? '' }}
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="single-features">
                                                    <strong>{{ __('End Selling') }}:</strong> {{ $property->finished_at->content ?? '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="property-card-area mt-10">
                                <div class="property-card-header mb-3">
                                    <h5 id="details_title">{{ __('Detail & Information') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="property-features-menu">
                                        <div class="row">
                                            @if($property->option_data)
                                            @foreach ($property->option_data as $value)
                                            <div class="col-lg-4">
                                                <div class="single-features">
                                                    <strong>{{ $value->category->name }}:</strong> {{ $value->value }}
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="property-card-area mt-10">
                                <div class="property-card-header mb-3">
                                    <h5 id="distance_title">{{ __('Distance key between facilities') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="property-features-menu">
                                        <div class="row">
                                            @if ($property->facilities_get->count() > 0)
                                            @foreach ($property->facilities_get as $facility)
                                            <div class="col-lg-4">
                                                <div class="single-features">
                                                    <strong><i class="{{ $facility->category->icon->content }}"></i> {{ $facility->category->name }}</strong>- {{ $facility->value }}{{ __('KM') }}
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($property->youtube_url->content ?? null)
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5 id="video_title">{{ __('Property Video') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="property-video">
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $property->youtube_url->content ?? null }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($property->floor_plans->count() > 0)
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5 id="floor_plan_title">{{ __('Floor Plan') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="floor-plan-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="accordion" id="accordionExample">

                                                    @foreach ($property->floor_plans as $key=>$floor)
                                                    @php
                                                        $data = json_decode($floor->content);
                                                    @endphp
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                                            {{ $data->name }} <span>{{ $data->square_ft }} {{ __('sq ft') }}</span>
                                                            </button>
                                                        </h2>
                                                        </div>
                                                        <div id="collapse{{ $key }}" class="collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="floor-img">
                                                                <img class="img-fluid" src="{{ asset($data->file_name) }}" alt="">
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5 id="location_title">{{ __('Property Location') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="property-location">
                                        <iframe id="gmap_canvas" width="100%" height="400" src="https://maps.google.com/maps?q={{ $property->post_city->value }}%20&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5 id="gallery_title">{{ __('Property Gallery') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="gallery-img-property">
                                        <div class="row">
                                            @if($property->multiple_images)
                                            @foreach ($property->multiple_images as $media)
                                            <div class="col-lg-4 mb-30">
                                                <a href="{{ $media->media->url }}"><img class="img-fluid" src="{{ $media->media->url }}" alt=""></a>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property-details-right-sidebar" id="contact_form">
                        <div class="contact-agent">
                            <div class="agent-contact">
                                <h4 id="contact_form_title">{{ __('Contact an Agent') }}</h4>
                            </div>
                            @php
                                $info = json_decode($property->user->usermeta->content ?? '');
                            @endphp
                            <div class="agency-content-main-area">
                                <img src="{{ $property->user->avatar }}" alt="agency">
                                <div class="agency-content">
                                    <div class="agency-name">
                                        <h5><a href="{{ route('agent.show',$property->user->slug) }}">{{ $property->user->name }}</a></h5>
                                    </div>
                                    <div class="agency-number">
                                        <span>{{ $info->phone ?? '' }}</span>
                                    </div>
                                    <div class="agency-email">
                                        <span>{{ $property->user->email ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                            @php
                                $property_type = json_decode($property->contact_type->content);
                            @endphp
                            @if ($property_type->contact_type == 'mail')
                            @include('view::property.section.inquiryform',['info'=>$property_type])

                            @endif
                        </div>

                        <div class="similar-property-area">
                            <div class="similar-property-header-area">
                                <h4 id="similar_property_title">{{ __('Similar Property') }}</h4>
                            </div>
                            <div class="similar-property-body">
                                <input type="hidden" id="similar_property_url" value="{{ route('property.similar.data') }}">
                                <input type="hidden" id="agent_id" value="{{ $property->user->id }}">
                                <div class="row" id="similar_property"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="property_id" value="{{ $property->id }}">
<!-- single property details area end -->

@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jQuery.print.js') }}"></script>
<script src="{{ theme_asset('assets/js/property.js') }}"></script>
<script src="{{ theme_asset('assets/js/custommap.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initialize&libraries=&v=weekly" defer></script>
@endpush
