@extends('theme::layouts.app')

@section('title','My Packages')

@section('content')
<!-- hero area start -->
<section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Select Package') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Select Package') }}</li>
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

                            <!-- This form is hidden -->
                            <form action="{{route('razorpay.status')}}" method="POST" hidden>
                                <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
                                <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
                                <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
                                <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
                                <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">{{ __('Submit') }}</button>
                            </form>
                            <!-- // Let's Click this button automatically when this page load using javascript -->
                            <!-- You can hide this button -->
                            <button id="rzp-button1" hidden>{{ __('Pay') }}</button>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection    
@push('js')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
    "use strict";
    var razorpayId = "{{ $response['razorpayId'] }}";
    var amount = "{{ $response['amount'] }}";
    var currency ="{{ $response['currency'] }}";
    var name = "{{ $response['name'] }}";
    var description = "{{ $response['description'] }}";
    var orderId = "{{ $response['orderId'] }}";
    var email = "{{ $response['email'] }}";
    var contactNumber = "{{ $response['contactNumber'] }}";
    var address = "{{ $response['address'] }}";
    var logo = "{{ asset('uploads/logo.png') }}";
</script>
<script src="{{ asset('admin/js/razorpay.js') }}"></script>
@endpush