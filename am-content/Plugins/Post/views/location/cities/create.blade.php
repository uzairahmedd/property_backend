@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Add new City') }}</h4>
                <form method="post" action="{{ route('admin.location.store') }}" class="basicform">
                    @csrf
                    <div class="pt-20">
                        @php
                        $arr['title']= 'City Name';
                        $arr['id']= 'title';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'Enter Name';
                        $arr['name']= 'name';
                        $arr['is_required'] = true;

                        echo input($arr);

                        $ar_arr['title']= 'City Name in Arabic';
                        $ar_arr['id']= 'ar_title';
                        $ar_arr['type']= 'text';
                        $ar_arr['placeholder']= 'Enter Name in Arabic';
                        $ar_arr['name']= 'ar_name';
                        $ar_arr['is_required'] = true;

                        echo input($ar_arr);



                        @endphp
                    </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="single-area">
            <div class="card">
                <div class="card-body">
                    <h5>{{ __('Publish') }}</h5>
                    <hr>
                    <div class="btn-publish">
                        <button type="submit" class="btn btn-primary col-12 basicbtn"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                    <h5>{{ __('Is Featured ?') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                        <option value="1">{{ __('Yes') }}</option>
                        <option value="0" selected>{{ __('No') }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="type" value="city">
    </form>
    {{ mediasingle() }}
    @endsection

    @section('script')
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <script src="{{ asset('admin/js/media.js') }}"></script>

    <script>
        "use strict";
        (function($) {

            $('.use').on('click', function() {

                $('#preview').attr('src', myradiovalue);
                $('#preview_input').val(myradiovalue);

            });

        })(jQuery);

        function success(argument) {
            $('.basicform').trigger('reset')
        }
    </script>
    @endsection