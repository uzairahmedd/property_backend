@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add new Package') }}</h4>
				<form method="post" action="{{ route('admin.plan.store') }}" id="basicform">
					@csrf
					<div class="custom-form pt-20">
						@php
						$arr['title']= 'Package Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Package Name';
						$arr['name']= 'title';
						$arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= 'Package Price';
						$arr['id']= 'price';
						$arr['type']= 'number';
						$arr['placeholder']= 'Package Price';
						$arr['name']= 'price';
						$arr['step']= 'any';
						$arr['is_required'] = true;

						echo input($arr);

						$arr['title']= 'Number Of Credits';
						$arr['id']= 'total';
						$arr['type']= 'number';
						$arr['placeholder']= '';
						$arr['name']= 'total';
						$arr['is_required'] = true;

						echo input($arr);

						@endphp
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
			<div class="single-area">
				<div class="card sub">
				<div class="card-body">
						<h5>{{ __('Status') }}</h5>
					<hr>
					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
						<option selected value="1">{{ __('Published') }}</option>
						<option value="2">{{ __('Draft') }}</option>
					</select>
				</div>
			</div>
		</div>
	</div>
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
