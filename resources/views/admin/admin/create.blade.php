@extends('layouts.backend.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('labels.add_admin') }}</h4>
				<form method="post" action="{{ route('admin.users.store') }}" id="basicform">
					@csrf
					<div class="pt-20">
						@php
						$arr['title']=  __('labels.name') ;
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= __('labels.enter_name') ;
						$arr['name']= 'name';
						$arr['is_required'] = true;
						echo  input($arr);

						$arr['title']= __('labels.email');
						$arr['id']= 'email';
						$arr['type']= 'email';
						$arr['placeholder']= __('labels.enter_email') ;
						$arr['name']= 'email';
						$arr['is_required'] = true;
                        echo  input($arr);

                        $arr['title']= __('labels.password');
						$arr['id']= 'password';
						$arr['type']= 'password';
						$arr['placeholder']= __('labels.enter_password');
						$arr['name']= 'password';
						$arr['is_required'] = true;
                        echo  input($arr);

                        $arr['title']= __('labels.confirm_password');
						$arr['id']= 'password_confirmation';
						$arr['type']= 'password';
						$arr['placeholder']= __('labels.confirm_password');
						$arr['name']= 'password_confirmation';
						$arr['is_required'] = true;
						echo  input($arr);
						@endphp
                        <div class="form-group">
                            <label>{{__('labels.assign_roles')}}</label>
                            <select required name="roles[]" id="roles" class="form-control select2" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
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
							<button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> {{__('labels.assign_roles')}}</button>
						</div>
					</div>
				</div>
			</div>
	</div>
</form>
@endsection
@section('script')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>

<script>
	"use strict";
	//success response will assign here
	function success(res){
		location.reload()
	}
</script>
@endsection
