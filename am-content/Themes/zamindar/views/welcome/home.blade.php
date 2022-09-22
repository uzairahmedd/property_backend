@extends('theme::layouts.app')

@section('content')

<!-- hero area start -->
@include('view::layouts.section.hero.herotwo')
<!-- hero area end -->

<!-- recentproperty area start -->
@include('view::layouts.section.properties.recent')
<!-- recentproperty area end -->

<!-- counter area start -->
@include('view::layouts.section.counter.index')
<!-- counter area end -->

<!-- find agents area start -->
@include('view::layouts.section.agents.agents')
<!-- find agents area end -->

<!-- city area start -->
@include('view::layouts.section.places.city')
<!-- city area end -->

<!-- blog area start -->
@include('view::layouts.section.blog.blog')
<!-- blog area end --> 

<input type="hidden" id="agent_url" value="{{ route('agent.data') }}">
@endsection

@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/home.js') }}"></script>
@endpush