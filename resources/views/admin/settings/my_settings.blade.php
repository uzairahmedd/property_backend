@extends('layouts.backend.app')

@section('content')
<div class="card">
    <div class="card-body">
       <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger none">
              <ul id="errors">

              </ul>
            </div>
            <div class="alert alert-success none">
                    <ul id="success">

                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <form method="post" id="basicform" enctype="multipart/form-data" action="{{ route('admin.users.genupdate') }}">
                    @csrf
                    <h4 class="mb-20">{{ __('labels.edit_genaral_settings') }}</h4>
                    <div class="custom-form">
                        <div class="form-group">
                            <label for="name">{{ __('labels.name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" required placeholder="{{ __('labels.enter_name') }}" value="{{ $info->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('labels.email') }}</label>
                            <input type="text" name="email" id="email" class="form-control" required placeholder="{{ __('labels.enter_email') }}"  value="{{ $info->email }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">{{ __('labels.update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form method="post" id="basicform1" action="{{ route('admin.users.passup') }}">
                    @csrf
                    <h4 class="mb-20">{{ __('labels.change_password') }}</h4>
                    <div class="custom-form">
                        <div class="form-group">
                            <label for="oldpassword">{{ __('labels.old_password') }}</label>
                            <input type="password" name="current" id="oldpassword" class="form-control"  placeholder="{{ __('labels.enter_old_password') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('labels.new_password') }}</label>
                            <input type="password" name="password" id="password" class="form-control"  placeholder="{{ __('labels.enter_new_password') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password1">{{ __('labels.confirm_password') }}</label>
                            <input type="password" name="password_confirmation" id="password1" class="form-control"  placeholder="{{ __('labels.confirm_password') }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('labels.change') }}</button>
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
<script type="text/javascript">
    "use strict";
    function success(res){
        $('.alert-danger').hide();
        $('.alert-success').show();
        $("#success").html("<li class='text-white'>"+res+"</li>");
    }
    function errosresponse(xhr){
        $('.alert-success').hide();
        $('.alert-danger').show();
        $('#errors').append("<li class='text-white'>"+xhr.responseJSON.message+"</li>")

    }
</script>
@endsection
