@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
<script src="{{ asset('admin/js/dropzone.js') }}"></script>
@endsection
@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Upload Media'])
<form action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="dropzone" id="mydropzone">
	@csrf
</form>
@endsection
