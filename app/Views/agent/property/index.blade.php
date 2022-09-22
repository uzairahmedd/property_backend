@extends('theme::layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">
@endpush
@section('title','All Properties')

@section('content')
<!-- hero area start -->
<section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Property') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Property') }}</li>
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
                                    <div class="widget-card-header">
                                        <div class="row">
                                            <h5 class="col-sm-6">{{ __('My Properties') }}</h5>
                                            <div class="col-sm-6 text-right">
                                                <a href="{{ route('agent.property.create') }}" class="btn btn-primary">{{ __('Create Property') }}</a>
                                            </div>
                                            <div class="col-sm-12 mt-1">
                                                @if(session()->has('message'))
                                                <div class="alert alert-success">
                                                    <button type="button" class="close text-dark" data-dismiss="alert" aria-hidden="true">×</button>
                                                    {{ session()->get('message') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-card-body">
                                        <div class="dashboard-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">{{ __('ID') }}</th>
                                                            <th scope="col">{{ __('Property name') }}</th>
                                                            <th scope="col">{{ __('Category') }}</th>
                                                            <th scope="col">{{ __('Purpose') }}</th>
                                                            <th scope="col">{{ __('City') }}</th>
                                                            <th scope="col">{{ __('Status') }}</th>
                                                            <th scope="col">{{ __('Edit') }}</th>
                                                            <th scope="col">{{ __('Delete') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($posts as $row)
                                                        <tr>
                                                            <th scope="row">{{ $row->id }}</th>
                                                            <td>{{ $row->title }}</td>
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
                                                            <td><a href="{{ route('agent.property.edit',$row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
                                                            <td><a href="{{ route('agent.propertys.destory',$row->id) }}" class="btn btn-danger btn-sm cancel"><i class="fa fa-trash"></i></a></td>
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
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
@endpush