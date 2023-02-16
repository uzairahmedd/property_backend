@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('labels.add_role') }}</h4>
				<form method="post" action="{{ route('admin.role.store') }}" class="basicform">
					@csrf
					<div class="pt-20">
						@php
						$arr['title']= __('labels.role_name');
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= __('labels.enter_role_name');
						$arr['name']= 'name';
						$arr['is_required'] = true;
						echo input($arr);
						@endphp
						<div class="row">
							<div class="col-sm-12">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll">{{ __('labels.permissions') }}</label>
								</div>
								<hr>
								@php $i = 1; @endphp
								@foreach ($permission_groups as $group)
								@if($group->group_name =='admin' || $group->group_name =='Agent & User' || $group->group_name =='csv' || $group->group_name =='dashboard' || $group->group_name =='Location'
								 || $group->group_name =='Real state' || $group->group_name =='role')
								<div class="row">
									<div class="col-3">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->group_name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
											<label class="form-check-label" for="checkPermission">{{ $group->group_name }}</label>
										</div>
									</div>
									<div class="col-9 role-{{ $i }}-management-checkbox">
										@php
										$permissions = App\Models\User::getpermissionsByGroupName($group->group_name);
										$j = 1;
										@endphp
										@foreach ($permissions as $permission)
										<div class="form-check">

											<input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
											<label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
										</div>
										@php $j++; @endphp
										@endforeach
										<br>
									</div>
								</div>
								@php $i++; @endphp
								@endif
								@endforeach
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="single-area">
			<div class="card">
				<div class="card-body">

					<div class="btn-publish">
						<button type="submit" class="btn btn-primary col-12 basicbtn"><i class="fa fa-save"></i> {{ __('labels.save') }}</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	@endsection
	@section('script')
	<script src="{{ asset('admin/js/form.js') }}"></script>

	<script>
		"use strict";
		//success response will assign here
		function success(res) {
			location.reload()
		}

		function checkPermissionByGroup(className, checkThis) {
			const groupIdName = $("#" + checkThis.id);
			const classCheckBox = $('.' + className + ' input');
			if (groupIdName.is(':checked')) {
				classCheckBox.prop('checked', true);
			} else {
				classCheckBox.prop('checked', false);
			}
		}
	</script>
	@endsection
