@extends('theme::layouts.app')

@section('content')
<!-- hero area start -->
<section id="hero">
    <div class="hero-right-bg-img" id="hero_background_img" style="background-image: url('{{ asset(content('hero','hero_background_img')) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-eight">
                         <div class="hero-eight-content">
                             <h2 id="hero_big_title">{{ content('hero','hero_big_title') }}</h2>
                             <p id="hero_des">{{ content('hero','hero_des') }}</p>
                             <div class="hero-eight-form">
                                 <form action="{{ route(list_page()) }}">
                                     <div class="row">
                                         <div class="col-lg-6">
                                             <div class="form-group">
                                                 <input type="text" name="src" id="hero_address_placeholder" placeholder="{{ content('hero','hero_address_placeholder') }}" class="form-control">
                                             </div>
                                         </div>
                                         <div class="col-lg-2">
                                             <div class="form-eight-btn">
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
<!-- hero area end -->

<!-- featured properties area start -->
<section class="mt-100">
    @include('view::layouts.section.properties.featured')
</section>
<!-- featured properties area end -->

<!-- city area start -->
@include('view::layouts.section.places.city')
<!-- city area end -->

<!-- review area start -->
@include('view::layouts.section.review.index')
<!-- review area end -->

<!-- blog area start -->
@include('view::layouts.section.blog.blog')
<!-- blog area end -->
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/home.js') }}"></script> 
@endpush