@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add new property') }}</h4>
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form method="post" action="{{ route('admin.property.store') }}">
					@csrf
					<div class="pt-20">
						@php
						$arr['title']= 'Name';
						$arr['id']= 'title';
						$arr['type']= 'text';
						$arr['placeholder']= 'Enter Name';
						$arr['name']= 'title';
						$arr['is_required'] = true;

						echo  input($arr);

						$arr1['title']= 'Creator Email';
						$arr1['id']= 'email';
						$arr1['type']= 'email';
						$arr1['placeholder']= 'Enter Name';
						$arr1['name']= 'email';
						$arr1['is_required'] = true;

						echo  input($arr1);
						@endphp

						<div class="form-group">
							<label>{{ __('Select Category') }}</label>
							<select class="form-control" name="type">
								<?php echo ConfigCategory('category') ?>
							</select>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Min Price</label>
									<input type="number" step="any" name="min_price" class="form-control" required="" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Max Price</label>
									<input type="number" step="any" name="max_price" class="form-control" required="" >
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary submitbtn"  disabled="" type="submit">Next</button>
						</div>
					</div>
				</div>
			</div>

		</div>
	<input type="hidden" name="user_id" id="user_id">
</form>

<form method="post" action="{{ route('admin.properties.findUser') }}" id="basicform3">
	@csrf
	<input type="hidden" name="email" id="user_mail">
</form>
@endsection

@section('script')
	<script src="{{ asset('admin/js/form.js') }}"></script>
	<script type="text/javascript">
		"use strict";

		$('#email').on('focusout',()=>{
			$('#user_mail').val($('#email').val());
			$('#basicform3').submit();
		});

		function success3(res){
			$('#user_id').val(res.id);
			$('.submitbtn').removeAttr('disabled');
		}
	</script>
@endsection

