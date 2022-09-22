@extends('theme::layouts.app')

@section('content')

<!-- slider area start -->
<section id="hero">
    <div class="slider-area slider-demo-3" id="hero_background_img" style="background-image: url('{{ asset(content('hero','hero_background_img')) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content text-center">
                        <div class="slider-main-content slider-demo-3">
                            <h1 id="hero_big_title">{{ content('hero','hero_big_title') }}</h1>
                            <p id="hero_des">{{ content('hero','hero_des') }}</p>
                            <a id="hero_first_btn_link" href="{{ content('hero','hero_first_btn_link') }}"><span id="hero_first_btn_title">{{ content('hero','hero_first_btn_title') }}</span></a>
                            <a id="hero_second_btn_link" href="{{ content('hero','hero_second_btn_link') }}"><span id="hero_second_btn_title">{{ content('hero','hero_second_btn_title') }}</span></a>
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