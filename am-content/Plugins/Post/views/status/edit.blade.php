@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Edit status'])
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<form method="post" action="{{ route('admin.status.update',$info->id) }}" class="basicform">
					@csrf
					@method('PUT')
					<div class="pt-20">
						@php
						$arr['title']= 'Status Name';
						$arr['id']= 'title';
						$arr['type']= 'text';
						$arr['placeholder']= 'Enter Title';
						$arr['name']= 'title';
						$arr['is_required'] = true;
						$arr['value'] = $info->name;

						echo  input($arr);
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
				<div class="card">
					<div class="card-body">
						<h5>{{ __('Is Featured') }}</h5>
						<hr>
						<select class="form-control" name="featured">
							<option value="1" @if($info->status == 1) selected="" @endif>{{ __('Yes') }}</option>
							<option value="0"  @if($info->status == 0) selected="" @endif>{{ __('No') }}</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
@endsection
