@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Agent') }}</h4>
				<form method="post" action="{{ route('admin.agent.update',$agent->id) }}" class="basicform">
					@csrf
					<div class="pt-20">
                        @php

                        $info = json_decode($agent->usermeta->content);

						$arr['title']= 'Name';
						$arr['id']= 'name';
						$arr['type']= 'text';
						$arr['placeholder']= 'Enter Name';
						$arr['name']= 'name';
						$arr['is_required'] = true;
						$arr['value'] = $agent->name;
						echo  input($arr);

						$arr['title']= 'Email';
						$arr['id']= 'email';
						$arr['type']= 'email';
						$arr['placeholder']= 'Enter Email';
						$arr['name']= 'email';
                        $arr['is_required'] = true;
                        $arr['value'] = $agent->email;
                        echo  input($arr);

                        $arr['title']= 'Password';
						$arr['id']= 'password';
						$arr['type']= 'password';
						$arr['placeholder']= 'Enter password';
						$arr['name']= 'password';
                        $arr['is_required'] = false;
                        $arr['value'] = '';
                        echo  input($arr);

                        $arr['title']= 'Password';
						$arr['id']= 'password_confirmation';
						$arr['type']= 'password';
						$arr['placeholder']= 'Confirm Password';
						$arr['name']= 'password_confirmation';
                        $arr['is_required'] = false;
                        $arr['value'] = '';
                        echo  input($arr);

                        $arr['title']= 'Credits';
						$arr['id']= 'post_limit';
						$arr['type']= 'number';
						$arr['placeholder']= 'Credits';
						$arr['name']= 'credits';
						$arr['is_required'] = true;
						$arr['value'] = $agent->credits;
                        echo  input($arr);

                        @endphp
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <textarea name="address" id="address" cols="30" class="form-control" rows="8" placeholder="Address">{{ $info->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" cols="30" class="form-control" rows="8" placeholder="Description">{{ $info->description }}</textarea>
                        </div>
                        @php
                        $arr['title']= 'Phone Number';
						$arr['id']= 'phone';
						$arr['type']= 'number';
						$arr['placeholder']= 'Enter Phone Number';
						$arr['name']= 'phone';
						$arr['is_required'] = false;
						$arr['value'] = $info->phone;
                        echo  input($arr);

                        $arr['title']= 'Facebook Link';
						$arr['id']= 'facebook';
						$arr['type']= 'text';
						$arr['placeholder']= 'Facebook Link';
						$arr['name']= 'facebook';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->facebook;
                        echo  input($arr);

                        $arr['title']= 'Twitter Link';
						$arr['id']= 'twitter';
						$arr['type']= 'text';
						$arr['placeholder']= 'Twitter Link';
						$arr['name']= 'twitter';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->twitter;
                        echo  input($arr);

                        $arr['title']= 'Youtube Link';
						$arr['id']= 'youtube';
						$arr['type']= 'text';
						$arr['placeholder']= 'Youtube Link';
						$arr['name']= 'youtube';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->youtube;
                        echo  input($arr);

                        $arr['title']= 'Pinterest Link';
						$arr['id']= 'pinterest';
						$arr['type']= 'text';
						$arr['placeholder']= 'pinterest Link';
						$arr['name']= 'pinterest';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->pinterest;
                        echo  input($arr);

                        $arr['title']= 'Linkedin Link';
						$arr['id']= 'linkedin';
						$arr['type']= 'text';
						$arr['placeholder']= 'Linkedin Link';
						$arr['name']= 'linkedin';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->linkedin;
                        echo  input($arr);

                        $arr['title']= 'Instagram Link';
						$arr['id']= 'instagram';
						$arr['type']= 'text';
						$arr['placeholder']= 'Instagram Link';
						$arr['name']= 'instagram';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->instagram ?? null;
                        echo  input($arr);

                        $arr['title']= 'Whatsapp Phone Number';
						$arr['id']= 'whatsapp';
						$arr['type']= 'text';
						$arr['placeholder']= 'Whatsapp Phone Number';
						$arr['name']= 'whatsapp';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->whatsapp ?? null;
                        echo  input($arr);

                        $arr['title']= 'Service Area';
						$arr['id']= 'service_area';
						$arr['type']= 'text';
						$arr['placeholder']= 'Service Area';
						$arr['name']= 'service_area';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->service_area ?? null;
                        echo  input($arr);

                        $arr['title']= 'Tax Number';
						$arr['id']= 'tax_number';
						$arr['type']= 'text';
						$arr['placeholder']= 'Tax Number';
						$arr['name']= 'tax_number';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->tax_number ?? null;
                        echo  input($arr);

                        $arr['title']= 'License Number';
						$arr['id']= 'license';
						$arr['type']= 'text';
						$arr['placeholder']= 'License Number';
						$arr['name']= 'license';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->license ?? null;
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
                            <button type="submit" class="btn btn-primary col-12 basicbtn"><i class="fa fa-save"></i> {{ __('Update') }}</button>
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
                            <option {{ $agent->status == 1 ? 'selected' : '' }} value="1">{{ __('Published') }}</option>
                            <option {{ $agent->status == 2 ? 'selected' : '' }} value="2">{{ __('Draft') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <?php
            if(!empty($agent->avatar)){
                $media['preview'] = $agent->avatar;
                $media['value'] = $agent->avatar;
                echo  mediasection($media);
            }
            else{
            echo mediasection();
            }
            ?>
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

    $('.use').on('click',function(){

      $('#preview').attr('src',myradiovalue);
      $('#image').val(myradiovalue);
      $('#preview_input').val(myradiovalue);

    });
</script>
@endsection
