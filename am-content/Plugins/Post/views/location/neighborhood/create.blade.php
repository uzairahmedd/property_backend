@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Add new neighborhood') }}</h4>
                <form method="post" action="{{ route('admin.location.store') }}" class="basicform">
                    @csrf
                    <div class="pt-20">
                        @php
                        $arr['title']= 'Neighborhood Name';
                        $arr['id']= 'title';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'Enter Name in english';
                        $arr['name']= 'name';
                        $arr['is_required'] = true;

                        echo  input($arr);

                  
                        $arr['title']= 'Neighborhood Name in Arabic';
                        $arr['id']= 'ar_title';
                        $arr['type']= 'text';
                        $arr['placeholder']= 'Enter Name in arabic';
                        $arr['name']= 'ar_name';
                        $arr['is_required'] = true;

                        echo  input($arr);
                        @endphp
                        <div class="form-group">
                            <label for="title">Select State</label>
                            <select class="form-control" name="p_id" id="state">
                                <option disabled="" selected="">Select State</option>
                                @foreach(App\Category::where('type','states')->get() as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
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
                        <h5>{{ __('Publish') }}</h5>
                        <hr>
                        <div class="btn-publish">
                            <button type="submit" class="btn btn-primary col-12 basicbtn"><i class="fa fa-save"></i> {{ __('Save') }}</button>
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
                            <option  value="1">{{ __('Yes') }}</option>
                            <option value="0" selected>{{ __('No') }}</option>
                        </select>
                    </div>
                </div>
            </div>
    </div>
    <input type="hidden" name="type" value="neighborhood">
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
