@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section id="hero">
    <div class="slider-eleven-area" id="hero_bg_img" style="background-image: url('{{ asset(content('hero','hero_bg_img')) }}');">
         <div class="slider-eleven-main-area">
             <div class="slider-title-content">
                 <h2 id="hero_title">{{ content('hero','hero_title') }}</h2>
             </div>
             <form action="{{ route(list_page()) }}">
                <div class="slider-eleven-form-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                @php
                                    $statuses = App\Category::where('type','status')->where('featured',1)->take(4)->get();
                                    $categories = App\Category::where('type','category')->get();
                                    $states = App\Category::where('type','states')->get();
                                @endphp
                                <div class="slider-eleven-form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="{{ __('Enter Your Keyword') }}" name="src">
                                        </div>
                                        <div class="col-lg-2">
                                            <select name="status" class="selectric">
                                                <option disabled selected>{{ __('Select Status') }}</option>
                                                @foreach ($statuses as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <select name="category" class="selectric">
                                                <option disabled selected>{{ __('Property Type') }}</option>
                                                @foreach ($categories as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit">{{ __('Search') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </form>
         </div>
    </div>
 </section>
<!-- slider area end -->

<!-- find agents area start -->
@include('view::layouts.section.agents.agents')
<!-- find agents area end -->

<!-- featured properties area start -->
<section class="mt-100">
    @include('view::layouts.section.properties.featured')
</section>
<!-- featured properties area end -->

<!-- city area start -->
@include('view::layouts.section.places.places')
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
