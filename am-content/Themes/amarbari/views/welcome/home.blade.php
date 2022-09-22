@extends('theme::layouts.app')

@section('content')

<!-- slider area start -->
<section id="hero">
    <div class="slider-area slider-demo-3 demo-6" id="hero_background_img" style="background-image: url('{{ asset(content('hero','hero_background_img')) }}');">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="slider-demo-6-left-content">
                        <div class="main-content">
                            <h2 id="hero_big_title">{{ content('hero','hero_big_title') }}</h2>
                            <p id="hero_des">{{ content('hero','hero_des') }}</p>
                            <a id="hero_first_btn_link" href="{{ content('hero','hero_first_btn_link') }}"><span id="hero_first_btn_title">{{ content('hero','hero_first_btn_title') }}</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <form action="{{ route(list_page()) }}">
                        <div class="slider-right-search">
                            <div class="header-bottom-area demo-6">
                                <div class="container">
                                    @php
                                        $statuses = App\Category::where('type','status')->where('featured',1)->take(4)->get();
                                        $categories = App\Category::where('type','category')->get();
                                        $states = App\Category::where('type','states')->get();
                                    @endphp
                                    <div class="row">
                                        <div class="col-lg-6 mb-20">
                                            <div class="header-search-select-form">
                                                <select name="status" class="selectric">
                                                    @foreach ($statuses as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="header-search-input-form">
                                                <input type="text" placeholder="Enter your Keyword" name="src">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="header-search-select-form">
                                                <select name="category" class="selectric">
                                                    <option disabled selected>{{ __('Property Type') }}</option>
                                                    @foreach ($categories as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="header-search-select-form">
                                                <select name="state" class="selectric">
                                                    <option selected disabled>{{ __('Select Your State') }}</option>
                                                    @foreach ($states as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="header-search-input-form">
                                                <input type="number" placeholder="{{ __('Min Price') }}" name="min_price">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="header-search-input-form">
                                                <input type="number" placeholder="{{ __('Max Price') }}" name="max_price">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="header-bottom-search-btn">
                                                <button type="submit">{{ __('Search') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

<!-- places area start -->
@include('view::layouts.section.places.places',['class'=>'place-demo-3'])
<!-- places area end -->

<!-- find agents area start -->
@include('view::layouts.section.agents.agents',['class'=>'agents-demo-3'])
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
