@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>$info->name])
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <h4><b>{{ $info->name }}</b> {{ __('Api credentials') }}</h4>
        <form method="post" action="{{ route('admin.payment.update',$info->id) }}" class="basicform">
          @csrf
          @method("PUT")
          <div class="pt-20">
           @if($info->name == "Paypal")
           <div class="form-group">
           	<label>{{ __('Client Id') }}</label>
           	<input type="text" required name="client_id" value="{{ $credintials->client_id ?? '' }}" class="form-control">
           </div>

           <div class="form-group">
           	<label>{{ __('Client Secret') }}</label>
           	<input type="text" required name="client_secret" value="{{ $credintials->client_secret ?? '' }}" class="form-control">
           </div>
           @endif

            @if($info->name == "stripe")
           <div class="form-group">
           	<label>{{ __('Publishable Key') }}</label>
           	<input type="text" required name="publishable_key" value="{{ $credintials->publishable_key ?? '' }}" class="form-control">
           </div>

           <div class="form-group">
           	<label>{{ __('Secret Key') }}</label>
           	<input type="text" required name="secret_key" value="{{ $credintials->secret_key ?? '' }}" class="form-control">
           </div>
           @endif

           @if($info->name == "toyyibpay")
           <div class="form-group">
           	<label>{{ __('User Secret Key') }}</label>
           	<input type="text" required name="userSecretKey" value="{{ $credintials->userSecretKey ?? '' }}" class="form-control">
           </div>

           <div class="form-group">
           	<label>{{ __('Category Code') }}</label>
           	<input type="text" required name="categoryCode" value="{{ $credintials->categoryCode ?? '' }}" class="form-control">
           </div>
           @endif

           @if($info->name == "Razorpay")
           <div class="form-group">
           	<label>{{ __('Key Id') }}</label>
           	<input type="text" required name="key_id" value="{{ $credintials->key_id ?? '' }}" class="form-control">
           </div>

           <div class="form-group">
           	<label>{{ __('Key Secret') }}</label>
           	<input type="text" required name="key_secret" value="{{ $credintials->key_secret ?? '' }}" class="form-control">
           </div>
           @endif

           @if($info->name == "Instamojo")
           <div class="form-group">
           	<label>{{ __('X-Api-Key') }}</label>
           	<input type="text" required name="x_api_Key" value="{{ $credintials->x_api_Key ?? '' }}" class="form-control">
           </div>

           <div class="form-group">
           	<label>{{ __('X-Api-Token') }}</label>
           	<input type="text" required name="x_api_token" value="{{ $credintials->x_api_token ?? '' }}" class="form-control">
           </div>
           @endif

           @if($info->name == "Mollie")
           <div class="form-group">
           	<label>{{ __('Api Key') }}</label>
           	<input type="text" required name="api_key" value="{{ $credintials->api_key ?? '' }}" class="form-control">
           </div>
           @endif
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
            <h5>{{ __('Status') }}</h5>
            <hr>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
              <option  value="1" @if($info->status == 1) selected @endif>{{ __('Enable') }}</option>
              <option value="0" @if($info->status == 0) selected @endif>{{ __('Disable') }}</option>
            </select>
          </div>
        </div>
      </div>
      {{ mediasection(['title'=>'logo','preview'=>$info->slug,'value'=>$info->slug]) }}
    </div>
  </form>
{{ mediasingle() }}
@endsection
@section('script')
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
