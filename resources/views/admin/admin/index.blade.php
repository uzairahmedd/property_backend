@extends('layouts.backend.app')

@section('content')
<div class="card"  >
	<div class="card-body">
		<div class="row mb-30 d-flex">
			<div class="col-lg-6 d-flex">
				<h4>{{ __('labels.admins') }}</h4>
			</div>
			<div class="col-lg-6 d-flex justify-content-end">
                @can('admin.create')
				<div class="add-new-btn">
					<a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">{{ __('labels.add_new') }}</a>
                </div>
                @endcan
			</div>
		</div>
		<br>
		<div class="card-action-filter">
			<form method="post" id="basicform" action="{{ route('admin.users.destroy') }}">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<div class="d-flex">
							<div class="single-filter">
								<div class="form-group">
									<select class="form-control selectric" name="status">
                                        <option disabled selected>{{ __('labels.select_action') }}</option>
										<option value="1">{{ __('labels.active') }}</option>
										<option value="0">{{ __('labels.deactivate') }}</option>
									</select>
								</div>
                            </div>
                            @can('admin.edit')
							<div class="single-filter">
								<button type="submit" class="btn btn-primary btn-lg ml-2">{{ __('labels.apply') }}</button>
                            </div>
                            @endcan
						</div>
					</div>
					<div class="col-lg-6">

					</div>
				</div>
			</div>
			<div class="table-responsive custom-table">
				<table class="table" id="admin_datatable">
					<thead>
						<tr>
							<th>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll"></label>
								</div>
							</th>
                            <th>{{ __('labels.name') }}</th>
                            <th>{{ __('labels.email') }}</th>
                            <th>{{ __('labels.status') }}</th>
                            <!-- <th class="am-title">{{ __('Last Activity') }}</th>
                            <th class="am-title">{{ __('labels.last_login_ip') }}</th> -->
                            <th>{{ __('labels.role') }}</th>
                            <th>{{ __('labels.action') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $row)
						<tr>
							<td>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $row->id }}" value="{{ $row->id }}">
									<label class="custom-control-label" for="customCheck{{ $row->id }}"></label>
								</div>
							</td>
							<td>
                                {{ $row->name }}
                                @can('admin.edit')
								<div class="hover">
									<a href="{{ route('admin.users.edit',$row->id) }}">{{ __('labels.edit') }}</a>
                                </div>
                                @endcan
                            </td>
                            <td>
                               {{ $row->email }}
                            </td>
                            <td>
                            @if($row->status==1)
                            <span class="badge badge-success">{{ __('labels.active') }}</span>
                            @else
                            <span class="badge badge-danger">{{ __('labels.deactive') }}</span>
                            @endif
                            </td>
                             <!-- <td>@if(!empty($row->user_session)) {{ date('Y-m-d H:i:s', $row->user_session->last_activity) }} @endif</td>
                            <td>@if(!empty($row->user_session)) {{  $row->user_session->ip_address }} @endif</td> -->
                           <td>
                        	@foreach($row->roles as $r) <span class="badge badge-primary">{{ $r->name }}</span> @endforeach
                        </td>
                            <td>
                                <i class="fa fa-book" data-id="{{$row->id}}" onclick="adminPermission_logs(this)" data-toggle="tooltip" title="Admin Logs"></i>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</form>
			</table>
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
	function success(res){
		location.reload();
	}

    $(document).ready(function() {
        var table = $('#admin_datatable').DataTable( {
            scrollX:        false,
            scrollCollapse: false,
            autoWidth:         true,
            tLengthChange : true,
            bLengthChange : false,
            bInfo:false,
            paging:         true,
            columnDefs: [
            ]
        } );
    });
</script>
@endsection
