@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Add new Post') }}</h4>
                <form method="post" id="productform" action="{{ route('admin.post.store') }}">
                    @csrf
                    <div class="custom-form pt-20">
                        @php
                        $arr['title']= 'Post Title';
                        $arr['id']= 'name';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'Post Title';
                        $arr['name']= 'title';
                        $arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= 'Excerpt';
                        $arr['id']= 'excerpt';
                        $arr['placeholder']= 'short description';
                        $arr['name']= 'excerpt';
                        $arr['is_required'] = true;

                        echo  textarea($arr);

                        $arrn['title']= 'Post Content';
                        $arrn['name']= 'content';

                        echo  editor($arrn);
                        @endphp
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
                        <option value="1">{{ __('Published') }}</option>
                        <option value="2">{{ __('Draft') }}</option>
                    </select>
                </div>
            </div>
        </div>
        {{ mediasection() }}
        </div>
    </div>
    <input type="hidden"  name="type" value="0">
    <input type="hidden"  name="post_type" value="blog">
</form>
{{ mediasingle() }}
@endsection

@section('script')
<script src="{{ asset('admin/js/media.js') }}"></script>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script>
  (function ($) {
    "use strict";

        $('.use').on('click',function(){
        $('#preview').attr('src',myradiovalue);
        $('#image').val(myradiovalue);
        $('#preview_input').val(myradiovalue);
        });

    })(jQuery);
    //response will assign this function
    function success(res){
    location.reload();
    }
</script>
@endsection
