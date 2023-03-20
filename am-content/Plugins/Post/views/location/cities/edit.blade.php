@extends('layouts.backend.app')

@section('content')
@php
       $city_name_arabic =  __('labels.city_name_in_arabic');
       $city_name =  __('labels.city_name');
       $slug =  __('labels.slug');

    @endphp
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
            <h4>{{__('labels.edit_city')}}</h4>
                <form method="post" action="{{ route('admin.location.update',$info->id) }}" id="basicform">
                    @csrf
                    @method('PUT')
                    <div class="pt-20">
                        @php
                        $arr['title']= $city_name;
                        $arr['id']= 'title';
                        $arr['type']= 'text';
                        $arr['placeholder']= $city_name;
                        $arr['name']= 'name';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->name;


                        echo input($arr);

                        $arr['title']= $city_name_arabic;
                        $arr['id']= 'ar_title';
                        $arr['type']= 'text';
                        $arr['placeholder']= $city_name_arabic;
                        $arr['name']= 'ar_name';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->ar_name;


                        echo input($arr);

                        $arr['title']= $slug;
                        $arr['id']= 'edit_city_slug';
                        $arr['type']= 'text';
                        $arr['placeholder']= $slug;
                        $arr['name']= 'slug';
                        $arr['is_required'] = false;
                        $arr['value'] = $info->slug;


                        echo input($arr);

                        @endphp
                    </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="single-area">
            <div class="card">
                <div class="card-body">
                <h5>{{__('labels.publish')}}</h5>
                    <hr>
                    <div class="btn-publish">
                        <button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> {{__('labels.save')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                <h5>{{__('labels.is_featured')}}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                        <option value="1" @if($info->featured==1) selected="" @endif>{{__('labels.yes')}}</option>
                        <option value="0" @if($info->featured==0) selected="" @endif>{{__('labels.no')}}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    </form>
    @endsection

    @section('script')
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <script src="{{ asset('admin/js/media.js') }}"></script>
    <script>
        "use strict";
        (function($) {

            $('.use').on('click', function() {

                $('#preview').attr('src', myradiovalue);
                $('#preview_input').val(myradiovalue);

            });

        })(jQuery);
        //success response will assign here
        function success(res) {
            location.reload()
        }
    </script>
    @endsection