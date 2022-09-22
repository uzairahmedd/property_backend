@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}"/>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Edit') }}</h4>
        <form method="post" action="{{ route('admin.feature.update',$info->id) }}" id="basicform">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="text">{{ __('Name') }}</label>
            <div class="input-group">
              <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="" value="{{ $info->name }}">
              <div class="input-group-append">
                 <button class="btn btn-outline-primary" id="target" data-icon="{{ $info->icon->content ?? '' }}" role="iconpicker"></button>
              </div>
            </div>
            <input type="hidden" name="icon" id="icon" class="item-menu" value="{{ $info->icon->content ?? '' }}">
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
              <button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> {{ __('Save') }}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="type" value="facilities">
  </form>
@endsection

@section('script')
  <script  src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
  <script  src="{{ asset('admin/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') }}"></script>
  <script  src="{{ asset('admin/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>
  <script src="{{ asset('admin/js/form.js') }}"></script>
  <script>
    "use strict";
    (function ($) {
      $('#target').on('change', function(e) {

        $('#icon').val(e.icon)
      });

    })(jQuery);
</script>
@endsection

