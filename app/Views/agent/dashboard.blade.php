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
                                        <li>{{ __('Dashboard') }}</li>
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
                            <div class="col-lg-4">
                                <div class="single-widget">
                                    <div class="widget-container">
                                        <div class="count">
                                            <span>{{ $approved_properties }}</span>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="ant-design:check-circle-outlined" data-inline="false"></span>
                                        </div>
                                    </div>
                                    <div class="widget-label">
                                        <span>{{ __('Approved properties') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single-widget">
                                    <div class="widget-container">
                                        <div class="count">
                                            <span>{{ $pending_properties }}</span>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="la:user-clock-solid" data-inline="false"></span>
                                        </div>
                                    </div>
                                    <div class="widget-label">
                                        <span>{{ __('Pending properties') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single-widget">
                                    <div class="widget-container">
                                        <div class="count">
                                            <span>{{ $rejected_properties }}</span>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="carbon:ai-status-rejected" data-inline="false"></span>
                                        </div>
                                    </div>
                                    <div class="widget-label">
                                        <span>{{ __('Rejected properties') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-30">
                            <div class="col-lg-12">
                                <div class="widget-card">
                                    <div class="widget-card-header">
                                        <h5>{{ __('My Properties') }}</h5>
                                    </div>
                                    <div class="widget-card-body">
                                        <div class="dashboard-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">{{ __('ID') }}</th>
                                                            <th scope="col">{{ __('Property') }}</th>
                                                            <th scope="col">{{ __('Category') }}</th>
                                                            <th scope="col">{{ __('Purpose') }}</th>
                                                            <th scope="col">{{ __('City') }}</th>
                                                            <th scope="col">{{ __('Status') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($posts as $row)
                                                        <tr>
                                                            <th scope="row">{{ $row->id }}</th>
                                                            <td><a href="{{ url('/property',$row->slug) }}" target="_blank">{{ $row->title }}</a></td>
                                                            <td>{{ $row->property_type->category->name ?? '' }}</td>
                                                            <td>{{ $row->property_status_type->category->name ?? '' }}</td>
                                                            <td>{{ $row->post_city->category->name ?? '' }}</td>
                                                            <td>@if($row->status==1)
                                                                <span class="badge badge-success">{{ __('Published') }}</span>
                                                                @elseif($row->status==2)
                                                                <span class="badge badge-warning">{{ __('Incomplete') }}</span>
                                                                @elseif($row->status==0)
                                                                <span class="badge badge-danger">{{ __('Trash') }}</span>
                                                                @elseif($row->status==3)
                                                                <span class="badge badge-warning">{{ __('Pending') }}</span>    
                                                                @elseif($row->status==4)
                                                                <span class="badge badge-danger">{{ __('Rejected') }}</span>    
                                                                @endif
                                                            </td>
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