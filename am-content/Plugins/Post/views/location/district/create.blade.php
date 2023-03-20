@extends('layouts.backend.app')
@section('content')
    @php
        $district = __('labels.district');
        $enter_name_english = __('labels.enter_name_in_english');
        $enter_name_arabic = __('labels.district_name_in_arabic');
        $enter_arabic = __('labels.enter_name_in_arabic');
        $slug =  __('labels.slug');
    @endphp
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{__('labels.add_new_district')}}</h4>
                <form method="post" action="{{ route('admin.location.store') }}" class="basicform">
                    @csrf
                    <div class="pt-20">
                        @php
                        $arr['title']= $district;
                        $arr['id']= 'title';
                        $arr['type']= 'text';
                        $arr['placeholder']= $enter_name_english;
                        $arr['name']= 'name';
                        $arr['is_required'] = true;

                        echo  input($arr);


                        $arr['title']= $enter_name_arabic;
                        $arr['id']= 'ar_title';
                        $arr['type']= 'text';
                        $arr['placeholder']= $enter_arabic;
                        $arr['name']= 'ar_name';
                        $arr['is_required'] = true;

                        echo  input($arr);

                        $arr['title']= $slug;
                        $arr['id']= 'district';
                        $arr['type']= 'text';
                        $arr['placeholder']= $slug;
                        $arr['name']= 'slug';
                        $arr['is_required'] = false;

                        echo  input($arr);
                        @endphp
                        <div class="form-group">
                            <label for="title">{{__('labels.select_city')}}</label>
                            <select class="form-control" name="p_id" id="city">
                                <option disabled="" selected="">{{__('labels.select_city')}}</option>
                                @foreach(App\Models\City::get() as $row)
                                <option value="{{ $row->id }}">{{  Session::get('locale') == 'ar' ? $row->ar_name : $row->name }}</option>
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
                        <h5>{{__('labels.publish')}}</h5>
                        <hr>
                        <div class="btn-publish">
                            <button type="submit" class="btn btn-primary col-12 basicbtn"><i class="fa fa-save"></i> {{__('labels.save')}}</button>
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
                            <option  value="1">{{__('labels.yes')}}</option>
                            <option value="0" selected>{{__('labels.no')}}</option>
                        </select>
                    </div>
                </div>
            </div>
    </div>
    <input type="hidden" name="type" value="district">
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

    })(jQuery);
    function success(argument) {
      $('.basicform').trigger('reset')
    }
</script>
@endsection
