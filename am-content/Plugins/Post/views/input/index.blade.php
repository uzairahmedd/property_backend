@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Input List'])
<div class="card">
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-8">
				<h4>{{ __('Inputs') }}</h4>
			</div>
			<div class="col-lg-4">
				@can('input.create')
				<div class="float-right ">
					<a href="{{ route('admin.input.create') }}" class="btn btn-primary float-right">{{ __('Add New') }}</a>
				</div>
				@endcan
			</div>
		</div>
		<br>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text"  id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="name">{{ __('Search By Name') }}</option>
						<option value="slug">{{ __('Search By Input Type') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.projects.destroy') }}" class="basicform">
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
							<th class="am-title">{{ __('Name') }}</th>
							<th class="am-title">{{ __('Input Type') }}</th>
							<th class="am-title">{{ __('Is Required') }}</th>
							<th class="am-title">{{ __('Is Featured') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $row)
						<tr id="row{{  $row->id }}">
							<td>
								@if($row->id != 18 && $row->id != 17 && $row->id != 16 && $row->id != 15)
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $row->id }}" value="{{ $row->id }}">
									<label class="custom-control-label" for="customCheck{{ $row->id }}"></label>
								</div>
								@endif
							</td>
							<td>
								{{ $row->name }}
								<div>
									<a href="{{ route('admin.input.edit',$row->id) }}">Edit</a>
								</div>
							</td>
							<td>
								{{ $row->slug }}
							</td>
							<td>
								@if($row->status==1)
								<span class="badge badge-success">{{ __('Yes') }}</span>
								@else
								<span class="badge badge-danger">{{ __('No') }}</span>
								@endif
							</td>
							<td>
								@if($row->featured==1)
								<span class="badge badge-success">{{ __('Yes') }}</span>
								@else
								<span class="badge badge-danger">{{ __('No') }}</span>
								@endif
							</td>
							<td>{{ $row->updated_at->diffForHumans() }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</form>
			{{ $posts->links('vendor.pagination.bootstrap') }}
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
	"use strict";
	function success(res){
		$('input[name="ids[]"]:checked').each(function(i){
			var ids = $(this).val();
			$('#row'+ids).remove();
		});
	}
</script>
@endsection
