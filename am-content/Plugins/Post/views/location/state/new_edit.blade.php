@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Edit State') }}</h4>
                <form method="post" action="{{ route('admin.location.update',$info->id) }}" id="basicform">
                    @csrf
                    @method('PUT')
                    <div class="pt-20">
                        @php
                        $arr['title']= 'State Name';
                        $arr['id']= 'title';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'Enter Name';
                        $arr['name']= 'name';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->name;


                        echo  input($arr);


                        $arr['title']= 'slug';
                        $arr['id']= 'slug';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'slug';
                        $arr['name']= 'slug';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->slug;


                        echo  input($arr);

                        $arr['title']= 'State Name in Arabic';
                        $arr['id']= 'ar_title';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'Enter name in Arabic';
                        $arr['name']= 'ar_name';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->ar_name;


                        echo  input($arr);

                        @endphp
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="single-area">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ __('Publish') }}</h5>
                        <hr>
                        <div class="btn-publish">
                        <button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> {{ __('Save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-area">
                <div class="card sub">
                    <div class="card-body">
                        <h5>{{ __('Is Featured ?') }}</h5>
                        <hr>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                            <option  value="1" @if($info->featured==1) selected="" @endif>{{ __('Yes') }}</option>
                            <option value="0"  @if($info->featured==0) selected="" @endif>{{ __('No') }}</option>
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
    </form>
 {{ mediasingle() }}
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>
<script>
    "use strict";
    (function ($) {

        $('.use').on('click',function(){

            $('#preview').attr('src',myradiovalue);
            $('#preview_input').val(myradiovalue);

        });

    })(jQuery);
</script>
@endsection
