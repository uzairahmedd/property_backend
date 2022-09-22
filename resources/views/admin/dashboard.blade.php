@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">{{ __('Listing Statistics') }}
            </div>
            <div class="card-stats-items">
                <div class="card-stats-item">
                <div class="card-stats-item-count pending_list"><img src="{{ asset('uploads/loader.gif') }}"></div>
            <div class="card-stats-item-label">{{ __('Pending') }}</div>
        </div>
        <div class="card-stats-item">
            <div class="card-stats-item-count rejected_list"><img src="{{ asset('uploads/loader.gif') }}"></div>
            <div class="card-stats-item-label">{{ __('Rejected') }}</div>
        </div>
        <div class="card-stats-item">
            <div class="card-stats-item-count approved_list"><img src="{{ asset('uploads/loader.gif') }}"></div>
            <div class="card-stats-item-label">{{ __('Approved') }}</div>
        </div>
      </div>
    </div>
    <div class="card-icon shadow-primary bg-primary">
      <i class="fas fa-archive"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>{{ __('Total Listing') }}</h4>
      </div>
      <div class="card-body total_list">
        <img src="{{ asset('uploads/loader.gif') }}">
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
  <div class="card card-statistic-2">
    <div class="card-chart">
      <canvas id="sales_of_earnings_chart" height="80"></canvas>
    </div>
    <div class="card-icon shadow-primary bg-primary">
      <i class="fas fa-dollar-sign"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>{{ __('Earnings of amount') }} - {{ date('Y') }}</h4>
      </div>
      <div class="card-body total_earnings_amount">
        <img src="{{ asset('uploads/loader.gif') }}">
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12">
  <div class="card card-statistic-2">
    <div class="card-chart">
      <canvas id="sale_count_chart" height="80"></canvas>
    </div>
    <div class="card-icon shadow-primary bg-primary">
      <i class="fas fa-shopping-bag"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>{{ __('Sales count') }} - {{ date('Y') }}</h4>
      </div>
      <div class="card-body total_transection_count">
        <img src="{{ asset('uploads/loader.gif') }}">
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header">
            <h4>{{ __('Listing Posts') }}</h4>
         </div>
         <div class="card-body">
            <canvas id="post_cart" height="150"></canvas>
         </div>
      </div>
   </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('Site Analytics') }}</h4>
                <div class="card-header-action">
                    <select class="form-control" id="days">
                        <option value="7">{{ __('Last 7 Days') }}</option>
                        <option value="15">{{ __('Last 15 Days') }}</option>
                        <option value="30">{{ __('Last 30 Days') }}</option>
                        <option value="180">{{ __('Last 180 Days') }}</option>
                        <option value="365">{{ __('Last 365 Days') }}</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart" height="80"></canvas>
                <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                        <div class="detail-value" id="total_visitors"></div>
                        <div class="detail-name">{{ __('Total Vistors') }}</div>
                    </div>
                    <div class="statistic-details-item">
                        <div class="detail-value" id="total_page_views"></div>
                        <div class="detail-name">{{ __('Total Page Views') }}</div>
                    </div>
                    <div class="statistic-details-item">
                        <div class="detail-value" id="new_vistors"></div>
                        <div class="detail-name">{{ __('New Visitor') }}</div>
                    </div>
                    <div class="statistic-details-item">
                        <div class="detail-value" id="returning_visitor"></div>
                        <div class="detail-name">{{ __('Returning Visitor') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Referral URL') }}</h4>
                    </div>
                    <div class="card-body refs" id="refs">

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Top Browser') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row" id="browsers"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Top Most Visit Pages') }}</h4>
                    </div>
                    <div class="card-body tmvp" id="table-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/assets/js/chart.min.js') }}"></script>
<script>
  "use strict";
  var period=$('#days').val();
  var dataUrl='{{ url('/admin/dashboard/data') }}';
  var base_url='{{ url('/') }}';
</script>
<script src="{{ asset('admin/assets/js/index-0.js') }}"></script>
@endsection
