@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" href="{{ asset('admin/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}" />
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
            <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" id="target" data-icon="fas fa-home" role="iconpicker"></button>
            </div>
          </div>
          <input type="hidden" name="icon" id="icon" class="item-menu">
          <div class="form-group" style="margin-top: 20px;">
            <input type="text" class="form-control item-menu" name="ar_name" id="ar_text" placeholder="Enter Arabic Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="p_id">{{ __('Parent Category') }}</label>
            <select multiple="" class="form-control select2" name="child[]">
              <option value="">{{ __('None') }}</option>
              <option value="71">Commercial</option>
              <!--64 in seeder-->
              <option value="72">Residential</option>
              <!--65 in seeder-->
            </select>
          </div>
          <div class="row">
            <div class="col-6 item form-group">
              <input type="checkbox" name="land_area" value="1" id="land_area">
              <label for="land_area">land area</label>
            </div>
            <div class="col-6 item form-group">
              <input type="checkbox" name="buildup_area" value="1" id="buildup_area">
              <label for="buildup_area">Build-up area</label>
            </div>
          </div>
          <div class="row">
            <div class="col-6 item form-group">
              <input type="checkbox" name="property_age" value="1" id="property_age">
              <label for="buildup_area">Property age</label>
            </div>
            <div class="col-6 item form-group">
              <input type="checkbox" name="features_section" value="1" id="features_section">
              <label for="buildup_area">Faatures section</label>
            </div>
          </div>
          <div class="row">
            <div class="col-6 item form-group">
              <input type="checkbox" name="furnishing_section" value="1" id="furnishing_section">
              <label for="buildup_area">furnishing section</label>
            </div>
            <div class="col-6 item form-group">
              <input type="checkbox" name="total_floor" value="1" id="total_floor">
              <!-- <input type="hidden" name="required" id="required_field" value=""> -->
              <label for="buildup_area">Total floors <span id="reuiqred_text"></span></label>
            </div>
          </div>
          <div class="row">
            <div class="col-6 item form-group">
              <input type="checkbox" name="property_floor" value="1" id="property_floor">
              <label for="buildup_area">Property floor</label>
            </div>
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
          <option value="1">{{ __('Yes') }}</option>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
  "use strict";
  (function($) {
    $('#target').on('change', function(e) {

      $('#icon').val(e.icon)
    });

  })(jQuery);

  function errosresponse(xhr) {

    $('.alert-success').hide();
    $('.alert-danger').show();
    $("#errors").html("<li class='text-danger'>" + xhr.responseJSON.errors.url + "</li>")
  }
  //success response will assign here
  function success(res) {
    location.reload()
  }
  // jQuery(document).ready(function() {
  //   $('#total_floor').change(function() {

  //     Swal.fire({
  //       title: 'Do you want to make it require?',
  //       html: '<form><input type="checkbox">If yes then click this checkbox</form>',
  //       text: "You want to delete this!",
  //       showCancelButton: true,
  //       confirmButtonColor: '#094193',
  //       cancelButtonColor: '#d33',
  //       confirmButtonText: 'Yes, required!',
  //       showLoaderOnConfirm: true,
  //     }).then((result) => {
  //       if (result.isConfirmed) {
  //         if (result.value) {
  //           Swal.fire({
  //             icon: 'success',
  //             text: 'Total floors is required',
  //           });
  //           console.log('1');
  //           $('#reuiqred_text').text('(Required)');
  //           $('#required_field').val('1');
  //         } else {
  //           Swal.fire({
  //             icon: 'error',
  //             text: "Total floors is not required"
  //           });
  //           console.log('ds');
  //           $('#reuiqred_text').text('(not Required)');
  //           $('#required_field').val('0');
  //         }
  //       } else {
  //         console.log(`modal was dismissed by ${result.dismiss}`);
  //         $('#reuiqred_text').text('(not Required)');
  //         $('#required_field').val('0');
  //       }
  //     })


  //   });

  // });
</script>
@endsection