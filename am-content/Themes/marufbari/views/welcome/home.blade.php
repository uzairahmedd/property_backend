@extends('theme::layouts.app')

@section('content')
<!-- hero area start -->
<section id="hero">
    <div class="hero-seven-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                     <div class="hero-slider-seven-content text-center">
                         <div class="hero-slider-seven-main-area">
                             <h2 id="hero_big_title">{{ content('hero','hero_big_title') }}</h2>
                             <div class="slider-seven-form-area">
                                 @php
                                    $statuses = App\Category::where('type','status')->where('featured',1)->take(4)->get();
                                    $categories = App\Category::where('type','category')->get();
                                    $states = App\Category::where('type','states')->get(); 
                                 @endphp
                                 <form action="{{ route(list_page()) }}">
                                     <div class="row">
                                         <div class="col-lg-3">
                                             <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
                                                <option selected disabled>{{ __('Choose...') }}</option>
                                                @foreach ($statuses as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                             </select>
                                         </div>
                                         <div class="col-lg-7">
                                             <div class="slider-location-seven-input">
                                                 <h4>{{ __('Keyword') }}</h4>
                                                 <input type="text" placeholder=" {{ __('Enter Here...') }}" class="form-control" name="src">
                                             </div>
                                         </div>
                                         <div class="col-lg-2">
                                             <div class="slider-seven-btn">
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

<!-- counter area start -->
@include('view::layouts.section.counter.index')
<!-- counter area end -->

<!-- city area start -->
<section class="mt-100">
    @include('view::layouts.section.places.city')
</section>
<!-- city area end -->

<!-- blog area start -->
@include('view::layouts.section.blog.blog')
<!-- blog area end --> 
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/home.js') }}"></script> 
@endpush