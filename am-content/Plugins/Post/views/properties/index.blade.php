@extends('layouts.backend.app')

@section('content')
@php
$properties_list = __('labels.properties_list');
@endphp
@include('layouts.backend.partials.headersection',['title' => $properties_list])
<div class="card">
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-10">
				<div class="d-flex flex-wrap">
					<a href="{{ route('admin.property.index') }}" class="mr-2 mb-2 btn btn-outline-primary @if($type=='all') active @endif">{{__('labels.total')}} ({{ $totals }})</a>

					<a href="{{ route('admin.property.show',1) }}" class="mr-2 mb-2 btn btn-outline-success @if($type==1) active @endif">{{__('labels.published')}} ({{ $actives }})</a>

					<a href="{{ route('admin.property.show',2) }}" class="mr-2 mb-2 btn btn-outline-info @if($type==2) active @endif">{{__('labels.incomplete')}} ({{ $incomplete }})</a>
					<a href="{{ route('admin.property.show',3) }}" class="mr-2 mb-2 btn btn-outline-warning @if($type==3) active @endif">{{__('labels.pending_for_approval')}} ({{ $pendings }})</a>

					<a href="{{ route('admin.property.show',4) }}" class="mr-2 mb-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{__('labels.rejected')}} ({{ $rejected }})</a>

					<a href="{{ route('admin.property.show',0) }}" class="mr-2 mb-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{__('labels.trash')}} ({{ $trash }})</a>
				</div>
			</div>
			<!-- <div class="col-lg-2">
                <a href="{{ route('admin.property.create') }}" class="btn btn-outline-primary add-property-btn">{{__('labels.add')}}</a>
			</div> -->
		</div>
		<br>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="src" class="form-control h-100" placeholder="{{__('labels.search')}}" required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="title">{{__('labels.search_by_name')}}</option>
						<option value="email">{{__('labels.search_user_email')}}</option>
						<option value="id">{{__('labels.search_by_id')}}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.properties.destroy') }}" class="basicform">
			@csrf
			@can('Properties.edit')
			<div class="float-left">
				<div class="input-group">
					<select class="form-control selectric" name="method">
						<option disabled selected="">{{__('labels.select_action')}}</option>
						<option value="1">{{__('labels.publish_now')}}</option>
						<option value="2">{{__('labels.incomplete')}}</option>
						<option value="3">{{__('labels.pending')}}</option>
						<option value="4">{{__('labels.reject')}}</option>

						@if($type== 0 && $type != 'all')
						<option value="delete" class="text-danger">{{__('labels.delete_permanently')}}</option>
						@else
						<option value="trash">{{__('labels.move_to_trash')}}</option>
						@endif
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary basicbtn" type="submit">{{__('labels.submit')}}</button>
					</div>
				</div>

			</div>
			@endcan
			<div class="table-responsive custom-table">
				<table class="table table-striped table-hover text-center table-borderless" id="properties">
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
							<th class="am-title">{{__('labels.created_by')}}</th>
							<th class="am-title">{{__('labels.resource')}}</th>
							<th class="am-title">{{__('labels.status')}}</th>
							<th class="am-date">{{__('labels.last_update')}}</th>
							<th class="am-date">{{__('labels.action')}}</th>
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
							<td><img src="{{ asset($row->post_preview->media->url ?? 'uploads/default.png') }}" height="50" alt=""></td>
							<td>{{ $row->title }} (#{{ $row->id }})
								<div>
									<a href="{{ route('admin.property.edit',$row->id) }}">{{ __('Edit') }}</a>
									| <a href="{{route('property.detail',[$row->slug,$row->id])}}" target="_blank">{{ __('Show') }}</a>
								</div>
							</td>
							<td><a href="#">{{ $row->user->name }}</a></td>
							<td>
								@if($row->resource==1)
								<span class="badge badge-success">{{__('labels.api')}}</span>
								@else
								<span class="badge badge-primary">{{__('labels.web')}}</span>
								@endif
							</td>
							<td>
								@if($row->status==1)
								<span class="badge badge-success">{{ __('labels.publish') }}</span>
								@elseif($row->status==2)
								<span class="badge badge-warning">{{ __('labels.incomplete') }}</span>

								@elseif($row->status==0)
								<span class="badge badge-danger">{{ __('labels.trash') }}</span>

								@elseif($row->status==3)
								<span class="badge badge-warning">{{ __('labels.pending') }}</span>
								@elseif($row->status==4)
								<span class="badge badge-danger">{{ __('labels.reject') }}</span>
								@endif
							</td>
							<td>{{ $row->updated_at->diffForHumans() }}</td>
							<td>
                                <i class="fa fa-book" data-id="{{$row->id}}" onclick="property_logs(this)" data-toggle="tooltip" title="Logs"></i> /
                                <i class="fa fa-book" data-id="{{$row->id}}" onclick="admin_logs(this)" data-toggle="tooltip" title="Admin Logs"></i>
                            </td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th class="am-select">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll"></label>
								</div>
							</th>
							<th class="am-title"><i class="far fa-image"></i></th>
							<th class="am-title">{{__('labels.name')}}</th>
							<th class="am-title">{{__('labels.created_by')}}</th>
							<th class="am-title">{{__('labels.resource')}}</th>
							<th class="am-title">{{__('labels.status')}}</th>
							<th class="am-date">{{__('labels.last_update')}}</th>
							<th class="am-date">{{__('labels.action')}}</th>
						</tr>
					</tfoot>
				</table>

		</form>
        <div class="d-flex justify-content-center">
            {{ $posts->links('vendor.pagination.bootstrap') }}
        </div>
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
		location.reload();
	}

    $(document).ready(function() {
        var table = $('#properties').DataTable( {
            scrollX:        true,
            scrollCollapse: true,
            autoWidth:         true,
            tLengthChange : true,
            bLengthChange : false,
            bInfo:false,
            paging:         false,
            columnDefs: [
                { "width": "100px", "targets": [1,2,3,4,5,6,7] },
            ]
        } );
    });
</script>
@endsection
