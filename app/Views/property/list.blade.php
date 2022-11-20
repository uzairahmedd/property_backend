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
                            <h2>{{ __('Property lists') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Property lists') }}</li>
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
                            <form class="search_form" action="{{ route(list_page()) }}">
                                <div class="form-group">
                                    <input type="text" placeholder="{{ __('Keyword') }}" value="{{ $src }}" class="form-control" name="src">
                                    <div class="search-icon">
                                        <span class="iconify" data-icon="ri:search-line" data-inline="false"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">---{{ __('Select Status') }}---</option>
                                        @foreach($statuses as $row)
                                        <option value="{{ $row->id }}" @if($status==$row->id) selected="selected" @endif>{{ $row->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Type') }}</label>
                                    <select class="form-control" name="category">
                                        <option value="">---{{ __('Select Type') }}---</option>
                                        @foreach($categories as $row)
                                        <option value="{{ $row->id }}" @if($category==$row->id) selected="selected" @endif>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('State') }}</label>
                                    <select class="form-control" name="state">

                                        @foreach ($states as $row)
                                        <option value="{{ $row->id }}" @if($state==$row->id) selected="selected" @endif>{{ $row->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                @if(in_array(15,$input_array))
                                <div class="form-group">
                                    <label>{{ __('Number of Blocks') }}</label>
                                    <select class="form-control" name="block[15]">
                                        <option selected value="">-- Select --</option>
                                        <option value="1" @if($block==1) selected @endif>{{ __('1 Block') }}</option>
                                        <option value="2" @if($block==2) selected @endif>{{ __('2 Blocks') }}</option>
                                        <option value="3" @if($block==3) selected @endif>{{ __('3 Blocks') }}</option>
                                        <option value="4" @if($block==4) selected @endif>{{ __('4 Blocks') }}</option>
                                        <option value="5" @if($block==5) selected @endif>{{ __('5+ Blocks') }}</option>
                                    </select>
                                </div>
                                @endif
                                @if(in_array(16,$input_array))
                                <div class="form-group">
                                    <label>{{ __('Number of Bedrooms') }}</label>
                                    <select class="form-control" name="badroom[16]">
                                        <option selected value="">-- {{ __('Select') }} --</option>
                                        <option value="1" @if($badroom==1) selected @endif>{{ __('1 Room') }}</option>
                                        <option value="2" @if($badroom==2) selected @endif>{{ __('2 Rooms') }}</option>
                                        <option value="3" @if($badroom==3) selected @endif>{{ __('3 Rooms') }}</option>
                                        <option value="4" @if($badroom==4) selected @endif>{{ __('4 Rooms') }}</option>
                                        <option value="5" @if($badroom==5) selected @endif>{{ __('5+ Rooms') }}</option>
                                    </select>
                                </div>
                                @endif
                                @if(in_array(17,$input_array))
                                <div class="form-group">
                                    <label>{{ __('Number of Bathrooms') }}</label>
                                    <select class="form-control" name="bathroom[17]">
                                        <option selected value="">-- {{ __('Select') }} --</option>
                                        <option value="1" @if($bathroom==1) selected @endif>{{ __('1 Room') }}</option>
                                        <option value="2" @if($bathroom==2) selected @endif>{{ __('2 Rooms') }}</option>
                                        <option value="3" @if($bathroom==3) selected @endif>{{ __('3 Rooms') }}</option>
                                        <option value="4" @if($bathroom==4) selected @endif>{{ __('4 Rooms') }}</option>
                                        <option value="5" @if($bathroom==5) selected @endif>{{ __('5+ Rooms') }}</option>
                                    </select>
                                </div>
                                @endif
                                @if(in_array(18,$input_array))
                                <div class="form-group">
                                    <label>{{ __('Number of Floors') }}</label>
                                    <select class="form-control" name="floor[18]">
                                        <option selected value="">--Select--</option>
                                        <option value="1" @if($floor==1) selected @endif>{{ __('1 Floor') }}</option>
                                        <option value="2" @if($floor==2) selected @endif>{{ __('2 Floors') }}</option>
                                        <option value="3" @if($floor==3) selected @endif>{{ __('3 Floors') }}</option>
                                        <option value="4" @if($floor==4) selected @endif>{{ __('4 Floors') }}</option>
                                        <option value="5" @if($floor==5) selected @endif>{{ __('5+ Floors') }}</option>
                                    </select>
                                </div>
                                @endif

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="form-group mr-15">
                                        <input type="number" step="any" value="{{ $min_price }}" name="min_price" placeholder="{{ __('Min Price') }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" step="any" value="{{ $max_price }}" name="max_price" placeholder="{{ __('Max Price') }}" class="form-control">
                                    </div>
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
<script src="{{ theme_asset('assets/js/property-list.js') }}"></script>
@endpush
