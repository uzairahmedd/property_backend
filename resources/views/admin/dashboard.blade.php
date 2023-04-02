@extends('layouts.backend.app')
@section('content')
    @push('dashboard_css')
        <link rel="stylesheet" href="https://unpkg.com/@webpixels/css@1.1.5/dist/index.css">
    @endpush

{{--    All Listings--}}
    <div class="total_listing">
        <div class="listing_heading">
            <h3 class="pb-3">{{ __('labels.listing_statistics') }}</h3>
        </div>
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.total') }}</span>
                                <span class="h3 font-bold mb-0 total_list"><img src="{{ asset('uploads/loader.gif') }}"></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>13%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.pending') }}</span>
                                <span class="h3 font-bold pending_list mb-0"><img src="{{ asset('uploads/loader.gif') }}"></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <i class="fa fa-pause" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>30%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.rejected') }}</span>
                                <span class="h3 font-bold rejected_list mb-0"><img src="{{ asset('uploads/loader.gif') }}"></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.approved') }}</span>
                                <span class="h3 font-bold mb-0 approved_list"><img src="{{ asset('uploads/loader.gif') }}"></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>10%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--Land Block Listing--}}

<div class="total_listing">
    <div class="listing_heading">
        <h3 class="pb-3">{{ __('labels.Blocks_listing_statistics') }}</h3>
    </div>
    <div class="row g-6 mb-6">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.total') }}</span>
                            <span class="h3 font-bold mb-0 total_lands_list"><img src="{{ asset('uploads/loader.gif') }}"></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>13%
                                    </span>
                        <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.pending') }}</span>
                            <span class="h3 font-bold pending_lands_list mb-0"><img src="{{ asset('uploads/loader.gif') }}"></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                <i class="fa fa-pause" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>30%
                                    </span>
                        <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.rejected') }}</span>
                            <span class="h3 font-bold rejected_lands_list mb-0"><img src="{{ asset('uploads/loader.gif') }}"></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                        <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">{{ __('labels.approved') }}</span>
                            <span class="h3 font-bold mb-0 approved_lands_list"><img src="{{ asset('uploads/loader.gif') }}"></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>10%
                                    </span>
                        <span class="text-nowrap text-xs text-muted">{{ __('labels.since_last_month') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--<div class="row">--}}
{{--  <div class="col-lg-4 col-md-4 col-sm-12">--}}
{{--    <div class="card card-statistic-2">--}}
{{--      <div class="card-stats">--}}
{{--        <div class="card-stats-title">{{ __('labels.listing_statistics') }}--}}
{{--        </div>--}}
{{--        <div class="card-stats-items">--}}
{{--          <div class="card-stats-item">--}}
{{--            <div class="card-stats-item-count pending_list"><img src="{{ asset('uploads/loader.gif') }}"></div>--}}
{{--            <div class="card-stats-item-label">{{ __('labels.pending') }}</div>--}}
{{--          </div>--}}
{{--          <div class="card-stats-item">--}}
{{--            <div class="card-stats-item-count rejected_list"><img src="{{ asset('uploads/loader.gif') }}"></div>--}}
{{--            <div class="card-stats-item-label">{{ __('labels.rejected') }}</div>--}}
{{--          </div>--}}
{{--          <div class="card-stats-item">--}}
{{--            <div class="card-stats-item-count approved_list"><img src="{{ asset('uploads/loader.gif') }}"></div>--}}
{{--            <div class="card-stats-item-label">{{ __('labels.approved') }}</div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card-icon shadow-primary bg-primary">--}}
{{--        <i class="fas fa-archive"></i>--}}
{{--      </div>--}}
{{--      <div class="card-wrap">--}}
{{--        <div class="card-header">--}}
{{--          <h4>{{ __('labels.total_listing') }}</h4>--}}
{{--        </div>--}}
{{--        <div class="card-body total_list">--}}
{{--          <img src="{{ asset('uploads/loader.gif') }}">--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--  <div class="col-lg-4 col-md-4 col-sm-12">--}}
{{--    <div class="card card-statistic-2">--}}
{{--      <div class="card-stats">--}}
{{--        <div class="card-stats-title">{{ __('labels.Blocks_listing_statistics') }}--}}
{{--        </div>--}}
{{--        <div class="card-stats-items">--}}
{{--          <div class="card-stats-item">--}}
{{--            <div class="card-stats-item-count pending_lands_list"><img src="{{ asset('uploads/loader.gif') }}"></div>--}}
{{--            <div class="card-stats-item-label">{{ __('labels.pending') }}</div>--}}
{{--          </div>--}}
{{--          <div class="card-stats-item">--}}
{{--            <div class="card-stats-item-count rejected_lands_list"><img src="{{ asset('uploads/loader.gif') }}"></div>--}}
{{--            <div class="card-stats-item-label">{{ __('labels.rejected') }}</div>--}}
{{--          </div>--}}
{{--          <div class="card-stats-item">--}}
{{--            <div class="card-stats-item-count approved_lands_list"><img src="{{ asset('uploads/loader.gif') }}"></div>--}}
{{--            <div class="card-stats-item-label">{{ __('labels.approved') }}</div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card-icon shadow-primary bg-primary">--}}
{{--        <i class="fas fa-archive"></i>--}}
{{--      </div>--}}
{{--      <div class="card-wrap">--}}
{{--        <div class="card-header">--}}
{{--          <h4>{{ __('labels.total_listing') }}</h4>--}}
{{--        </div>--}}
{{--        <div class="card-body total_lands_list">--}}
{{--          <img src="{{ asset('uploads/loader.gif') }}">--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--  <!-- <div class="col-lg-4 col-md-4 col-sm-12">--}}
{{--  <div class="card card-statistic-2">--}}
{{--    <div class="card-chart">--}}
{{--      <canvas id="sales_of_earnings_chart" height="80"></canvas>--}}
{{--    </div>--}}
{{--    <div class="card-icon shadow-primary bg-primary">--}}
{{--      <i class="fas fa-dollar-sign"></i>--}}
{{--    </div>--}}
{{--    <div class="card-wrap">--}}
{{--      <div class="card-header">--}}
{{--        <h4>{{ __('Earnings of amount') }} - {{ date('Y') }}</h4>--}}
{{--      </div>--}}
{{--      <div class="card-body total_earnings_amount">--}}
{{--        <img src="{{ asset('uploads/loader.gif') }}">--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div> -->--}}
{{--  <!-- <div class="col-lg-4 col-md-4 col-sm-12">--}}
{{--  <div class="card card-statistic-2">--}}
{{--    <div class="card-chart">--}}
{{--      <canvas id="sale_count_chart" height="80"></canvas>--}}
{{--    </div>--}}
{{--    <div class="card-icon shadow-primary bg-primary">--}}
{{--      <i class="fas fa-shopping-bag"></i>--}}
{{--    </div>--}}
{{--    <div class="card-wrap">--}}
{{--      <div class="card-header">--}}
{{--        <h4>{{ __('Sales count') }} - {{ date('Y') }}</h4>--}}
{{--      </div>--}}
{{--      <div class="card-body total_transection_count">--}}
{{--        <img src="{{ asset('uploads/loader.gif') }}">--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div> -->--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--  <div class="col-lg-12">--}}
{{--    <div class="card">--}}
{{--      <div class="card-header">--}}
{{--        <h4>{{ __('Listing Posts') }}</h4>--}}
{{--      </div>--}}
{{--      <div class="card-body">--}}
{{--        <canvas id="post_cart" height="150"></canvas>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--  <div class="col-lg-12 col-md-12 col-12 col-sm-12">--}}
{{--    <div class="card">--}}
{{--      <div class="card-header">--}}
{{--        <h4>{{ __('Site Analytics') }}</h4>--}}
{{--        <div class="card-header-action">--}}
{{--          <select class="form-control" id="days">--}}
{{--            <option value="7">{{ __('Last 7 Days') }}</option>--}}
{{--            <option value="15">{{ __('Last 15 Days') }}</option>--}}
{{--            <option value="30">{{ __('Last 30 Days') }}</option>--}}
{{--            <option value="180">{{ __('Last 180 Days') }}</option>--}}
{{--            <option value="365">{{ __('Last 365 Days') }}</option>--}}
{{--          </select>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="card-body">--}}
{{--        <canvas id="myChart" height="80"></canvas>--}}
{{--        <div class="statistic-details mt-sm-4">--}}
{{--          <div class="statistic-details-item">--}}
{{--            <div class="detail-value" id="total_visitors"></div>--}}
{{--            <div class="detail-name">{{ __('Total Vistors') }}</div>--}}
{{--          </div>--}}
{{--          <div class="statistic-details-item">--}}
{{--            <div class="detail-value" id="total_page_views"></div>--}}
{{--            <div class="detail-name">{{ __('Total Page Views') }}</div>--}}
{{--          </div>--}}
{{--          <div class="statistic-details-item">--}}
{{--            <div class="detail-value" id="new_vistors"></div>--}}
{{--            <div class="detail-name">{{ __('New Visitor') }}</div>--}}
{{--          </div>--}}
{{--          <div class="statistic-details-item">--}}
{{--            <div class="detail-value" id="returning_visitor"></div>--}}
{{--            <div class="detail-name">{{ __('Returning Visitor') }}</div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--      <div class="col-lg-6 col-md-6 col-12">--}}
{{--        <div class="card">--}}
{{--          <div class="card-header">--}}
{{--            <h4>{{ __('Referral URL') }}</h4>--}}
{{--          </div>--}}
{{--          <div class="card-body refs" id="refs">--}}

{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="card">--}}
{{--          <div class="card-header">--}}
{{--            <h4>{{ __('Top Browser') }}</h4>--}}
{{--          </div>--}}
{{--          <div class="card-body">--}}
{{--            <div class="row" id="browsers"></div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div class="col-lg-6 col-md-6 col-12">--}}
{{--        <div class="card">--}}
{{--          <div class="card-header">--}}
{{--            <h4>{{ __('Top Most Visit Pages') }}</h4>--}}
{{--          </div>--}}
{{--          <div class="card-body tmvp" id="table-body">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}
@endsection

@section('script')
<script src="{{ asset('admin/assets/js/chart.min.js') }}"></script>
<script>
  "use strict";
  var period = $('#days').val();
  var dataUrl = '{{ url('/admin/dashboard/data') }}';
  var base_url = '{{ url('/') }}';
</script>
<script src="{{ asset('admin/assets/js/index-0.js') }}"></script>
@endsection
