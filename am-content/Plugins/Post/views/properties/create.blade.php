@extends('layouts.backend.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
    <script src="{{ asset('admin/js/dropzone.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4>{{ __('Add new property') }}</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('admin.property.store') }}">
                        @csrf

                        <div class="form-group mt-3">
                            <label>Property</label>
                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
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
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Property Area</label>
                                        <input type="text" step="any" name="property_area" class="form-control"
                                               required="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Address of Property</label>
                                        <input type="text" step="any" name="property_address" class="form-control"
                                               required="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Address of Property</label>
                                        <select class="form-control form-select-lg mb-3"
                                                aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

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

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Street Information 1</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Street Information 2</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>{{ __('Select Category') }}</label>
                                <select class="form-control" name="type">
                                    <?php echo ConfigCategory('category') ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Min Price</label>
                                        <input type="number" step="any" name="min_price" class="form-control"
                                               required="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Max Price</label>
                                        <input type="number" step="any" name="max_price" class="form-control"
                                               required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Video Link</label>
                                        <input type="number" step="any" name="" class="form-control"
                                               required="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Property Features</label>
                                        <select class="form-control form-select-lg mb-3"
                                                aria-label=".form-select-lg example">
                                            <option value="1">Balcony</option>
                                            <option value="2">Fitness Center</option>
                                            <option value="3">Security</option>
                                            <option value="4">Parking</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

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
                                <button class="btn btn-primary submitbtn" disabled="" type="submit">Next</button>
                            </div>
                        </div>



                    </form>
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

