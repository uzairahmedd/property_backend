@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Customer') }}</h4>
				<form method="post" action="{{ route('admin.customer.update',$customer->id) }}" class="basicform">
                    @csrf
                    @method('PUT')
					<div class="custom-form pt-20">
						@php
						$arr['title']= 'Customer Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Customer Name';
						$arr['name']= 'name';
						$arr['value']= $customer->name;
						$arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= 'Customer Email';
						$arr['id']= 'email';
						$arr['type']= 'email';
						$arr['placeholder']= 'Customer Email';
						$arr['name']= 'email';
						$arr['value']= $customer->email;
						$arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= 'Identification number';
						$arr['id']= 'id_no';
						$arr['type']= 'text';
						$arr['placeholder']= 'Identification number';
						$arr['name']= 'nid';
						$arr['min_input']= 12;
						$arr['is_required'] = false;
						$arr['value'] = $customer->nid->content ?? '';

                        echo  input($arr);
                        @endphp
                        <div class="form-group">
                        	<label for="customer_id">{{ __('Customer ID') }}</label>
                        	<input type="text" placeholder="Customer ID" name="customer_id" class="form-control" id="customer_id" required="" value="{{ $customer->customer_id->content ?? '' }}" autocomplete="off" maxlength="">
                        </div>
                        <div class="form-group">
                        	<label for="phone">{{ __('Customer Phone') }}</label>
                        	<input type="text" placeholder="60123456789" name="phone" class="form-control" id="phone" required="" value="{{ $customer->phone->content ?? '' }}" autocomplete="off" maxlength="">
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Customer Password') }}</label>
                            <input class="form-control" type="text" name="password" id="password">
                        </div>
                        @php

                        $arr['title']= 'Customer Address';
						$arr['id']= 'address';
						$arr['type']= 'textarea';
						$arr['placeholder']= 'Customer Address';
                        $arr['name']= 'address';
                        $arr['value'] = $customer->address->content ?? '';
						$arr['is_required'] = true;

                        echo  textarea($arr);

                        @endphp

                        <div class="form-group">
                            <label for="level">{{ __('Select Level') }}</label>
                            <select class="custom-select mr-sm-2" id="level" name="level_id">
                                @foreach($levels as $level)
                                <option {{ $level->id == $customer->level_id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->name }}</option>
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
							<button type="submit" class="btn btn-primary col-12 basicbtn"><i class="fa fa-save"></i> {{ __('Save') }}</button>
						</div>
					</div>
				</div>
			</div>
			<div class="single-area">
				<div class="card sub">
				<div class="card-body">
						<h5>{{ __('Status') }}</h5>
					<hr>
					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
							<option value="1" @if($customer->status==1) selected="" @endif>{{ __('Active') }}</option>
							<option value="2" @if($customer->status==2) selected="" @endif>{{ __('Pending') }}</option>
							<option value="0" @if($customer->status==0) selected="" @endif>{{ __('Deactive') }}</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>

@endsection
