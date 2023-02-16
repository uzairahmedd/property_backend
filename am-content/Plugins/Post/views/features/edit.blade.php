@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}"/>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Edit feature') }}</h4>
        <form method="post" action="{{ route('admin.feature.update',$info->id) }}" id="basicform">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="text">{{__('labels.name')}}</label>
            <div class="input-group">
              <input type="text" class="form-control item-menu" name="name" id="text" placeholder="{{__('labels.name')}}" autocomplete="off" required="" value="{{ $info->name }}">
              <!-- <div class="input-group-append">
                 <button class="btn btn-outline-primary" id="target" data-icon="{{ $info->icon->content ?? '' }}" role="iconpicker"></button>
              </div> -->
            </div>
            <!-- <input type="hidden" name="icon" id="icon" class="item-menu" value="{{ $info->icon->content ?? '' }}"> -->
            <label for="text">{{__('labels.arabic_name')}}</label>
            <div class="input-group">
              <input type="text" class="form-control item-menu" name="ar_name" id="ar_text" placeholder="{{__('labels.arabic_name')}}" autocomplete="off" required="" value="{{ $info->ar_name }}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="single-area">
        <div class="card">
          <div class="card-body">
          <h5>{{__('labels.publish')}}</h5>
            <hr>
            <div class="btn-publish">
              <button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> {{__('labels.save')}}</button>
            </div>
          </div>
        </div>
      </div>
       <div class="single-area">
        <div class="card">
          <div class="card-body">
          <h5>{{__('labels.is_featured')}}</h5>
            <hr>
            <select name="featured" class="form-control">
              <option value="1" @if($info->featured==1) selected="" @endif>{{__('labels.yes')}}</option>
              <option value="0" @if($info->featured==0) selected="" @endif>{{__('labels.no')}}</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="type" value="feature">
  </form>
@endsection

@section('script')
<script  src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script  src="{{ asset('admin/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') }}"></script>
<script  src="{{ asset('admin/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
    "use strict";
     //success response will assign here
     function success(res) {
            location.reload()
        }
    (function ($) {
      $('#target').on('change', function(e) {

        $('#icon').val(e.icon)
      });

    })(jQuery);
</script>
@endsection

