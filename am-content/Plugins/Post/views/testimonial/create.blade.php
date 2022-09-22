@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Add new testimonial'])
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <form method="post" action="{{ route('admin.testimonial.store') }}" class="basicform_with_reset">
          @csrf
          <div class="pt-20">
            <div class="form-group">
            	<label>{{ __('Customer Name') }}</label>
            	<input type="text" class="form-control" name="name" placeholder="John Doe" required>
            </div>
            <div class="form-group">
            	<label>{{ __('Ratting') }}</label>
            	<select class="form-control" name="ratting">
            		<option value="5">{{ __('Star: 5') }}</option>
            		<option value="4">{{ __('Star: 4') }}</option>
            		<option value="3">{{ __('Star: 3') }}</option>
            		<option value="2">{{ __('Star: 2') }}</option>
            		<option value="1">{{ __('Star: 1') }}</option>
            	</select>
            </div>
             <div class="form-group">
            	<label>{{ __('Comment') }}</label>
            	<textarea class="form-control" required name="comment" max-legth="500"></textarea>
            </div>
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
      {{ mediasection() }}
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
