@extends('theme::layouts.app')

@section('title','Edit Profile')

@section('content')
 <!-- hero area start -->
 <section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Edit Profile') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Edit Profile') }}</li>
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
                                        <h5>{{ __('Edit Profile') }}</h5>
                                    </div>
                                    <div class="widget-card-body">
                                        <div class="widget-form">
                                            @php
                                                $info = json_decode(Auth::User()->usermeta->content ?? '');
                                            @endphp
                                            <form action="{{ route('agent.profile.settings.update') }}" method="POST" id="settingsform">
                                                @csrf
                                                <br>
                                                <h6>{{ __('General Settings') }}</h6>
                                                <hr>
                                                <div class="form-group">
                                                    <label>{{ __('Name') }}</label>
                                                    <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="name" value="{{ Auth::User()->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Email') }}</label>
                                                    <input type="email" placeholder="{{ __('Email') }}" class="form-control" name="email" value="{{ Auth::User()->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Phone Number') }}</label>
                                                    <input type="number" placeholder="{{ __('Phone Number') }}" class="form-control" name="phone" value="{{ $info->phone ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Address') }}</label>
                                                    <textarea name="address" cols="30" rows="5" class="form-control">{{ $info->address ?? '' }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Description') }}</label>
                                                    <textarea name="description" cols="30" rows="5" class="form-control">{{ $info->description ?? '' }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Facebook Link') }}</label>
                                                    <input type="text" placeholder="{{ __('Facebook Link') }}" name="facebook" class="form-control" value="{{ $info->facebook ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Twitter Link') }}</label>
                                                    <input type="text" placeholder="{{ __('Twitter Link') }}" name="twitter" class="form-control" value="{{ $info->twitter ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Instagram Link') }}</label>
                                                    <input type="text" placeholder="{{ __('Instagram Link') }}" name="instagram" class="form-control" value="{{ $info->instagram ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Youtube Link') }}</label>
                                                    <input type="text" placeholder="{{ __('Youtube Link') }}" name="youtube" class="form-control" value="{{ $info->youtube ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Pinterest Link') }}</label>
                                                    <input type="text" placeholder="{{ __('Pinterest Link') }}" name="pinterest" class="form-control" value="{{ $info->pinterest ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Linkedin Link') }}</label>
                                                    <input type="text" placeholder="{{ __('Linkedin Link') }}" name="linkedin" class="form-control" value="{{ $info->linkedin ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Whatsapp Phone Number') }}</label>
                                                    <input type="text" placeholder="{{ __('Whatsapp Phone Number') }}" name="whatsapp" class="form-control" value="{{ $info->whatsapp ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Tax Number') }}</label>
                                                    <input type="text" placeholder="{{ __('Tax Number') }}" name="tax_number" class="form-control" value="{{ $info->tax_number ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('License Number') }}</label>
                                                    <input type="text" placeholder="{{ __('License Number') }}" name="license" class="form-control" value="{{ $info->license ?? '' }}">
                                                </div>
                                                <br>
                                                <h6>{{ __('Password Change') }}</h6>
                                                <hr>
                                                <div class="form-group">
                                                    <label>{{ __('Current Password') }}</label>
                                                    <input type="password" class="form-control" placeholder="{{ __('Current Password') }}" name="current_password">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Password') }}</label>
                                                    <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Confirmation Password') }}</label>
                                                    <input type="password" class="form-control" placeholder="{{ __('Confirmation Password') }}" name="password_confirmation">
                                                </div>
                                                <button class="basicbtn" type="submit">{{ __('Submit') }}</button>
                                            </form>
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
    <script src="{{ theme_asset('assets/js/agent/settings.js') }}"></script>
@endpush