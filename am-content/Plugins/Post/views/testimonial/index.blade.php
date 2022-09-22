@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Testimonials'])
<div class="card">
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-8">
				<h4>{{ __('Testimonial') }}</h4>
			</div>
			<div class="col-lg-4">
				@can('testimonial.create')

				<div class="float-right ">
					<a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary float-right">{{ __('Add New') }}</a>
				</div>
				@endcan
			</div>
		</div>
		<br>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="data_search" class="form-control" placeholder="Enter Value">
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.testimonials.destroy') }}" class="basicform_with_reload">
			@csrf
			<div class="float-left">
				@can('input.delete')
				<div class="input-group">
					<select class="form-control selectric" name="method">
						<option disabled selected="">{{ __('Select Action') }}</option>
						<option value="delete" class="text-danger">{{ __('Delete Permanently') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary basicbtn" type="submit">{{ __('Submit') }}</button>
					</div>
				</div>
				@endcan
			</div>
			<div class="table-responsive custom-table">
				<table class="table">
					<thead>
						<tr>
							<th class="am-select">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll"></label>
								</div>
							</th>
							<th class="am-title"><i class="fa fa-image"></i></th>
							<th class="am-title">{{ __('Name') }}</th>
							<th class="am-title">{{ __('Ratting') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $row)
						<tr id="row{{  $row->id }}">
							<td>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $row->id }}" value="{{ $row->id }}">
									<label class="custom-control-label" for="customCheck{{ $row->id }}"></label>
								</div>
							</td>
							<td>
								<img src="{{ asset($row->slug) }}" height="50">
							</td>
							<td>
								{{ $row->name }}
								<div>
									<a href="{{ route('admin.testimonial.edit',$row->id) }}">{{ __('Edit') }}</a>
								</div>
							</td>
							<td>{{ $row->featured }} {{ __('Star') }}</td>
							<td>{{ $row->updated_at->diffForHumans() }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
@endsection
