@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add New Agent') }}</h4>
				<form method="post" action="{{ route('admin.agent.store') }}" id="basicform">
					@csrf
					<div class="pt-20">
						@php
						$arr['title']= 'Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Enter Name';
						$arr['name']= 'name';
						$arr['is_required'] = true;
						echo  input($arr);

						$arr['title']= 'Email';
						$arr['id']= 'email';
						$arr['type']= 'email';
						$arr['placeholder']= 'Enter Email';
						$arr['name']= 'email';
						$arr['is_required'] = true;
                        echo  input($arr);

                        $arr['title']= 'Password';
						$arr['id']= 'password';
						$arr['type']= 'password';
						$arr['placeholder']= 'Enter password';
						$arr['name']= 'password';
						$arr['is_required'] = true;
                        echo  input($arr);

                        $arr['title']= 'Password';
						$arr['id']= 'password_confirmation';
						$arr['type']= 'password';
						$arr['placeholder']= 'Confirm Password';
						$arr['name']= 'password_confirmation';
						$arr['is_required'] = true;
                        echo  input($arr);

                        @endphp
                         <div class="form-group">
                            <label for="credits">{{ __('Credits') }}</label>
                            <input required value="0" type="number" name="credits" id="credits"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" cols="30" class="form-control" rows="8" placeholder="Description"></textarea>
                        </div>
                        @php
                        $arr['title']= 'Phone Number';
						$arr['id']= 'phone';
						$arr['type']= 'number';
						$arr['placeholder']= 'Enter Phone Number';
						$arr['name']= 'phone';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Facebook Link';
						$arr['id']= 'facebook';
						$arr['type']= 'text';
						$arr['placeholder']= 'Facebook Link';
						$arr['name']= 'facebook';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Twitter Link';
						$arr['id']= 'twitter';
						$arr['type']= 'text';
						$arr['placeholder']= 'Facebook Link';
						$arr['name']= 'twitter';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Youtube Link';
						$arr['id']= 'youtube';
						$arr['type']= 'text';
						$arr['placeholder']= 'Youtube Link';
						$arr['name']= 'youtube';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Pinterest Link';
						$arr['id']= 'pinterest';
						$arr['type']= 'text';
						$arr['placeholder']= 'pinterest Link';
						$arr['name']= 'pinterest';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Linkedin Link';
						$arr['id']= 'linkedin';
						$arr['type']= 'text';
						$arr['placeholder']= 'Linkedin Link';
						$arr['name']= 'linkedin';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Instagram Link';
						$arr['id']= 'instagram';
						$arr['type']= 'text';
						$arr['placeholder']= 'Instagram Link';
						$arr['name']= 'instagram';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Whatsapp Phone Number';
						$arr['id']= 'whatsapp';
						$arr['type']= 'text';
						$arr['placeholder']= 'Whatsapp Phone Number';
						$arr['name']= 'whatsapp';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Service Area';
						$arr['id']= 'service_area';
						$arr['type']= 'text';
						$arr['placeholder']= 'Service Area';
						$arr['name']= 'service_area';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'Tax Number';
						$arr['id']= 'tax_number';
						$arr['type']= 'text';
						$arr['placeholder']= 'Tax Number';
						$arr['name']= 'tax_number';
						$arr['is_required'] = false;
                        echo  input($arr);

                        $arr['title']= 'License Number';
						$arr['id']= 'license';
						$arr['type']= 'text';
						$arr['placeholder']= 'License Number';
						$arr['name']= 'license';
						$arr['is_required'] = false;
						echo  input($arr);
                        @endphp
					</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="single-area">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Publish') }}</h5>
                    </div>
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
                            <option value="1">{{ __('Published') }}</option>
                            <option value="2">{{ __('Draft') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            {{ mediasection() }}
        </div>
    </div>
</form>
{{ mediasingle() }}
@endsection

@section('script')
<script src="{{ asset('admin/js/media.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>

<script>
	"use strict";
	//success response will assign here
	function success(res){
		location.reload()
	}

    $('.use').on('click',function(){

      $('#preview').attr('src',myradiovalue);
      $('#image').val(myradiovalue);
      $('#preview_input').val(myradiovalue);

    });
</script>
@endsection
