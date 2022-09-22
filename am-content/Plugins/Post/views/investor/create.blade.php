@extends('layouts.backend.app')

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <h4>{{ __('Add new investor') }}</h4>
        <form method="post" action="{{ route('admin.investor.store') }}" class="basicform">
          @csrf
          <div class="form-group">
            <label for="text">{{ __('Name') }}</label>
              <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="">
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
    </div>
    <input type="hidden" name="type" value="investor">
</form>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
  "use strict";
    //success response will assign here
    function success(res){
        $('.basicform').trigger('reset');
    }
</script>
@endsection

