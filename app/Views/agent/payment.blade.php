@extends('theme::layouts.app')

@section('title','Select Payment')

@section('content')
<!-- hero area start -->
<section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Select Payment') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Select Payment') }}</li>
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
<!-- payment area start -->
<section>
    <div class="select-payment-area mt-100 mb-100">
        <div class="container">
            <div class="row">
               <div class="col-sm-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
                <div class="col-lg-8 offset-lg-2">
                    <h3>{{ __('Select Payment Method') }}</h3>
                    <nav>
                        <ul class="nav nav-tabs payment_ui">
                            <li class="active">
                                <a href="#toyyibpay" data-toggle="tab" class="active show">
                                    <div class="payment-content">
                                        <div class="payment-img d-flex justify-content-center">
                                            <img src="{{ theme_asset('assets/img/payment/toyyibpay.png') }}" width="200" alt="">
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="">
                                <a href="#bank" data-toggle="tab" class="">
                                    <div class="payment-content">
                                        <div class="payment-img d-flex justify-content-center">
                                            <img src="{{ theme_asset('assets/img/payment/bank.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="product-payment-info">
                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="toyyibpay">
                                <br>
                                <h3>{{ __('Toyyibpay Payment Gateway') }}</h3>
                                <form method="post" action="#">                                
                                    <button type="submit" class="w-100">{{ __('Make Payment with Toyyibpay') }}</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="bizappay">
                                <br>
                                <h3>{{ __('Bizappay Payment Gateway') }}</h3>
                                <form method="post" action="#">
                                    <button type="submit" class="w-100">{{ __('Make Payment with bizappay') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- payment area end -->
@endsection