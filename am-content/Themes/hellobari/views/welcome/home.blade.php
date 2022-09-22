@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section id="hero">
    <div class="slider-nine-area" id="hero_bg_img" style="background-image: url('{{ asset(content('hero','hero_bg_img')) }}');">
        <div class="container">
            <div class="row">
                @php
                    $featured_property = App\Terms::with('post_preview','min_price','max_price','post_city')->where([
                        ['type','property'],
                        ['status',1]
                    ])->latest()->first();
                @endphp
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <div class="slider-nine-property-grid">
                        <a href="{{ route('property.show',$featured_property->slug ?? '') }}">
                            <div class="single-nine-property-grid">
                                <div class="badge-section">
                                    <p>{{ __('LATEST') }}</p>
                                </div>
                                <div class="property-price">
                                    <h4>{{ amount_format($featured_property->min_price->price ?? 0) }} - {{ amount_format($featured_property->max_price->price ?? 0) }}</h4>
                                </div>
                                <div class="property-nine-title">
                                    <h3>{{ $featured_property->title ?? '' }}</h3>
                                    <div class="property-location">
                                        <span class="iconify" data-icon="entypo:location-pin" data-inline="false"></span><p>{{ $featured_property->post_city->value ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="property-features">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="user-info">
                                                 <img src="{{ $featured_property->user->avatar ?? '' }}" alt=""> <span> {{ $featured_property->user->name ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="user-date-info f-right">
                                                <p>{{ $featured_property->created_at->diffForHumans() ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- recentproperty area start -->
@include('view::layouts.section.properties.recent')
<!-- recentproperty area end -->

<!-- counter area start -->
@include('view::layouts.section.counter.index')
<!-- counter area end -->

<!-- find agents area start -->
@include('view::layouts.section.agents.agents')
<!-- find agents area end -->

<!-- city area start -->
@include('view::layouts.section.places.city')
<!-- city area end -->

<!-- blog area start -->
@include('view::layouts.section.blog.blog')
<!-- blog area end -->

<input type="hidden" id="agent_url" value="{{ route('agent.data') }}">
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/home.js') }}"></script>
@endpush
