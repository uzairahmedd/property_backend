@extends('theme::layouts.app')

@section('content')
 <!-- hero area start -->
 <section id="agency_list_breadcrumb">
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');" id="bg_breadcrumb_img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2 id="breadcrumb_agency_title">{{ __('All Agency') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li id="breadcrumb_agency_des">{{ __('All Agency') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->

<!-- agency list area start -->
<section>
    <div class="property-list-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="agency-list-area">
                        <input type="hidden" id="agency_list_data_url" value="{{ route('agency.list.data') }}">
                        <div class="row" id="agency_lists"></div>
                        @if ($agency > 4)
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="propery-review-see-more-btn text-center agency-load-more">
                                    <a href="javascript:void(0)" id="agency_load_more"><span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> {{ __('See More Agents') }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- agency list area end -->
@endsection

@push('js')
    <script src="{{ theme_asset('assets/js/agency-list.js') }}"></script>    
@endpush