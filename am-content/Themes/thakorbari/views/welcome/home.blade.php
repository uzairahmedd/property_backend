@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section id="hero">
    <div class="hero-five-area" id="hero_background_img" style="background-image: url('{{ asset(content('hero','hero_background_img')) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-five-main-content">
                        <div class="slider-five-content">
                            <h2 id="hero_big_title">{{ content('hero','hero_big_title') }}</h2>
                            <p id="hero_des">{{ content('hero','hero_des') }}</p>
                            <div class="slider-property-five-form">
                                @php
                                    $statuses = App\Category::where('type','status')->where('featured',1)->take(4)->get();
                                    $categories = App\Category::where('type','category')->get();
                                @endphp
                                <form action="{{ route(list_page()) }}">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="custom-input">
                                                <input type="text" id="hero_address_placeholder" placeholder="{{ content('hero','hero_address_placeholder') }}" name="src">
                                                <div class="location-five-icon">
                                                    <span class="iconify" data-icon="bytesize:location" data-inline="false"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="custom-form">
                                                <select class="custom-select mr-sm-2 selectric" id="inlineFormCustomSelect" name="status">
                                                    <option selected disabled>{{ __('Property Status') }}</option>
                                                    @foreach ($statuses as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="custom-form">
                                                <select class="custom-select mr-sm-2 selectric" id="inlineFormCustomSelect" name="category">
                                                    <option selected disabled>{{ __('Property Type') }}</option>
                                                    @foreach ($categories as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="search-five-btn">
                                                <button type="submit" id="hero_search_btn">{{ content('hero','hero_search_btn') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- featured properties area start -->
<section class="mt-100">
    @include('view::layouts.section.properties.featured')
</section>
<!-- featured properties area end -->

<!-- counter area start -->
@include('view::layouts.section.counter.index')
<!-- counter area end -->

<!-- find agents area start -->
@include('view::layouts.section.agents.agents')
<!-- find agents area end -->

<!-- blog area start -->
@include('view::layouts.section.blog.blog')
<!-- blog area end -->
<input type="hidden" id="agent_url" value="{{ route('agent.data') }}">
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/home.js') }}"></script>
@endpush
