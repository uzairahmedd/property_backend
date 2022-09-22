@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/assets/css/selectric.css') }}">
@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h5>{{ __('Create New Language') }}</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.lang.store') }}" method="POST" id="basicform">
			@csrf
			<div class="form-group">
				<label>{{ __('Select Language') }}</label>
				<select name="language_code" class="form-control selectric">
					@foreach($countries as $row)
					<option value="{{ $row['code'] }}">{{ $row['name'] }}  -- {{ $row['nativeName'] }} -- ( {{ $row['code'] }})</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>{{ __('Select Theme') }}</label>
				<select name="theme_name" class="form-control selectric">
					@foreach ($themes as $theme)
					<option value="{{ $theme['Text Domain'] }}">{{ $theme['Theme Name'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>{{ __('Select Position') }}</label>
				<select name="theme_position" class="form-control selectric">
					<option value="LTR">{{ __('LTR') }}</option>
					<option value="RTL">{{ __('RTL') }}</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary btn-lg">{{ __('Submit') }}</button>
		</form>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.selectric.min.js') }}"></script>
<script>
	"use strict";
	//success response will assign this function
	function success(res){
		window.history.pushState('', '', '{{ route('admin.language.index') }}');
		location.reload();
	}
	function errosresponse(xhr){

		$("#errors").html("<li class='text-danger'>"+xhr.responseJSON[0]+"</li>")
	}
</script>
@endsection


