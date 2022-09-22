@extends('theme::layouts.app')

@section('title','Jomidar')

@section('content')

<!-- hero area start -->
@include('view::layouts.section.hero.hero')
<!-- hero area end -->

<!-- find agents area start -->
@include('view::layouts.section.agents.agents')
<!-- find agents area end -->

<!-- featured properties area start -->
@include('view::layouts.section.properties.featured')
<!-- featured properties area end -->

<!-- places area start -->
@include('view::layouts.section.places.places')
<!-- places area end -->

<!-- blog area start -->
@include('view::layouts.section.blog.blog')
<!-- blog area end -->
@endsection

<input type="hidden" id="agent_url" value="{{ route('agent.data') }}">

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/home.js') }}"></script>    
@endpush
