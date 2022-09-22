@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Currency') }}</h4>
				<form method="POST" action="{{ route('admin.currency.update',$info->id) }}" class="basicform">
					@csrf
					@method('PUT')
					<div class="custom-form pt-20">
						@php
						$arr['title']= 'Currency Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Currency Name';
						$arr['name']= 'title';
						$arr['value'] = $info->name;
						$arr['is_required'] = true;

						echo input($arr);

						$arr['title']= 'Currency Symbol';
						$arr['id']= 'symbol';
						$arr['type']= 'text';
						$arr['placeholder']= 'Currency Symbol';
						$arr['name']= 'symbol';
						$arr['value'] = $info->slug;
						$arr['is_required'] = true;

						echo input($arr);

						$arr['title']= 'Currency Price';
						$arr['id']= 'price';
						$arr['type']= 'number';
						$arr['step']= 'any';
						$arr['placeholder']= 'Currency Price';
						$arr['name']= 'price';
						$arr['value'] = $info->featured;
						$arr['is_required'] = true;

						echo input($arr);
						@endphp
						<div class="form-group">
							<label>{{ __('Position of symbol') }}</label>
							<select class="form-control" name="position">
								<option value="left"  @if($info->position->content=='left') selected="" @endif>{{ __('Before number') }}</option>
								<option value="right" @if($info->position->content=='right') selected="" @endif>{{ __('After number') }}</option>
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
						<option  value="1" @if($info->status==1) selected="" @endif>{{ __('Yes') }}</option>
						<option value="0"  @if($info->status==0) selected="" @endif>{{ __('No') }}</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
@endsection
