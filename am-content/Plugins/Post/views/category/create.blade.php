@extends('layouts.backend.app')

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Add new category') }}</h4>
        <form method="post" action="{{ route('admin.category.store') }}" class="basicform">
          @csrf
          <div class="form-group">
            <label for="text">{{ __('Name') }}</label>
            <div class="input-group">
              <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="text">{{ __('Description') }}</label>
            <div class="input-group">
              <textarea class="form-control" name="excerpt" required="" placeholder="Short Description"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="p_id">{{ __('Parent Category') }}</label>
            <select class="custom-select mr-sm-2" name="p_id" id="p_id inlineFormCustomSelect">
              <option value="">{{ __('None') }}</option>
              <?php echo ConfigCategory('category') ?>
            </select>
          </div>
          <div class="form-group">
            <label for="text">{{ __('Credit Charge Per Post') }}</label>
            <div class="input-group">
              <input type="number" step="any" class="form-control item-menu" name="charge" id="text" placeholder="Enter charge" autocomplete="off" required="">
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
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
  "use strict";
  //success response will assign here
  function success(res){
    location.reload()
  }
</script>
@endsection

