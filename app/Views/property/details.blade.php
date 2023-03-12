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
                                        <div class="property-price">
                                            <span>{{ amount_format($property->min_price->price ?? 0) }} - {{ amount_format($property->max_price->price ?? 0) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="property-wishlist-compare">
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
                                        <span class="iconify" data-icon="cil:heart" data-inline="false"></span>
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login">
                                        <span class="iconify" data-icon="cil:heart" data-inline="false"></span>
                                    </a>
                                    @endif
                                    <a href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="iconify" data-icon="dashicons:share" data-inline="false"></span>
                                    </a>
                                    <div class="share-dropdown">
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" target="_blank"><span class="iconify" data-icon="entypo-social:facebook-with-circle" data-inline="false"></span> <span>{{ __('Facebook') }}</span></a>
                                            <a class="dropdown-item" href="https://twitter.com/intent/tweet?text={{ URL::current() }}" target="_blank"><span class="iconify" data-icon="ant-design:twitter-outlined" data-inline="false"></span>{{ __('Twitter') }}</span></a>
                                            <a class="dropdown-item" href="https://pinterest.com/pin/create/button/?url={{ URL::current() }}&media={{ $property->post_preview->media->url ?? asset('uploads/default.png') }}" target="_blank"><span class="iconify" data-icon="cib:pinterest-p" data-inline="false"></span> {{ __('Pinterest') }}</span></a>
                                            <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ URL::current() }}" target="_blank"><span class="iconify" data-icon="bx:bxl-whatsapp" data-inline="false"></span> {{ __('Whatsapp') }}</span></a>
                                            <a class="dropdown-item" href="mailto:{{ $property->user->email }}?subject={{ $property->title }}&body={{ URL::current() }}"><span class="iconify" data-icon="fa-regular:envelope" data-inline="false"></span> {{ __('Gmail') }}</span></a>
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
                                    <h5>{{ __('Description') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <p>{{ content_format($property->content->content ?? '') }}</p>
                                </div>
                            </div>
                            <div class="property-card-area mt-10">
                                <div class="property-card-header mb-3">
                                    <h5>{{ __('Detail & Information') }}</h5>
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
                                    <h5>{{ __('Distance key between facilities') }}</h5>
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
                                    <h5>{{ __('Property Video') }}</h5>
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
                                    <h5>{{ __('Floor Plan') }}</h5>
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
                            @isset($property->post_city->value)
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5>{{ __('Property Location') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="property-location">
                                        <iframe id="gmap_canvas" width="100%" height="400" src="https://maps.google.com/maps?q={{ $property->post_city->value }}%20&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5>{{ __('Property Gallery') }}</h5>
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
                            @isset($property->latitude->value)
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
                            @endisset
                            @isset($property->virtual_tour->content)
                            @if(!empty($property->virtual_tour->content))
                            <div class="property-card-area mt-0">
                                <div class="property-card-header mb-3">
                                    <h5>{{ __('Virtual Tour') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <iframe src="{{ $property->virtual_tour->content ?? null }}" frameborder="0" allowfullscreen width="100%" height="480"></iframe>
                                </div>
                            </div>
                            @endif
                            @endif
                            @isset($property->post_city->value)
                            <div class="property-card-area mt-10">
                                <div class="property-card-header mb-3">
                                    <h5 id="walkscore_title">{{ __('Walkscore') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <script type='text/javascript'>
                                        var ws_wsid = 'ga5d398aa8c66476e8eaed36dbd7c5743';
                                        var ws_address = '{{ $property->post_city->value }}';
                                        var ws_format = 'tall';
                                        var ws_width = '100%';
                                        var ws_height = '800';
                                    </script>
                                    <div id='ws-walkscore-tile'></div>
                                    <script type='text/javascript' src='{{ url('//www.walkscore.com/tile/show-walkscore-tile.php') }}'></script>
                                </div>
                            </div>
                            @endisset
                            <div class="property-card-area mt-10">
                                <div class="property-card-header mb-3">
                                    <h5>{{ __('Page Views') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <canvas id="myChart2" style="height:400px;width:100%"></canvas>
                                </div>
                            </div>


                        </div>

                        <div class="property-card-area mt-0">
                            <div class="property-card-header mb-3">
                                <h5>{{ $property->reviews_count }} {{ __('Reviews') }}</h5>
                            </div>
                            <div class="property-card-body">
                                <div class="property-reviews-area">
                                    <div id="reviews_data">

                                    </div>
                                    <div class="propery-review-see-more-btn text-center">
                                        <a href="javascript:void(0)" id="review_load_more"><span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> {{ __('See More Reviews') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('review.store') }}" method="POST" id="review_store">
                            @csrf
                            <div class="property-card-area mt-0 last" id="review_section">
                                <div class="property-card-header mb-3">
                                    <h5>{{ __('Write a Review') }}</h5>
                                </div>
                                <div class="property-card-body">
                                    <div class="property-review-form-area">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" class="form-control" placeholder="{{ __('Enter Your Name') }}" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('Email') }}</label>
                                                <input type="email" class="form-control" placeholder="{{ __('Enter Your Email') }}" name="email">
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ $property->user->id }}">
                                            <div class="form-group">
                                                <label id="review_rating_label">{{ __('Select Rating') }}</label>
                                                <select name="rating" class="form-control">
                                                    <option value="5">{{ __('5 Star') }}</option>
                                                    <option value="4">{{ __('4 Star') }}</option>
                                                    <option value="3">{{ __('3 Star') }}</option>
                                                    <option value="2">{{ __('2 Star') }}</option>
                                                    <option value="1">{{ __('1 Star') }}</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                                            <div class="form-group">
                                                <label id="review_review_label">{{ __('Message') }}</label>
                                                <textarea cols="20" rows="5" class="form-control" placeholder="{{ __('Write your messages') }}" name="review"></textarea>
                                            </div>
                                            <div class="review-submit d-flex align-items-center">
                                                <button type="submit" id="review_sent"><span id="review_btn_title">{{ __('Submit Review') }}</span></button>
                                                <div class="review-success-msg">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property-details-right-sidebar" id="contact_form">
                        <div class="contact-agent">
                            <div class="agent-contact">
                                <h4>{{ __('Contact an Agent') }}</h4>
                            </div>
                            @php
                            $info = isset($property->user->usermeta->content) ? json_decode($property->user->usermeta->content) : null ;
                            @endphp
                            <div class="agency-content-main-area">
                                <img src="{{ $property->user->avatar }}" alt="agency">
                                <div class="agency-content">
                                    <div class="agency-name">
                                        <h5><a href="{{ route('agent.show',$property->user->slug) }}">{{ $property->user->name }}</a></h5>
                                    </div>
                                    <div class="agency-number">
                                        <span> {{ isset($info->phone) ? $info->phone : ''  }}</span>
                                    </div>
                                    <div class="agency-email">
                                        <span>{{ $property->user->email }}</span>
                                    </div>
                                </div>
                            </div>
                            @isset($property->contact_type->content)
                            @php
                            $property_type = json_decode($property->contact_type->content);
                            @endphp
                            @if ($property_type->contact_type == 'mail')
                            @include('view::property.section.inquiryform',['info'=>$property_type])
                            @elseif($property_type->contact_type == 'phone')
                            @include('view::property.section.callform',['info'=>$property_type])
                            @elseif($property_type->contact_type == 'affiliate_button')
                            @include('view::property.section.affiliateButton',['info'=>$property_type])
                            @elseif($property_type->contact_type == 'affiliate_banner_ads')
                            @include('view::property.section.affiliateBanner',['info'=>$property_type])
                            @endif
                            @endisset
                        </div>
                        <div class="mortgage-calculator-area" id="mortgage">
                            <div class="mortgage-calculator-title">
                                <h4 id="mortgage_title">{{ __('Mortgage Calculation') }}</h4>
                            </div>
                            <div class="martgage-calculator-body">
                                <form action="{{ route('mortgage.calculator') }}" method="POST" id="calculator">
                                    @csrf
                                    <div class="mortgage-calcultor-form">
                                        <div class="form-group">
                                            <label id="property_price_title">{{ __('Property Price') }}</label>
                                            <input type="number" class="form-control" required name="price" value="{{ amount_calculation($property->min_price->price ?? 0) }}">
                                        </div>
                                        <div class="form-group">
                                            <label id="mortgage_Interestrate_title">{{ __('InterestRate(Percentage)') }}</label>
                                            <input type="number" class="form-control" required name="interest">
                                        </div>
                                        <div class="form-group">
                                            <label id="mortgage_years_title">{{ __('Years') }}</label>
                                            <input type="number" class="form-control" required name="year">
                                        </div>
                                        <div class="calculator_append">

                                        </div>
                                        <div class="form-group">
                                            <div class="calculator-btn">
                                                <button id="calculator_btn" type="submit">{{ __('Calculate') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="print-page-area" id="print">
                            <div class="mortgage-calculator-title">
                                <h4>{{ __('Print') }}</h4>
                            </div>
                            <div class="print-page-body">
                                <div class="calculator-btn">
                                    <button id="print">{{ __('Print Now') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="similar-property-area">
                            <div class="similar-property-header-area">
                                <h4>{{ __('Similar Property') }}</h4>
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
<input type="hidden" id="reviews_url" value="{{ route('reviews.data') }}">
<!-- single property details area end -->
<input type="hidden" id="url_path" value="{{ $path }}">
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>
<script src="{{ theme_asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jQuery.print.js') }}"></script>
<script src="{{ theme_asset('assets/js/property.js') }}"></script>
<script src="{{ theme_asset('assets/js/custommap.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initialize&libraries=&v=weekly" defer></script>
@endpush