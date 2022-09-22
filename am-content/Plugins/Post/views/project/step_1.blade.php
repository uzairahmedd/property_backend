@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add new project') }}</h4>
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form method="post" action="{{ route('admin.project.store') }}" id="basicform">
					@csrf
					<div class="pt-20">
						@php
						$arr['title']= 'Name';
						$arr['id']= 'title';
						$arr['type']= 'text';
						$arr['placeholder']= 'Enter Name';
						$arr['name']= 'name';
						$arr['is_required'] = true;

						echo  input($arr);
						@endphp

						<div class="form-group">
							<label>{{ __('Select Category') }}</label>
							<select class="form-control" name="type">
								<?php echo ConfigCategory('category') ?>
							</select>
						</div>
						<div class="form-group">
						<button class="btn btn-primary" type="submit">{{ __('Next') }}</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
