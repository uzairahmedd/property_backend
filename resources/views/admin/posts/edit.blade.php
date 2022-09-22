@extends('layouts.backend.app')
@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Edit Post') }}</h4>
                <form method="post" id="productform" action="{{ route('admin.post.update',$info->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="custom-form pt-20">
                        @php
                        $arr['title']= 'Post Title';
                        $arr['id']= 'name';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'Post Title';
                        $arr['name']= 'title';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->title;

                        echo  input($arr);

                        $arr1['title']= 'Post Slug';
                        $arr1['id']= 'slug';
                        $arr1['type']= 'text';
                        $arr1['placeholder']= 'Post Slug';
                        $arr1['name']= 'slug';
                        $arr1['is_required'] = true;
                        $arr1['value'] = $info->slug;

                        echo  input($arr1);

                        $arr['title']= 'Excerpt';
                        $arr['id']= 'excerpt';
                        $arr['placeholder']= 'short description';
                        $arr['name']= 'excerpt';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->excerpt->content;

                        echo  textarea($arr);

                        $arrn['title']= 'Post Content';
                        $arrn['name']= 'content';
                        $arrn['value']= $info->content->content;

                        echo  editor($arrn);
                        @endphp
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Search Engine Optimization') }}</h4>
                <div class="search-engine">
                    <h6 class="pt-15 page-title-seo" id="seotitle">{{ $info->title }}</h6>
                    <a href="#" class="text-success" id="seourl">{{ url('/').'/post/'.$info->slug }}</a>
                    <p id="seodescription">{{ $info->excerpt->content }}</p>
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
                    <option value="1" @if($info->status == 1) selected="" @endif>{{ __('Published') }}</option>
                    <option value="2" @if($info->status == 2) selected="" @endif>{{ __('Draft') }}</option>
                </select>
            </div>
        </div>
    </div>
        <?php
        if(!empty($info->preview)){

            $media['preview'] = $info->preview->content;
            $media['value'] = $info->preview->content;
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
</script>
@endsection
