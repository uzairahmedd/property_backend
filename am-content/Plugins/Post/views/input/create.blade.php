@extends('layouts.backend.app')

@section('style')
    @php
        $create_input = __('labels.create_input');
        $icon_image = __('labels.icon_image');
    @endphp
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
<style>
    .select2 .select2-container .select2-container--default{
        width: none !important;
    }
</style>
@endsection

@section('content')
@include('layouts.backend.partials.headersection',['title'=> $create_input])
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.input.store') }}" class="basicform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="text">{{__('labels.name')}}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="title" id="text" placeholder=" {{__('labels.enter_name')}}" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">{{__('labels.arabic_name')}}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="ar_title" id="ar_text" placeholder="{{__('labels.enter_name_in_arabic')}}" autocomplete="off" required="">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="text">{{ __('Input Type') }}</label>
                        <div class="input-group">
                            <select name="input_type" class="form-control">
                                <option value="text">{{ __('Text') }}</option>
                                <option value="number">{{ __('Number') }}</option>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="text">{{ __('Is Required') }}</label>
                        <div class="input-group">
                            <select name="required" class="form-control">
                                <option value="1">{{ __('Yes') }}</option>
                                <option value="0" selected="">{{ __('No') }}</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label>{{__('labels.select_category')}}</label>
                        <select multiple="" class="form-control select2" name="child[]">
                            {{ ConfigCategory('category') }}
                        </select>
                    </div>
            </div>
        </div>
    </div>
    {{ publish(['class'=>'basicbtn']) }}
    <div class="single-area">
        <div class="card sub">
            <div class="card-body">
                <h5>{{__('labels.is_featured')}}</h5>
                <hr>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                    <option value="1">{{__('labels.yes')}}</option>
                    <option value="0" selected>{{__('labels.no')}}</option>
                </select>
            </div>
        </div>
    </div>
    {{ mediasection(array('title'=>$icon_image)) }}
    </form>
</div>
</div>
</div>
{{ mediasingle() }}
@endsection

@section('script')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
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

    function success(res) {
        $('.basicform').trigger('reset');
    }
</script>
@endsection
