@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Package') }}</h4>
				<form method="post" action="{{ route('admin.agency-package.update',$info->id) }}" class="basicform">
					@csrf
					@method('PUT')
					<div class="custom-form pt-20">
						@php
						$arr['title']= 'Package Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Package Name';
						$arr['name']= 'title';
						$arr['value']= $info->title;
						$arr['is_required'] = true;

                        echo  input($arr);

						$arr['title']= 'Credit  Charge';
						$arr['id']= 'credits';
						$arr['type']= 'number';
						$arr['placeholder']= 'Credit  Charge';
						$arr['name']= 'credits';
						$arr['step']= 'any';
						$arr['value']= $info->count;
						$arr['is_required'] = true;

						echo input($arr);

						$arr['title']= 'Total Users Limit';
						$arr['id']= 'total_user';
						$arr['type']= 'number';
						$arr['placeholder']= '';
						$arr['name']= 'total_user';
						$arr['value']= $info->featured;
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
						<option value="1" @if($info->status==1) selected="" @endif>{{ __('Published') }}</option>
						<option value="2" @if($info->status==2) selected="" @endif>{{ __('Draft') }}</option>
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
