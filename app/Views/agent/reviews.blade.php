@extends('theme::layouts.app')

@section('title','Dashboard')

@section('content')
 <!-- hero area start -->
 <section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Dashboard') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Reviews') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->

<!-- dashboard area start -->
<section>
    <div class="dashboard-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('view::layouts.agent.partials.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="property-dashboard">
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="widget-card">
                                    
                                    <div class="widget-card-body">
                                        <div class="dashboard-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover ">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">{{ __('List Id') }}</th>
                                                            <th scope="col">{{ __('Name') }}</th>
                                                            <th scope="col">{{ __('Email') }}</th>
                                                            <th scope="col">{{ __('Ratting') }}</th>
                                                            <th scope="col">{{ __('Review') }}</th>
                                                            <th scope="col">{{ __('Created At') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($posts as $row)
                                                       <tr>
                                                           <td><a href="{{ url('/property',$row->term->slug) }}">{{ $row->term_id }}</a> @if($row->is_reported == 0) <a href="{{ route('agent.review.show',$row->id) }}" class="badge badge-primary cancel">{{ __('Report') }}</a>@else <span class="badge badge-warning">{{ __('Reported') }}</span> @endif</td>
                                                           <td>{{ $row->name }}</td>
                                                           <td>{{ $row->email }}</td>
                                                           <td>{{ $row->rating }}</td>
                                                           <td>{{ $row->review }}</td>
                                                           <td>{{ $row->created_at->diffForHumans() }}</td>
                                                       </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $posts->links('vendor.pagination.bootstrap') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard area end -->
@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush