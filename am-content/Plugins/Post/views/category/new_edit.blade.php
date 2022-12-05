@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Edit category') }}</h4>
                <form method="post" action="{{ route('admin.category.update',$info->id) }}" class="basicform">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="text">{{ __('Name') }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="" value="{{ $info->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p_id">{{ __('Parent Category') }}</label>
                        <select multiple="" class="form-control select2" name="child[]">
                            @foreach($categories as $row)
                            <option value="{{ $row->id }}" @if(in_array($row->id, $childs)) selected="" @endif>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
        </div>
    </div>
    {{ publish(['class'=>'basicbtn']) }}
    <div class="single-area">
        <div class="card sub">
            <div class="card-body">
                <h5>{{ __('Is Featured ?') }}</h5>
                <hr>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                    <option value="1" @if($info->featured==1) selected="" @endif>{{ __('Yes') }}</option>
                    <option value="0" @if($info->featured==0) selected="" @endif>{{ __('No') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="type" value="category">
</form>
@endsection

@section('script')
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endsection