@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" href="{{ asset('admin/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
@endsection

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Add new category') }}</h4>
        <form method="post" action="{{ route('admin.category.store') }}" class="basicform">
          @csrf
          <div class="input-group">
              <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="">
              <div class="input-group-append">
                 <button class="btn btn-outline-primary" id="target" data-icon="fas fa-home" role="iconpicker"></button>
              </div>
            </div>
            <input type="hidden" name="icon" id="icon" class="item-menu">
          <!-- <div class="form-group">
            <label for="text">{{ __('Name') }}</label>
            <div class="input-group">
              <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="">
            </div>
          </div> -->
          <div class="form-group">
            <label for="p_id">{{ __('Parent Category') }}</label>
            <select multiple="" class="form-control select2" name="child[]" >
              <option value="">{{ __('None') }}</option>
              <option value="71">Commercial</option> <!--64 in seeder-->
              <option value="72">Residential</option> <!--65 in seeder-->
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
            <option  value="1">{{ __('Yes') }}</option>
            <option value="0" selected>{{ __('No') }}</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="type" value="category">
</form>
@endsection

@section('script')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
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
  //success response will assign here
  function success(res){
    location.reload()
  }
</script>
@endsection

