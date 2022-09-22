@extends('theme::layouts.app')

@section('content')
 <!-- hero area start -->
 <section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Transaction') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Transaction') }}</li>
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
                    <div class="widget-card">
                        <div class="widget-card-header">
                            <h5>{{ __('My Transaction') }}</h5>
                        </div>
                        <div class="widget-card-body">
                            <div class="dashboard-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('#') }}</th>
                                                <th scope="col">{{ __('Package Name') }}</th>
                                                <th scope="col">{{ __('Method') }}</th>
                                                <th scope="col">{{ __('Payment Status') }}</th>
                                                <th scope="col">{{ __('Total Credits') }}</th>
                                                <th scope="col">{{ __('Amount') }}</th>
                                                <th scope="col">{{ __('Created At') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactions as $key=>$value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->package->title ?? null }}</td>
                                                    <td>{{ $value->payment_method }}</td>
                                                    <td>
                                                        @if ($value->status == 1)
                                                            <span class="badge badge-success">{{ __('approved') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $value->credits }}
                                                    </td>
                                                    <td>{{ $value->amount }}</td>
                                                    <td>{{ $value->created_at->toDateString() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $transactions->links('vendor.pagination.bootstrap') }}
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