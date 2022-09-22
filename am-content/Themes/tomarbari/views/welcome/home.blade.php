@extends('theme::layouts.app')

@section('content')
<!-- slider area start -->
<section>
    <div class="slider-ten-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="slider-top-search-box">
                        <form action="{{ url(list_page()) }}">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <select name="category" class="form-control selectric">
                                            <option disabled value="" selected>{{ __('Select Type') }}</option>
                                            @foreach($categories as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                        <select name="state" class="form-control selectric">
                                        <option disabled value="" selected>{{ __('Select State') }}</option>
                                        @foreach($states as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 pl-0">
                                    <div class="form-group">
                                        <input type="text" name="src" placeholder="{{ __('Keyword') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2 pl-0">
                                    <div class="form-group">
                                        <button type="submit">{{ __('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="property-ten-area">
                        <div class="row" id="latest_data">

                        </div>
                        <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="show-pagination-info">
                                        <p class="show-info">{{ __('Showing') }} <span><span id="from"></span> - <span id="to"></span> of <span id="total"></span></span> {{ __('List') }}</p>
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
                <div class="col-lg-5">
                    <div id="custom-map"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->

<input type="hidden" id="lat" value="{{ $lat }}">
<input type="hidden" id="long" value="{{ $long }}">
<input type="hidden" id="zoom" value="{{ $zoom }}">
<input type="hidden" id="pin" value="{{ asset('uploads/pin.png') }}">
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key={{ env('GOOGLE_API_KEY') }}"></script>
<script src="{{ theme_asset('tomarbari/public/js/index.js') }}"></script>
@endpush
