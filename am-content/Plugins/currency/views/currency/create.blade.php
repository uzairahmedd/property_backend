@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add new Currency') }}</h4>
				<form method="post" action="{{ route('admin.currency.store') }}" class="basicform">
					@csrf
					<div class="custom-form pt-20">
						@php
						$arr['title']= 'Currency Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Currency Name';
						$arr['name']= 'title';
						$arr['is_required'] = true;

						echo input($arr);

						$arr['title']= 'Currency Symbol';
						$arr['id']= 'symbol';
						$arr['type']= 'text';
						$arr['placeholder']= 'Currency Symbol';
						$arr['name']= 'symbol';
						$arr['is_required'] = true;

						echo input($arr);

						$arr['title']= 'Exchange rate';
						$arr['id']= 'price';
						$arr['type']= 'number';
						$arr['step']= 'any';
						$arr['placeholder']= '';
						$arr['name']= 'price';
						$arr['is_required'] = true;

						echo input($arr);
						@endphp

						<div class="form-group">
							<label>{{ __('Position of symbol') }}</label>
							<select class="form-control" name="position">
								<option value="left" >{{ __('Before number') }}</option>
								<option value="right">{{ __('After number') }}</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{ publish(['class'=>'basicbtn']) }}
		<div class="single-area">
			<div class="card sub">
				<div class="card-body">
					<h5>{{ __('Is Default') }}</h5>
					<hr>
					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="is_default">
						<option  value="1">{{ __('Yes') }}</option>
						<option value="0">{{ __('No') }}</option>
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
		$('.basicform').trigger('reset')
	}
</script>
@endsection
