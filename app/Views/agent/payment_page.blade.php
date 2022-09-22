@extends('theme::layouts.app')

@push('css')
<script src="https://js.stripe.com/v3/"></script>
@endpush

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
                            <h2>{{ __('Make Payment') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('agent.dashboard') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li><a href="{{ route('agent.package.index') }}">{{ __('Package') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Make Payment') }}</li>
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
                        <div class="select-payment-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>{{ __('Select Payment Method') }}</h3>
                                        <nav>
                                            <ul class="nav nav-tabs payment_ui">
                                                @foreach($posts as $key => $row)
                                                <li class=" @if($key == 0) active @endif">
                                                    <a href="#{{ $row->name }}" data-toggle="tab" @if($key == 0) class="active show" @endif>
                                                        <div class="payment-content">
                                                            <div class="payment-img d-flex justify-content-center">
                                                                <img src="{{ asset($row->slug) }}" width="200" alt="">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </nav>
                                        <div class="product-payment-info">
                                            <div class="tab-content">
                                                @php
                                                $stripe=false;
                                                @endphp
                                                @foreach($posts as $key => $row)

                                                @if($row->name != 'stripe')
                                                <div class="tab-pane fade @if($key == 0) in active  show @endif" id="{{ $row->name }}">
                                                    <br>
                                                    <h3>{{ $row->name }} {{ __('Payment Gateway') }}</h3>
                                                    <form method="post" class="basicform_with_next" action="{{ route('agent.make_payment',$info->id) }}">     
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="payment_type" value="{{ $row->id }}"> 
                                                        @if($row->name != 'Paypal' && $row->name != 'Mollie')
                                                        <input type="number" name="phone_number" class="form-control" required placeholder="Enter your phone number">
                                                        @endif                        
                                                        <button type="submit" class="w-100 basicbtn">{{ __('Make Payment with ') }} {{ $row->name }} ({{ $amount }})</button>
                                                    </form>
                                                </div> 
                                                @else
                                                @php
                                                $credintials=json_decode($row->credintial->content);
                                                $stripe=true;
                                                @endphp
                                                 <div class="tab-pane fade @if($key == 0) in active  show @endif" id="{{ $row->name }}">
                                                    <br>
                                                    <input type="hidden" id="stripe_key" value="{{ $credintials->publishable_key }}">
                                                    <h3>{{ __('stripe Payment Gateway') }}</h3>
                                                    <form method="post" class="basicform_with_next" action="{{ route('agent.make_payment',$info->id) }}" id="payment-form">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="payment_type" value="{{ $row->id }}">
                                                        <div id="card-element">
                                                            <!-- Elements will create input elements here -->
                                                        </div>
                                                        <!-- We'll put the error messages in this element -->
                                                        <div id="card-errors" role="alert"></div>
                                                        <button class="w-100 basicbtn" type="submit">{{ __('Make Payment with stripe') }} ({{ $amount }})</button>
                                                        
                                                    </form>
                                                </div>
                                                @endif
                                                @endforeach                                              
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
    </div>
</section>

@endsection
@push('js')
<script src="{{ asset('admin/js/stripe.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush