@extends('layouts.backend.app')
@php
        $district = __('labels.district');
        $enter_name_english = __('labels.enter_name_in_english');
        $enter_name_arabic = __('labels.district_name_in_arabic');
        $enter_arabic = __('labels.enter_name_in_arabic');
    @endphp
@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('labels.edit_District') }}</h4>
                <form method="post" action="{{ route('admin.location.update',$info->id) }}" class="basicform">
                    @csrf
                    @method('PUT')
                    <div class="pt-20">
                        @php
                        $arr['title']= $district;
                        $arr['id']= 'title';
                        $arr['type']= 'text';
                        $arr['placeholder']= $enter_name_english;
                        $arr['name']= 'name';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->name;

                        echo  input($arr);

                        $arr['title']=  $enter_name_arabic;
                        $arr['id']= 'ar_title';
                        $arr['type']= 'text';
                        $arr['placeholder']= $enter_arabic;
                        $arr['name']= 'ar_name';
                        $arr['is_required'] = true;
                        $arr['value'] = $info->ar_name;

                        echo  input($arr);

                      
                        @endphp
                        <div class="form-group states">
                            <label for="title">{{ __('labels.select_city') }}</label>
                            <select class="form-control" name="p_id" id="state">
                                <option disabled="" selected="">{{ __('labels.select_city') }}</option>
                                @foreach($cities as $r)
                                <option value="{{ $r->id }}" class="res" @if($r->id==$info->p_id) selected="" @endif>{{ Session::get('locale') == 'ar' ? $r->ar_name : $r->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ publish(['class'=>'basicbtn']) }}
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                <h5>{{__('labels.is_featured')}}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                        <option  value="1" @if($info->featured==1) selected="" @endif>{{ __('labels.yes') }}</option>
                        <option value="0"  @if($info->featured==0) selected="" @endif>{{ __('labels.no') }}</option>
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
    (function ($) {

      $('.use').on('click',function(){

        $('#preview').attr('src',myradiovalue);
        $('#preview_input').val(myradiovalue);

      });

      $('#p_id').on('change',()=>{
        $('#id').val($('#p_id').val());
        $('#basicform2').submit();
      });

    })(jQuery);
     //success response will assign here
     function success(res) {
            location.reload()
        }
</script>
@endsection
