@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add new Customer') }}</h4>
				<form method="post" action="{{ route('admin.customer.store') }}" id="basicform">
					@csrf
					<div class="custom-form pt-20">
						@php
						$arr['title']= 'Customer Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Customer Name';
						$arr['name']= 'name';
						$arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= 'Customer Email';
						$arr['id']= 'email';
						$arr['type']= 'email';
						$arr['placeholder']= 'Customer Email';
						$arr['name']= 'email';
						$arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= 'Customer Phone';
						$arr['id']= 'phone';
						$arr['type']= 'text';
						$arr['placeholder']= ' 60123456789';
						$arr['name']= 'phone';
						$arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= 'Customer Password';
						$arr['id']= 'password';
						$arr['type']= 'text';
						$arr['placeholder']= 'Customer Password';
						$arr['name']= 'password';
						$arr['is_requied'] = true;

                        echo  input($arr);

                        $arr['title']= 'Identification number';
						$arr['id']= 'id_no';
						$arr['type']= 'text';
						$arr['placeholder']= 'Identification number';
						$arr['name']= 'id_no';
						$arr['min_input']= 12;
						$arr['is_required'] = true;

                        echo  input($arr);

                        $arrs['title']= 'Customer ID';
                        $arrs['id']= 'customer_id';
                        $arrs['type']= 'text';
                        $arrs['placeholder']= 'Customer ID';
                        $arrs['name']= 'customer_id';
                        $arrs['is_required'] = true;
                        echo  input($arrs);

                        $arr['title']= 'Customer Address';
						$arr['id']= 'address';
						$arr['type']= 'textarea';
						$arr['placeholder']= 'Customer Address';
						$arr['name']= 'address';
						$arr['is_required'] = true;

                        echo  textarea($arr);

                        @endphp

                        <div class="form-group">
                            <label for="level">{{ __('Select Level') }}</label>
                            <select class="custom-select mr-sm-2" id="level" name="level_id">
                                @foreach($levels as $level)
                                <option selected value="{{ $level->id }}">{{ $level->name }}</option>
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
							<button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> {{ __('Save') }}</button>
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
						<option selected value="1">{{ __('Active') }}</option>
						<option value="2">{{ __('Pending') }}</option>
						<option value="0">{{ __('Deactive') }}</option>
					</select>
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
	(function ($) {

		$('.use').on('click',function(){
			$('#preview').attr('src',myradiovalue);
			$('#image').val(myradiovalue);
		});

	})(jQuery);
	//success response will assign here
	function success(res){
		location.reload()
	}
</script>
@endsection
