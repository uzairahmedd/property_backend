@extends('layouts.backend.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
    <script src="{{ asset('admin/js/dropzone.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="header"><h4>{{ __('Add Property') }}</h4></div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                               aria-controls="home" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab"
                               aria-controls="profile" aria-selected="false">Images</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="profile-tab3">
                            <form action="{{ route('admin.media.store') }}" enctype="multipart/form-data"
                                  class="dropzone" id="mydropzone">
                                @csrf
                                <input type="hidden" name="term_id" value="">
                            </form>
                            <div class="row">
                                {{--                                @foreach($info->medias as $key => $row)--}}
                                <div class="col-sm-3" id="">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="" alt="" height="100" width="150">
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-danger col-12"
                                                    onclick="">{{ __('Remove') }}</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form method="post" action="{{ route('admin.property.store') }}">
                                @csrf

                                <div class="form-group mt-3">
                                    <label>Property</label>
                                    <select class="form-control form-select-lg mb-3"
                                            aria-label=".form-select-lg example">
                                        <option selected>Select Property Type</option>
                                        <option value="1">Rent</option>
                                        <option value="2">Sale</option>
                                        <option value="3">Auction</option>
                                    </select>
                                </div>
                                <div>
                                    @php
                                        $arr['title']= 'Name';
                                        $arr['id']= 'title';
                                        $arr['type']= 'text';
                                        $arr['placeholder']= 'Enter Name';
                                        $arr['name']= 'title';
                                        $arr['is_required'] = true;

                                        echo  input($arr);

                                    @endphp

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Property Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                  rows="3"></textarea>
                                    </div>

                                    {{--                                    Select property, area , region --}}
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Property Area</label>
                                                <input type="text" step="any" name="property_area" class="form-control"
                                                       required="" placeholder="Area in Square Meter">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Address of Property</label>
                                                <input type="text" step="any" name="property_address"
                                                       class="form-control"
                                                       required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Select your Region</label>
                                                <select class="form-control form-select-lg mb-3"
                                                        aria-label=".form-select-lg example">
                                                    <option selected>Select your Region</option>
                                                    <option value="1">Makkah</option>
                                                    <option value="2">Madina</option>
                                                    <option value="3">Riyadh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--property nature, type and value input box--}}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Property Nature</label>
                                            <select class="form-control form-select-lg mb-3"
                                                    aria-label=".form-select-lg example">
                                                <option selected>Property Nature</option>
                                                <option value="1">Residential</option>
                                                <option value="2">Commercial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Property Type</label>
                                            <select class="form-control form-select-lg mb-3"
                                                    aria-label=".form-select-lg example">
                                                <option selected>Property Type</option>
                                                <option value="1">Building</option>
                                                <option value="2">Charlet</option>
                                                <option value="2">Duplex</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Property Value</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{--water and electric Facilities--}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is there an electricity meter?</label>
                                            <select class="form-control form-select-lg mb-3"
                                                    aria-label=".form-select-lg example">
                                                <option selected>Is there an electricity meter?</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is there a water meter?</label>
                                            <select class="form-control form-select-lg mb-3"
                                                    aria-label=".form-select-lg example">
                                                <option selected>Is there a water meter?</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{--Street Information Input Boxes--}}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>No. of Street</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Street Information 1</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Street Information 2</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{--Optional Facilities parking, board, charlet--}}
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Parking</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Board</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Lounges</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bathrooms</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bedrooms</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{-- youtube video link--}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Video Link</label>
                                            <input type="number" step="any" name="" class="form-control"
                                                   required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Select Category') }}</label>
                                    <select class="form-control" name="type">
                                        <?php echo ConfigCategory('category') ?>
                                    </select>
                                </div>

                                {{--                                Min and Max Price Input Boxes--}}
                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-sm-6">--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label>Min Price</label>--}}
                                {{--                                                <input type="number" step="any" name="min_price" class="form-control"--}}
                                {{--                                                       required="">--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="col-sm-6">--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label>Max Price</label>--}}
                                {{--                                                <input type="number" step="any" name="max_price" class="form-control"--}}
                                {{--                                                       required="">--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}


                                <div class="form-group">
                                    <label>Features</label>
                                    <div class="feature-check">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                   value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Wifi</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                   value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Swimming Pool</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                   value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">Parking</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                                   value="option4">
                                            <label class="form-check-label" for="inlineCheckbox4">Security</label>
                                        </div>
                                    </div>
                                </div>
                                {{--identification and instrument number--}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Identification No.</label>
                                            <input type="number" name="" class="form-control"
                                                   required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Instrument No.</label>
                                            <input type="number" name="" class="form-control"
                                                   required="">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary submitbtn" disabled="" type="submit">Next
                                    </button>
                                </div>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" name="user_id" id="user_id">
    </form>

    <form method="post" action="{{ route('admin.properties.findUser') }}" id="basicform3">
        @csrf
        <input type="hidden" name="email" id="user_mail">
    </form>
@endsection

@section('script')
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <script type="text/javascript">
        "use strict";

        $('#email').on('focusout', () => {
            $('#user_mail').val($('#email').val());
            $('#basicform3').submit();
        });

        function success3(res) {
            $('#user_id').val(res.id);
            $('.submitbtn').removeAttr('disabled');
        }
    </script>
@endsection

