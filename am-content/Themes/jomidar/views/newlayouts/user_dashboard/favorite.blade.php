@extends('theme::newlayouts.app')
@section('content')
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/second-page.css')}}">
<link rel="stylesheet" href="{{theme_asset('assets/newcss/profile.css')}}">
<div class="profile d-flex justify-content-end">
    <div class="overlay"></div>
    <div id="load_cover">
        <div class="loaderInner">
            <div class="loader-logo"></div>
        </div>
    </div>
    <div class="favorite-container col-lg-10 col-md-12">
        <div class="nav-tab">
            <nav>
                <div class="nav nav-tabs d-flex align-items-end justify-content-end" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span>(<span class="theme-text-sky results">0</span>)</span>&nbsp;{{__('labels.property')}}</a>
                </div>
            </nav>
            <!-- <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" >  -->
            <div class="all-listing">
                <div class="property-lists">
                    <div class="row" id="favorite_properties_list">

                    </div>
                </div>
            </div>
            <!-- </div>
               </div>  -->
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="pagination-area f-right">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 ">
            <div class="show-pagination-info text-center">
                <p class="show-info">{{ __('Showing') }} <span><span id="user_favorite_from">
                        </span> - <span id="user_favorite_to"></span> {{ __('of') }} <span id="user_favorite_total"></span></span> {{ __('List') }}</p>
            </div>
        </div>
    </div>
    @include('theme::newlayouts.partials.sidebar')
</div>
@endsection
@section('favorite_properties')
<script src="{{theme_asset('assets/newjs/user_favorite.js')}}"></script>
@endsection