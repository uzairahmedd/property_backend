@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section id="hero">
    <div class="slider-demo-4-area" style="background-image: url('{{ asset(content('hero','hero_background_img')) }}');" id="hero_background_img">
        <div class="slider-content-demo-4">
            <div class="row w-100">
                <div class="col-lg-6 offset-lg-3">
                    <div class="slider-demo-4-main-content">
                        <h2 class="text-center" id="hero_big_title">{{ content('hero','hero_big_title') }}</h2>
                        <div class="slider-demo-4-search-bar">
                            @php
                                $statuses = App\Category::where('type','status')->where('featured',1)->take(4)->get();
                            @endphp
                            <form action="{{ route(list_page()) }}">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 pr-0">
                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
                                            @foreach ($statuses as $value)
                                            <option value="{{ $value->id }}">{{ __('For') }} {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-7 pr-2 pl-2">
                                        <input type="text" class="form-control" placeholder="{{ __('Enter Your Keyword') }}" name="src">
                                    </div>
                                    <div class="col-lg-1 pl-0">
                                        <button type="submit"><span class="iconify" data-icon="bx:bx-search" data-inline="false"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- slider area end -->

<!-- city area start -->
<section class="mt-100">
    @include('view::layouts.section.places.city')
</section>
<!-- city area end -->

<!-- featured properties area start -->
@include('view::layouts.section.properties.featured')
<!-- featured properties area end -->

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