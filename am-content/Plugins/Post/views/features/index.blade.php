@extends('layouts.backend.app')
@php
    $features_list = __('labels.features_list');
@endphp
@section('content')
@include('layouts.backend.partials.headersection',['title'=> $features_list])
<div class="card">
	<div class="card-body">
		<div class="row mb-30 d-flex">
			<div class="col-lg-6 d-flex">
				<h4>{{__('labels.features')}}</h4>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
				@can('feature.create')
				<div class="add-new-btn">
					<a href="{{ route('admin.feature.create') }}" class="btn float-right btn-primary">{{__('labels.add_new')}}</a>
				</div>
				@endcan
			</div>
		</div>
		<div class="card-action-filter mt-3">
			<form method="post" id="confirm_basicform" action="{{ route('admin.features.destroy') }}">
				@csrf
				<!-- @can('feature.delete')
				<div class="float-left">
					<div class="input-group">
						<select class="form-control selectric" name="method">
							<option value="">{{__('labels.select_action')}}</option>
							<option value="delete">{{__('labels.delete_permanently')}}</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">{{__('labels.submit')}}</button>
						</div>
					</div>
				</div>
				@endcan -->
				<div class="float-right">
					<div class="form-group">
						<input type="text" id="data_search" class="form-control" placeholder="{{__('labels.enter_value')}}">
					</div>
				</div>
		</div>
		<div class="table-responsive custom-table">
			<table class="table text-left table-striped table-hover text-center table-borderless" id="features_datatable">
				<thead>
					<tr>
						<!-- <th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th> -->
						<!-- <th class="am-title"><i class="far fa-image"></i></th> -->
						<th class="am-title">{{__('labels.title')}}</th>
						<th class="am-title">{{__('labels.arabic_title')}}</th>
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
						<!-- <td>
								<i class="{{ $post->icon->content ?? '' }}"></i>
							</td> -->
						<td>
							{{ $post->name }}
							<div class="hover">
								<a href="{{ route('admin.feature.edit',$post->id) }}">{{ __('labels.edit') }}</a>
							</div>
						</td>
						<td>
							{{ $post->ar_name }}
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
                            <i class="fa fa-book" data-id="{{$post->id}}" onclick="feature_logs(this)" data-toggle="tooltip" title="Land Block Logs"></i>
                        </td>
					</tr>
					@endforeach
				</tbody>
				</form>
				<tfoot>
					<tr>
						<!-- <th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th> -->
						<!-- <th class="am-title"><i class="far fa-image"></i></th> -->
                        <th class="am-title">{{__('labels.title')}}</th>
                        <th class="am-title">{{__('labels.arabic_title')}}</th>
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
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
	"use strict";
	//response will assign this function
	function success(res) {
		location.reload();
	}

    $(document).ready(function() {
        var table = $('#features_datatable').DataTable( {
            scrollX:        true,
            scrollCollapse: true,
            autoWidth:         false,
            tLengthChange : true,
            bLengthChange : false,
            bInfo:false,
            paging:         false,
            columnDefs: [
                { "width": "140px", "targets": [1,2,3,4] },
            ]
        } );
    });
</script>
@endsection
