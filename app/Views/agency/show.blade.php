@extends('theme::layouts.app')

@section('content')
 <!-- hero area start -->
 <section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ $agency->name }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ $agency->name }}</li>
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

<!-- main container area start -->
<section>

    <div class="main-container mt-100 mb-100 agency-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="agency-profile-area">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <div class="agency-profile-logo">
                                    <img class="img-fluid" src="{{ $agency->preview->content }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="agency-profile-info">
                                    <div class="agency-name">
                                        <h4>{{ $agency->name }}</h4>
                                    </div>
                                    <div class="agent-review">
                                        <div class="review-star">
                                            @php
                                                $rating_num = (int)$review_count;
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
                                            <a href="#review_section">{{ __('See All Reviews') }}</a>
                                        </div>
                                    </div>
                                    <div class="company-agent"></div>
                                    @isset($agency->categorymeta->content)
                                    @php
                                    $info = json_decode($agency->categorymeta->content ?? '');
                                    @endphp
                                    <div class="agent-another-info">
                                        <p><strong>{{ __('Agency License') }}:</strong> {{ $info->license ?? '' }}</p>
                                        <p><strong>{{ __('Tax Number') }}:</strong> {{ $info->tax_number ?? '' }}</p>
                                        <p><strong>{{ __('Service Area') }}:</strong> {{ $info->service_area ?? '' }}</p>
                                    </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        @isset($agency->categorymeta->content)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-with-btn">
                                    <a href="mailto:{{ $info->email ?? '' }}" class="active">{{ __('Send Email') }}</a>
                                    <a href="tel:{{ $info->phone ?? '' }}"><span class="iconify" data-icon="feather:phone-call" data-inline="false"></span> {{ __('call') }} {{ $info->phone ?? '' }}</a>
                                    <a href="https://wa.me/{{ $info->whatsapp ?? '' }}"><span class="iconify" data-icon="bx:bxl-whatsapp" data-inline="false"></span> {{ __('WhatsApp') }}</a>
                                </div>
                            </div>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
            @isset($agency->categorymeta->content)
            <div class="row">
                <div class="col-lg-12">
                    <div class="agency-info-area">
                        <div class="agency-info-title">
                            <h4>{{ __('About') }} {{ $agency->name }}</h4>
                        </div>
                        <div class="agency-about-body">
                            <p>{{ $info->description ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
            <div class="row">
                <div class="col-lg-12">
                    <div class="find-agents-area agent-demo-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="find-agents-title">
                                        <div class="left-side-section">
                                            <h3>{{ __('Agency Members') }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="agency_agent_list" value="{{ route('agency.agent.list') }}">
                                <input type="hidden" id="agency_slug" value="{{ $agency->slug }}">
                            </div>
                            <div class="row" id="agents_data">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="property-lists">
                        <div class="proprty-list-title">
                            <h4>{{ __('All Properties') }}</h4>
                        </div>
                        <input type="hidden" id="agency_property_list" value="{{ route('agency.property.list') }}">
                        <div class="property-body">
                            <div class="row" id="property_append">
                                
                            </div>
                            <div class="propery-review-see-more-btn text-center property-see-more mb-5 mt-5">
                                <a href="javascript:void(0)" id="property_load_more"><span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> {{ __('See More Property') }}</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="property-card-area mt-5" id="review_section">
                <div class="property-card-header mb-3">
                    <h5 id="review_count">{{ __('102') }} {{ __('Reviews') }}</h5>
                </div>
                <div class="property-card-body">
                    <input type="hidden" value="{{ route('agency.review.list') }}" id="agency_review_url">
                    <div class="property-reviews-area">
                        <div id="reviews_data_load"></div>
                        <div class="propery-review-see-more-btn text-center review-see-more">
                            <a href="javascript:void(0)" id="review_load_more"><span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> {{ __('See More Reviews') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main container area end  -->
@endsection

@push('js')
    <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ theme_asset('assets/js/helper.js') }}"></script>
    <script src="{{ theme_asset('assets/js/agency.js') }}"></script>
@endpush