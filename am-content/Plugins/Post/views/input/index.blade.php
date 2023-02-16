@extends('layouts.backend.app')
@php
    $input_list = __('labels.input_list');
@endphp
@section('content')
@include('layouts.backend.partials.headersection',['title'=>$input_list])
<div class="card">
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-8">
				<h4>{{__('labels.inputs')}}</h4>
			</div>
			<div class="col-lg-4">
				@can('input.create')
				<div class="float-right ">
					<a href="{{ route('admin.input.create') }}" class="btn btn-primary float-right">{{__('labels.add_new')}}</a>
				</div>
				@endcan
			</div>
		</div>
		<br>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="src" class="form-control h-100" placeholder="{{__('labels.search')}}" required="" name="src" autocomplete="off" value="{{ $src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="name">{{__('labels.search_by_name')}}</option>
						<option value="slug">{{__('labels.search_by_input_type')}}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.input.destroy') }}" id="confirm_basicform">
			@csrf
			<div class="float-left">
				<!-- @can('input.delete')
				<div class="input-group">
					<select class="form-control selectric" name="method">
						<option disabled selected="">{{__('labels.select_action')}}</option>
						<option value="delete" class="text-danger">{{__('labels.delete_permanently')}}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary basicbtn" type="submit">{{__('labels.submit')}}</button>
					</div>
				</div>
				@endcan -->
			</div>
			<div class="table-responsive custom-table">
				<table class="table table-striped table-hover text-center table-borderless">
					<thead>
						<tr>
							<th class="am-select">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll"></label>
								</div>
							</th>
							<th class="am-title"><i class="far fa-image"></i></th>
							<th class="am-title">{{__('labels.name')}}</th>
							<th class="am-title">{{__('labels.arabic_name')}}</th>
							<th class="am-title">{{__('labels.categories')}}</th>
							<!-- <th class="am-title">{{__('labels.required')}}</th> -->
							<th class="am-title">{{__('labels.is_featured')}}</th>
							<th class="am-date">{{__('labels.last_update')}}</th>
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
								<img src="{{ $row->preview->content ?? '/uploads/defaultsmall.png' }}" height="20" alt=""></img>
							</td>
							<td>
								{{ $row->name }}
								<div>
									<a href="{{ route('admin.input.edit',$row->id) }}">Edit</a>
								</div>
							</td>
							<td>
								{{ $row->ar_name }}
							</td>
							<td>
								@foreach($row->child_name as $name_type)
								<span class="badge badge-primary">{{$name_type->name}}</span>
								@endforeach
							</td>
							<!-- <td>
								@if($row->status==1)
								<span class="badge badge-success">{{ __('Yes') }}</span>
								@else
								<span class="badge badge-danger">{{ __('No') }}</span>
								@endif
							</td> -->
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

	function success(res) {
		$('input[name="ids[]"]:checked').each(function(i) {
			var ids = $(this).val();
			$('#row' + ids).remove();
		});
	}
</script>
@endsection
