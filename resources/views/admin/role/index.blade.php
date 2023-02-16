@extends('layouts.backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{ __('labels.roles') }}</h4>
			</div>
			<div class="col-lg-6">
				<div class="add-new-btn">
					<a href="{{ route('admin.role.create') }}" class="btn btn-primary float-right">{{ __('labels.add_new') }}</a>
				</div>
			</div>
		</div>
		<br>
		<div class="card-action-filter">
			<form method="post" id="confirm_basicform" action="{{ route('admin.roles.destroy') }}">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<div class="d-flex">
							<div class="single-filter">
								<div class="form-group">
									<select class="form-control selectric" name="status">
										<option value="publish">{{ __('labels.select_action') }}</option>
										<option value="delete">{{ __('labels.delete_permanently') }}</option>
									</select>
								</div>
							</div>
							<div class="single-filter">
								<button type="submit" class="btn btn-primary btn-lg ml-2">{{ __('labels.apply') }}</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<!-- Button trigger modal -->
						<button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#permission_modal">
                            {{ __('labels.add_new_permission') }}
						</button>
					</div>
				</div>
		</div>
		<div class="table-responsive custom-table">
			<table class="table table-striped table-hover text-center table-borderless">
				<thead>
					<tr>
						<th class="am-select" width="10%">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
								<label class="custom-control-label checkAll" for="selectAll"></label>
							</div>
						</th>
						<th width="10%">{{ __('labels.name') }}</th>
						<th width="80%">{{ __('labels.permissions') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($roles as $page)
					<tr>
						<th>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $page->id }}" value="{{ $page->id }}">
								<label class="custom-control-label" for="customCheck{{ $page->id }}"></label>
							</div>
						</th>
						<td>
							{{ $page->name }}
							<div class="hover">
								<a href="{{ route('admin.role.edit',$page->id) }}">{{ __('Edit') }}</a>
							</div>
						</td>
						<td>
							@foreach ($page->permissions as $perm)
							@if($perm->group_name =='admin' || $perm->group_name =='Agent & User' || $perm->group_name =='csv' || $perm->group_name =='dashboard' || $perm->group_name =='Location'
								 || $perm->group_name =='Real state' || $perm->group_name =='role')
							<span class="badge badge-primary mr-1 mb-2">
								{{ $perm->name }}
							</span>
							@endif
							@endforeach
						</td>
					</tr>
					@endforeach
				</tbody>
				</form>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="permission_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">{{ __('labels.add_new_permission') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ route('admin.permission.store') }}" class="basicform">
					@csrf
					<div class="pt-20">
						<div class="form-group">
							<label for="name">{{ __('labels.name') }} *</label>
							<input type="text" placeholder="{{ __('labels.enter_name') }}" name="name" class="form-control" id="name"  value="" autocomplete="off" minlength="" maxlength="">
						</div>
						<div class="form-group">
							<label for="email">{{ __('labels.group_name') }} *</label>
							<input type="text" placeholder="{{ __('labels.enter_group_name') }}" name="group_name" class="form-control" id="group_name"  value="" autocomplete="off" minlength="" maxlength="" >
						</div>
						<div class="form-group">
						<div class="btn-publish d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('labels.close') }}</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ __('labels.save') }}</button>
                    </div>
						</div>
					</div>
				</form>
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
</script>
@endsection
