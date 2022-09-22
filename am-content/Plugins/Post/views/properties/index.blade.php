@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Properties List'])
<div class="card">
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-10">
				<div class="">
					<a href="{{ route('admin.property.index') }}" class="mr-2 btn btn-outline-primary @if($type=='all') active @endif">{{ __('Total') }} ({{ $totals }})</a>

					<a href="{{ route('admin.property.show',1) }}" class="mr-2 btn btn-outline-success @if($type==1) active @endif">{{ __('Published') }} ({{ $actives }})</a>

					<a href="{{ route('admin.property.show',2) }}" class="mr-2 btn btn-outline-info @if($type==2) active @endif">{{ __('Incomplete') }} ({{ $incomplete }})</a>
					<a href="{{ route('admin.property.show',3) }}" class="mr-2 btn btn-outline-warning @if($type==3) active @endif">{{ __('Pending For Approval') }} ({{ $pendings }})</a>

					<a href="{{ route('admin.property.show',4) }}" class="mr-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{ __('Rejected') }} ({{ $rejected }})</a>

					<a href="{{ route('admin.property.show',0) }}" class="mr-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{ __('Trash') }} ({{ $trash }})</a>
				</div>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
		<br>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="title">{{ __('Search By Name') }}</option>
						<option value="email">{{ __('Search User Email') }}</option>
						<option value="id">{{ __('Search By Id') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.properties.destroy') }}" class="basicform">
			@csrf
			<div class="float-left">

				@can('Properties.delete')
				<div class="input-group">
					<select class="form-control selectric" name="method">
						<option disabled selected="">{{ __('Select Action') }}</option>
						<option value="1">{{ __('Publish Now') }}</option>
						<option value="2">{{ __('Incomplete') }}</option>
						<option value="3">{{ __('Pending') }}</option>
						<option value="4">{{ __('Reject') }}</option>

						@if($type== 0 && $type != 'all')
						<option value="delete" class="text-danger">{{ __('Delete Permanently') }}</option>
						@else
						<option value="trash">{{ __('Move To Trash') }}</option>
						@endif
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
							<th class="am-title"><i class="far fa-image"></i></th>
							<th class="am-title">{{ __('Name') }}</th>
							<th class="am-title">{{ __('Created By') }}</th>
							<th class="am-title">{{ __('Status') }}</th>
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
							<td><img src="{{ asset($row->post_preview->media->url ?? 'uploads/default.png') }}" height="50" alt=""></td>
							<td>{{ $row->title }} (#{{ $row->id }})
								<div>
									<a href="{{ route('admin.property.edit',$row->id) }}">{{ __('Edit') }}</a> | <a href="{{ url('/property',$row->slug) }}">{{ __('Show') }}</a>
								</div>
							</td>
							<td><a href="{{ route('admin.users.edit',$row->user->id) }}">{{ $row->user->name }}</a></td>
							<td>
								@if($row->status==1)
								<span class="badge badge-success">{{ __('Published') }}</span>
								@elseif($row->status==2)
								<span class="badge badge-warning">{{ __('Incomplete') }}</span>

								@elseif($row->status==0)
								<span class="badge badge-danger">{{ __('Trash') }}</span>

								@elseif($row->status==3)
								<span class="badge badge-warning">{{ __('Pending') }}</span>
								@elseif($row->status==4)
								<span class="badge badge-danger">{{ __('Rejected') }}</span>
								@endif
							</td>
							<td>{{ $row->updated_at->diffForHumans() }}</td>
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
							<th class="am-title">{{ __('Name') }}</th>
							<th class="am-title">{{ __('Created By') }}</th>
							<th class="am-title">{{ __('Status') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</tfoot>
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
