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
                            <h2>{{ __('Contact Us') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Contact Us') }}</li>
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

<!-- contact area start -->
<div class="contact-area mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                 
                <form action="{{ route('contact.store') }}" method="POST" id="contactform">
                    @csrf
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-main-title text-center">
                                    <h3>{{ __('Contact Us') }}</h3>
                                    <p>{{ __('Lorem ipsum dolor, sit amet consectetur adipisicing elit.') }}</p>
                                </div>
                            </div>
                        </div>
                        

                        @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" placeholder="{{ __('Enter Your Name') }}" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" placeholder="{{ __('Enter Your Email') }}" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Subject') }}</label>
                                    <input type="text" placeholder="{{ __('Enter Your Subject') }}" class="form-control" name="subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Message') }}</label>
                                    <textarea name="message" cols="30" rows="8" placeholder="{{ __('Message') }}" class="form-control"></textarea>
                                </div>
                            </div>
                            @if(env('NOCAPTCHA_SITEKEY') != null)
                            <div class="col-lg-12">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}

                                
                            </div>
                            @endif    
                            <div class="col-lg-12">
                                <button type="submit" class="basicbtn">{{ __('Send Message') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- contact area end -->
@endsection

@push('js')
    <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>

@endpush