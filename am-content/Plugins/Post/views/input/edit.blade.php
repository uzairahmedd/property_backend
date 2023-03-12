@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
<style>
    .select2 .select2-container .select2-container--default {
        width: none !important;
    }
</style>
@endsection
@php
$edit_input = __('labels.edit_input');
$icon_image = __('labels.icon_image');
@endphp
@section('content')
@include('layouts.backend.partials.headersection',['title'=> $edit_input])
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.input.update',$info->id) }}" class="basicform">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="text">{{__('labels.name')}}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="title" id="text" placeholder=" {{__('labels.enter_name')}}" autocomplete="off" required="" value="{{ $info->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">{{__('labels.arabic_name')}}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="ar_title" id="ar_text" placeholder="{{__('labels.enter_name_in_arabic')}}" autocomplete="off" required="" value="{{ $info->ar_name }}">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="text">{{ __('Input Type') }}</label>
                        <div class="input-group">
                            <select name="input_type" class="form-control">
                                <option value="text" @if($info->slug=='text') selected="" @endif>{{ __('Text') }}</option>
                                <option value="number" @if($info->slug=='number') selected="" @endif>{{ __('Number') }}</option>
                            </select>
                        </div>
                    </div>-->
                    <!-- <div class="form-group">
                        <label for="text">{{ __('Is Required') }}</label>
                        <div class="input-group">
                            <select name="required" class="form-control">
                                <option value="1"  @if($info->status==1) selected="" @endif>{{ __('Yes') }}</option>
                                <option value="0" @if($info->status==0) selected="" @endif>{{ __('No') }}</option>
                            </select>
                        </div>
                    </div>  -->
                    <div class="form-group col-12">
                        <label>{{__('labels.select_category')}}</label>
                        <select multiple="" class="form-control select2" name="child[]">
                            @foreach($categories as $row)
                            <option value="{{ $row->id }}" @if(in_array($row->id, $childs)) selected="" @endif>{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name }}</option>
                            @endforeach
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
                    <option value="1" @if($info->featured==1) selected="" @endif>{{__('labels.yes')}}</option>
                    <option value="0" @if($info->featured==0) selected="" @endif>{{__('labels.no')}}</option>
                </select>
            </div>
        </div>
    </div>
    <?php
    if (!empty($info->preview)) {
        $media['preview'] = $info->preview->content;
        $media['value'] = $info->preview->content;
        $media['title'] = $icon_image;
        echo  mediasection($media);
    } else {
        $media['title'] = $icon_image;
        echo mediasection($media);
    }
    ?>
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
    //success response will assign here
    function success(res) {
        location.reload()
    }
</script>
@endsection