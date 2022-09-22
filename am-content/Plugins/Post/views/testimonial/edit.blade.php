@extends('layouts.backend.app')
@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Edit testimonial'])
<div class="row">
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">

        <form method="post" action="{{ route('admin.testimonial.update',$info->id) }}" class="basicform">
          @csrf
          @method('PUT')
          <div class="pt-20">
            <div class="form-group">
            	<label>{{ __('Customer Name') }}</label>
            	<input type="text" class="form-control" name="name" placeholder="John Doe" required value="{{ $info->name }}">
            </div>
            <div class="form-group">
            	<label>{{ __('Ratting') }}</label>

            	<select class="form-control" name="ratting">
            		<option value="5" @if($star == 5) selected @endif>{{ __('Star: 5') }}</option>
            		<option value="4" @if($star == 4) selected @endif>{{ __('Star: 4') }}</option>
            		<option value="3" @if($star == 3) selected @endif>{{ __('Star: 3') }}</option>
            		<option value="2" @if($star == 2) selected @endif>{{ __('Star: 2') }}</option>
            		<option value="1" @if($star == 1) selected @endif>{{ __('Star: 1') }}</option>
            	</select>
            </div>
             <div class="form-group">
            	<label>{{ __('Comment') }}</label>
            	<textarea class="form-control" required name="comment" max-legth="500">{{ $info->excerpt->content }}</textarea>
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
      {{ mediasection(['value'=>$info->slug,'preview'=>$info->slug]) }}
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
