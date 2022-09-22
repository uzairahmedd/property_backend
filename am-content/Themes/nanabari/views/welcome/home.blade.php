@extends('theme::layouts.app')

@section('content')
<!-- hero area start -->
<section>
    <div class="hero-area-demo">
        <div id="hero-map" class="hero-map">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route(list_page()) }}">
                        <div class="custom-search-box">
                            @php
                                $statuses = App\Category::where('type','status')->where('featured',1)->take(4)->get();
                                $categories = App\Category::where('type','category')->get();
                                $states = App\Category::where('type','states')->get();
                            @endphp
                            <div class="header-box-top-area">
                                <nav>
                                    <ul>
                                        @foreach ($statuses as $key=>$value)
                                        <li class="{{ $key == 0 ? 'active' : '' }}" onclick="status_change('{{ $value->id }}')"><a href="#">{{ $value->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                            <input type="hidden" name="status" id="property_status" value="{{ $statuses->first()->id }}">
                            <div class="search-form-area">
                                <input type="text" placeholder="{{ __('Enter Your Keyword') }}" name="src">
                                <div class="custom-form-select">
                                    <div class="form-group">
                                        <select name="category" class="form-control selectric">
                                            <option disabled selected>{{ __('Property Type') }}</option>
                                            @foreach ($categories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit">{{ __('Search') }}</button>
                            </div>
                            <div class="search-form-bottom-area">
                                <div class="form-group mr-3 custom-state-area">
                                    <select name="state" class="form-control selectric">
                                        <option disabled selected>{{ __('Select Your State') }}</option>
                                        @foreach ($states as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="min-price-area">
                                    <input type="number" placeholder="{{ __('Min Price') }}" name="min_price">
                                </div>
                                <div class="min-price-area">
                                    <input type="number" placeholder="{{ __('Max Price') }}" name="max_price">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->

<!-- find agents area start -->
@include('view::layouts.section.agents.agents')
<!-- find agents area end -->

<!-- featured properties area start -->
@include('view::layouts.section.properties.featured')
<!-- featured properties area end -->

<!-- places area start -->
@include('view::layouts.section.places.places')
<!-- places area end -->

<!-- blog area start -->
@include('view::layouts.section.blog.blog')
<!-- blog area end -->

<input type="hidden" id="agent_url" value="{{ route('agent.data') }}">
<input type="hidden" id="lat" value="{{ $lat }}">
<input type="hidden" id="long" value="{{ $long }}">
<input type="hidden" id="zoom" value="{{ $zoom }}">
<input type="hidden" id="pin" value="{{ asset('uploads/pin.png') }}">
<input type="hidden" id="asset_url" value="{{ url('/') }}">
<input type="hidden" id="random_property_url" value="{{ route('random.property') }}">
@endsection

@push('js')

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key={{ env('GOOGLE_API_KEY') }}"></script>
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/home.js') }}"></script>
<script src="{{ theme_asset('nanabari/public/js/index.js') }}"></script>


@endpush
