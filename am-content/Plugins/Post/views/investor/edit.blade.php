@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('Edit investor') }}</h4>
                <form method="post" action="{{ route('admin.investor.update',$info->id) }}" id="basicform">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="text">{{ __('Investor Name') }}</label>
                    <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="" value="{{ $info->name }}">
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
    </div>
</form>
@endsection

@section('script')
    <script src="{{ asset('admin/js/form.js') }}"></script>
@endsection

