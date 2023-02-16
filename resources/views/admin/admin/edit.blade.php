@extends('layouts.backend.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
			<h4>{{ __('labels.update_admin') }}</h4>
				<form method="post" action="{{ route('admin.users.update',$user->id) }}" id="basicform">
                    @csrf
                    @method('PUT')
					<div class="pt-20">
						@php
						$arr['title']= __('labels.name') ;
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= __('labels.enter_name') ;
						$arr['name']= 'name';
                        $arr['is_required'] = true;
                        $arr['value']=$user->name;
						echo  input($arr);

						$arr['title']= __('labels.email');
						$arr['id']= 'email';
						$arr['type']= 'email';
						$arr['placeholder']= __('labels.enter_email') ;
						$arr['name']= 'email';
                        $arr['is_required'] = true;
                        $arr['value']=$user->email;
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
                            <label for="roles">{{ __('labels.assign_role') }}</label>
                                <select required name="roles" id="roles" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id==$user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                        <label>{{ __('labels.status') }}</label>
                        <select name="status" class="form-control">
                            <option value="1" @if($user->status==1) selected @endif>{{ __('labels.active') }}</option>
                            <option value="0"  @if($user->status==0) selected @endif>{{ __('labels.deactive') }}</option>
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
						<button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> {{ __('labels.save') }}</button>
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
@endsection
