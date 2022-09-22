@extends('theme::layouts.app')
@push('css')
<link rel="stylesheet" href="{{ theme_asset('assets/css/fontawesome-all.min.css') }}">
@endpush
@section('content')
 <!-- hero area start -->
 <section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Project List') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('project list') }}</li>
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


<section>
        <div class="property-list-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="property-filter-area">
                            <div class="property-filter-form">
                                <form class="search_form">
                                    <div class="form-group">
                                        <input type="text" placeholder="{{ __('Keyword') }}" value="{{ $src ?? '' }}" class="form-control" name="src">
                                        <div class="search-icon">
                                            <span class="iconify" data-icon="ri:search-line" data-inline="false"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>{{ __('Type') }}</label>
                                        <select class="form-control" name="category">
                                            @foreach($categories as $row)
                                            <option value="{{ $row->id }}"  @if($category == $row->id) selected="selected" @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('State') }}</label>
                                        <select class="form-control" name="state">

                                            @foreach ($states as $row)
                                            <option value="{{ $row->id }}" @if($state == $row->id) selected="selected" @endif>{{ $row->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-btn">
                                        <button type="submit">{{ __('Search') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row" id="item_lists">

                        </div>
                         <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="show-pagination-info">
                                    <p class="show-info">{{ __('Showing') }} <span><span id="from"></span> - <span id="to"></span> {{ __('of') }} <span id="total"></span></span> {{ __('List') }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pagination-area f-right">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">

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
@endsection
@push('js')
<script src="{{ theme_asset('assets/js/helper.js') }}"></script>
<script src="{{ theme_asset('assets/js/project/project-list.js') }}"></script>
@endpush
