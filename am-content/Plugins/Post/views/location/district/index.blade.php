@extends('layouts.backend.app')

@section('content')
@php
$district = __('labels.district');
@endphp
@include('layouts.backend.partials.headersection',['title'=>$district])
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6 d-flex">
				<h4>{{__('labels.district')}}</h4>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				@can('district.create')
				<div class="add-new-btn">
					<a href="{{ route('admin.district.create') }}" class="btn float-right btn-primary">{{__('labels.add_new')}}</a>
				</div>
				@endcan
			</div>
		</div>
		<div class="card-action-filter mt-3">
			<div class="float-right">
				<div class="form-group">
					<input type="text" id="data_search" class="form-control" placeholder="{{__('labels.enter_value')}}">
				</div>
			</div>
			<form method="post" id="confirm_basicform" action="{{ route('admin.district.destroy') }}">
				@csrf
				<!-- @can('district.delete')
				<div class="float-left">
					<div class="input-group">
						<select class="form-control selectric" name="method">
							<option value="">{{ __('labels.select_action') }}</option>
							<option value="delete">{{ __('labels.delete_permanently') }}</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">{{ __('labels.submit') }}</button>
						</div>
					</div>
				</div>
				@endcan -->
		</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover text-center table-borderless" id="districts_datatable">
				<thead>
					<tr>
						<!-- <th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th> -->

						<th class="am-title">{{__('labels.title')}}</th>
						<th class="am-title">{{__('labels.arabic_title')}}</th>
						<th class="am-title">{{__('labels.city')}}</th>
						<th class="am-title">{{__('labels.featured')}}</th>
						<th class="am-date">{{__('labels.date')}}</th>
						<th class="am-date">{{__('labels.action')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<!-- <th>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $post->id }}" value="{{ $post->id }}">
								<label class="custom-control-label" for="customCheck{{ $post->id }}"></label>
							</div>
						</th> -->

						<td>
							{{ $post->name }}
							<div class="hover">
								<a href="{{ route('admin.location.edit',$post->id) }}">{{ __('labels.edit') }}</a>
							</div>
						</td>
						<td>
							{{ $post->ar_name }}
						</td>
						<td>
							{{ Session::get('locale') == 'ar' ? $post->arabic_name : $post->city_name }}
						</td>
						<td>
							@if($post->featured==1)
							<span class="badge badge-success">{{ __('labels.yes') }}</span>
							@else
							<span class="badge badge-danger">{{ __('labels.no') }}</span>
							@endif
						</td>

						<td>{{ __('Last Modified') }}
							<div class="date">
								{{ $post->updated_at->diffForHumans() }}
							</div>
						</td>
						<td>
							<i class="fa fa-book" data-id="{{$post->id}}" onclick="district_logs(this)" data-toggle="tooltip" title="District Logs"></i>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<!-- <th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th> -->

						<th class="am-title">{{__('labels.title')}}</th>
						<th class="am-title">{{__('labels.arabic_title')}}</th>
						<th class="am-title">{{__('labels.city')}}</th>
						<th class="am-title">{{__('labels.featured')}}</th>
						<th class="am-date">{{__('labels.date')}}</th>
						<th class="am-date">{{__('labels.action')}}</th>
					</tr>
				</tfoot>
			</table>
			<div class="d-flex justify-content-center">
				{{ $posts->links('vendor.pagination.bootstrap') }}
			</div>
		</div>
		</form>
	</div>
</div>
</div>
</div>
<div class="modal fade" id="property_logs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">{{__('labels.Property_Logs')}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('labels.close')}}</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')

<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
	"use strict";
	//response will assign this function
	function success(res) {
		location.reload();
	}

	$(document).ready(function() {
		var table = $('#districts_datatable').DataTable({
			scrollX: false,
			scrollCollapse: false,
			autoWidth: true,
			tLengthChange: true,
			bLengthChange: false,
			bInfo: false,
			paging: false,
		});
	});
</script>
@endsection