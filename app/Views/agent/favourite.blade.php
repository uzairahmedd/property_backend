@extends('theme::layouts.app')

@section('title','Favourite')

@section('content')
 <!-- hero area start -->
 <section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('My Favourites') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('My Favourites') }}</li>
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
                                        <h5>{{ __('My Favourites') }}</h5>
                                    </div>
                                    <div class="widget-card-body">
                                        <div class="dashboard-table">
                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('Property name') }}</th>
                                                    <th scope="col">{{ __('Categories') }}</th>
                                                    <th scope="col">{{ __('City') }}</th>
                                                    <th scope="col">{{ __('Action') }}</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($properties as $key=>$value)
                                                    <tr>
                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        <td>{{ $value->title }}</td>
                                                        <td>{{ $value->property_type->category->name ?? null }}</td>
                                                        <td>{{ $value->post_city->category->name ?? null }}</td>
                                                        <td><a href="{{ route('property.show',$value->slug) }}" class="btn btn-info btn-sm">{{ __('View Details') }}</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                              </table>
                                              <div class="f-right">
                                                  {{ $properties->links('vendor.pagination.bootstrap') }}
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