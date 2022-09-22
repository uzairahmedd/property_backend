@extends('theme::layouts.app')

@section('content')
 <!-- hero area start -->
 <section id="agent_view_breadcrumb">
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');" id="bg_breadcrumb_img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2 id="breadcrumb_title">{{ $agent->name }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li id="breadcrumb_des">{{ $agent->name }}</li>
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

@php
    $info = json_decode($agent->usermeta->content ?? '');
@endphp
<!-- main container area start -->
<section>
    <div class="main-container mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="agent-pofile-area">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="agent-profile-area">
                                    <div class="agent-profile-img">
                                        <img class="img-fluid" src="{{ $agent->avatar }}" alt="">
                                    </div>
                                    @if($info != null)
                                    <div class="agent-social-menu">
                                        <nav>
                                            <ul>
                                                @if($info->facebook != null)
                                                <li><a target="__blank" href="{{ $info->facebook }}"><span class="iconify" data-icon="bx:bxl-facebook" data-inline="false"></span></a></li>
                                                @endif
                                                 @if($info->twitter != null)
                                                <li><a target="__blank" href="{{ $info->twitter }}"><span class="iconify" data-icon="ant-design:twitter-outlined" data-inline="false"></span></a></li>
                                                @endif
                                                @if($info->instagram != null)

                                                <li><a target="__blank" href="{{ $info->instagram ?? null }}"><span class="iconify" data-icon="ant-design:instagram-outlined" data-inline="false"></span></a></li>
                                                @endif
                                                @if($info->pinterest != null)

                                                <li><a target="__blank" href="{{ $info->pinterest }}"><span class="iconify" data-icon="bx:bxl-pinterest" data-inline="false"></span></a></li>
                                                @endif
                                                @if($info->linkedin != null)

                                                <li><a target="__blank" href="{{ $info->linkedin }}"><span class="iconify" data-icon="ant-design:linkedin-filled" data-inline="false"></span></a></li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="agent-name">
                                    <h4>{{ $agent->name }}</h4>
                                </div>
                                <div class="agent-review">
                                    <div class="review-star">
                                        @php
                                            $rating_num = (int)$reviews_ratting;
                                        @endphp
                                        @for ($i = 0; $i < 5; $i++)
                                        @if ($rating_num >  $i)
                                        <span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span>
                                        @else
                                        <span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span>
                                        @endif
                                        @endfor
                                    </div>
                                    <div class="review-link">
                                        <a href="#reviews_area">{{ __('See All Reviews') }}</a>
                                    </div>
                                </div>
                                @if ($agent->agency)
                                <div class="company-agent">
                                    <p>{{ __('Company Agent At') }} <a href="{{ route('agency.show',$agent->agency->slug) }}">{{ $agent->agency->name }}</a></p>
                                </div>
                                @else
                                <div class="company-agent"></div>
                                @endif
                                @if($info != null)
                                <div class="agent-another-info">
                                    @if($info->license != null)
                                    <p><strong>{{ __('Agent License') }}:</strong> {{ $info->license }}</p>
                                    @endif
                                    @if($info->tax_number != null)
                                    <p><strong>{{ __('Tax Number') }}:</strong> {{ $info->tax_number }}</p>
                                    @endif
                                    @if($info->service_area != null)
                                    <p><strong>{{ __('Service Area') }}:</strong> {{ $info->service_area }}</p>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-with-btn">
                                    <a href="mailto:{{ $agent->email }}" class="active">{{ __('Send Email') }}</a>
                                    @if($info != null)
                                    @if($info->phone != null)
                                    <a href="tel:{{ $info->phone ?? '' }}"><span class="iconify" data-icon="feather:phone-call" data-inline="false"></span> {{ __('call') }} {{ $info->phone }}</a>
                                    @endif
                                    @if($info->whatsapp != null)
                                    <a target="__blank" href="https://wa.me/{{ $info->whatsapp }}"><span class="iconify" data-icon="bx:bxl-whatsapp" data-inline="false"></span> {{ __('WhatsApp') }}</a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                         @if($info != null)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="about-info">
                                    <div class="about-title">
                                        <h4>{{ __('About Me') }}</h4>
                                    </div>
                                    <div class="about-body">
                                        <p>{{ $info->description ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="property-lists">
                                    <div class="proprty-list-title">
                                        <h4>{{ __('My Properties') }} ({{ $agent->property_count }})</h4>
                                    </div>
                                    <div class="property-body">
                                        <input type="hidden" id="my_properties_url" value="{{ route('agent.property',$agent->slug) }}">
                                        <div class="row" id="agent_property_data">

                                        </div>
                                        <div class="propery-review-see-more-btn text-center mt-5 agent-property-load-more">
                                            <a href="javascript:void(0)" id="property_load_more"><span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> {{ __('See More Property') }}</a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-card-area pt-5" id="reviews_area">
                            <input type="hidden" id="reviews_data_url" value="{{ route('agent.reviews.data') }}">
                            <input type="hidden" id="property_agent_id" value="{{ $agent->id }}">
                            <div class="property-card-header mb-3">
                                <h5>{{ $reviews }} {{ __('Reviews') }}</h5>
                            </div>
                            <div class="property-card-body">
                                <div class="property-reviews-area">
                                    <div id="reviews_data_load">

                                    </div>
                                    <div class="propery-review-see-more-btn review-see-more text-center">
                                        <a href="javascript:void(0)" id="review_load_more"><span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> {{ __('See More Reviews') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="property-listing-section" id="agent_contact_form">
                        <div class="contact-agent">
                            <div class="agent-contact">
                                <h4>{{ __('Contact Me') }}</h4>
                            </div>
                            <div class="agency-contact-form">
                                <form action="{{ route('property.inquiryform') }}" method="POST" class="inquiryform">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{ __('Your Name') }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="{{ __('Email') }}" name="email">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" cols="30" rows="5" class="form-control" placeholder="{{ __('Message') }}"></textarea>
                                    </div>
                                    <input type="hidden" value="{{ $agent->email }}" name="agent_email">

                                    @if(env('NOCAPTCHA_SITEKEY') != null)
                                    <div class="form-group">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}


                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <button type="submit" class="basicbtn">{{ __('Send Message') }}</button>
                                    </div>
                                    <div class="alert alert-success none" role="alert">

                                    </div>
                                    <div class="alert alert-danger none" role="alert">

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="advanced-search-area mt-50" id="agent_search">
                            <div class="advanced-search-title">
                                <h4>{{ __('Find Agents') }}</h4>
                            </div>
                            <div class="advanced-search-body">
                                <div class="advanced-form">
                                    <form action="{{ route('agent.list') }}">
                                        <div class="form-group">
                                            <input type="text" placeholder="{{ __('Enter Agent Name') }}" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="{{ __('Enter Email Address') }}" class="form-control" name="email">
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit">{{ __('Search') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main container area ebd  -->
@endsection

@push('js')
    <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ theme_asset('assets/js/agent.js') }}"></script>
@endpush
