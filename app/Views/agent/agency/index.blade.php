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
                            <h2>{{ __('Agency') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Agency') }}</li>
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
                            <div class="col-lg-6">
                                <div class="single-widget">
                                    <div class="widget-container">
                                        <div class="count">
                                            <span>{{ $total_posts }}</span>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="ant-design:check-circle-outlined" data-inline="false"></span>
                                        </div>
                                    </div>
                                    <div class="widget-label">
                                        <a href="{{ route('agent.agency.index') }}"><span>{{ __('Your Created Agency') }}</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-widget">
                                    <div class="widget-container">
                                        <div class="count">
                                            <span>{{ $total_collaborations }}</span>
                                        </div>
                                        <div class="icon">
                                            <span class="iconify" data-icon="ant-design:check-circle-outlined" data-inline="false"></span>
                                        </div>
                                    </div>
                                    <div class="widget-label">
                                       <a href="{{ route('agent.agency.index','type=collaborations') }}"> <span>{{ __('Total Collaborations') }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-30">
                            <div class="col-lg-12">
                                <div class="widget-card">
                                    <div class="widget-card-header">
                                     <div class="row">
                                        @if($type == 'agency')
                                        <h5 class="col-sm-6">{{ __('My Agency') }}</h5>
                                        @elseif($type == 'collaborations')
                                        <h5 class="col-sm-6">{{ __('My Collaborations') }}</h5>
                                        @endif
                                        <div class="col-sm-6 text-right">
                                            <a href="{{ route('agent.agency.create') }}" class="btn btn-primary">{{ __('Create Agency') }}</a>
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
                                                        <th scope="col">{{ __('Name') }}</th>
                                                        <th scope="col">{{ __('Users Limit') }}</th>
                                                        <th scope="col">{{ __('Total Members') }}</th>
                                                        
                                                        <th scope="col">{{ __('Status') }}</th>
                                                        <th scope="col">{{ __('Last Update') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($posts as $agency)
                                                 <tr>
                                                    <td>
                                                        <a href="{{ route('agent.agency.edit',$agency->id) }}">#{{ $agency->id }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $agency->name }}
                                                        
                                                        @if($type=='agency')
                                                        <div>
                                                            <a href="{{ route('agent.agency.edit',$agency->id) }}" class="badge badge-success">{{ __('Edit') }}</a>

                                                            <a href="{{ route('agent.agencys.remove',$agency->id) }}" class="badge badge-danger cancel">{{ __('Delete') }}</a>
                                                        </div>
                                                        @else
                                                        <a href="{{ route('agent.agencys.leave',$agency->id) }}" class="badge badge-danger cancel">{{ __('Leave Now') }}</a></div>
                                                        @endif
                                                    </td>                                                
                                                    <td>
                                                        {{ $agency->featured }}
                                                    </td>
                                                    <td>{{ $agency->agency_lists_count }}</td>
                                                    <td>
                                                        @if($agency->status == 1)
                                                        <span class="badge badge-success">{{ __('Active') }}</span>
                                                        @elseif($agency->status == 2)
                                                        <span class="badge badge-waring">{{ __('pending') }}</span>
                                                        @else
                                                        <span class="badge badge-danger">{{ __('suspended') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="date">
                                                            {{ $agency->updated_at->diffForHumans() }}
                                                        </div>
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
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush