@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
@endsection

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Edit Input'])
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.input.update',$info->id) }}" class="basicform">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="text">{{ __('Name') }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="title" id="text" placeholder="Enter Name" autocomplete="off" required="" value="{{ $info->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">{{ __('Input Type') }}</label>
                        <div class="input-group">
                            <select name="input_type" class="form-control">
                                <option value="text" @if($info->slug=='text') selected="" @endif>{{ __('Text') }}</option>
                                <option value="number" @if($info->slug=='number') selected="" @endif>{{ __('Number') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text">{{ __('Is Required') }}</label>
                        <div class="input-group">
                            <select name="required" class="form-control">
                                <option value="1"  @if($info->status==1) selected="" @endif>{{ __('Yes') }}</option>
                                <option value="0" @if($info->status==0) selected="" @endif>{{ __('No') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Select Category') }}</label>
                        <select multiple="" class="form-control select2" name="child[]">
                            @foreach($categories as $row)
                            <option value="{{ $row->id }}" @if(in_array($row->id, $childs)) selected="" @endif>{{ $row->name }}</option>
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
                    <h5>{{ __('Is Featured ?') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                        <option  value="1" @if($info->featured==1) selected="" @endif>{{ __('Yes') }}</option>
                        <option value="0"  @if($info->featured==0) selected="" @endif>{{ __('No') }}</option>
                    </select>
                </div>
            </div>
        </div>
            <?php
                if(!empty($info->preview)){
                    $media['preview'] = $info->preview->content;
                    $media['value'] = $info->preview->content;
                    $media['title'] = 'Icon Image';
                    echo  mediasection($media);
                }
                else{
                    $media['title'] = 'Icon Image';
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
(function ($) {
    $('.use').on('click',function(){
      $('#preview').attr('src',myradiovalue);
      $('#preview_input').val(myradiovalue);
    });
})(jQuery);
</script>
@endsection
