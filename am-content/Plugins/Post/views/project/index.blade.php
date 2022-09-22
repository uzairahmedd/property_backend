@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Project List'])
<div class="card">
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-8">
				<div class="">
					<a href="{{ route('admin.project.index') }}" class="mr-2 btn btn-outline-primary @if($type=='all') active @endif">{{ __('Total') }} ({{ $totals }})</a>
					<a href="{{ route('admin.projects',1) }}" class="mr-2 btn btn-outline-success @if($type==1) active @endif">{{ __('Published') }} ({{ $actives }})</a>
					<a href="{{ route('admin.projects',2) }}" class="mr-2 btn btn-outline-warning @if($type==2) active @endif">{{ __('Incomplete') }} ({{ $incomplete }})</a>
					<a href="{{ route('admin.projects',0) }}" class="mr-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{ __('Trash') }} ({{ $trash }})</a>
				</div>
			</div>
			<div class="col-lg-4">
				@can('project.create')
				<div class="float-right ">
					<a href="{{ route('admin.project.create') }}" class="btn btn-primary float-right">{{ __('Add New') }}</a>
				</div>
				@endcan
			</div>
		</div>
		<br>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="title">{{ __('Search By Name') }}</option>
						<option value="id">{{ __('Search By Id') }}</option>
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
				@can('project.delete')
				<div class="input-group">
					<select class="form-control selectric" name="method">
						<option disabled selected="">{{ __('Select Action') }}</option>
						<option value="1">{{ __('Publish Now') }}</option>
						<option value="2">{{ __('Incomplete') }}</option>

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

							<th class="am-title">{{ __('Connections') }}</th>
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
									<a href="{{ route('admin.project.edit',$row->id) }}">{{ __('Edit') }}</a> | <a href="{{ url('/project',$row->slug) }}">{{ __('Show') }}</a>
								</div>
							</td>
							<td>{{ $row->connection_count }}</td>
							<td><a href="{{ route('admin.users.edit',$row->user->id) }}">{{ $row->user->name }}</a></td>
							<td>
								@if($row->status==1)
								<span class="badge badge-success">{{ __('Active') }}</span>
								@elseif($row->status==2)
								<span class="badge badge-warning">{{ __('Incomplete') }}</span>

								@elseif($row->status==0)
								<span class="badge badge-danger">{{ __('Trash') }}</span>
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
							<th class="am-title">{{ __('Connections') }}</th>
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
