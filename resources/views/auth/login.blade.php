<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    {{--    <title>{{ env('APP_NAME') }}</title>--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}"/>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Template CSS -->
    {{--    <link href="{{ asset('admin/assets/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />--}}
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>


</head>

<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
<div class="overflow-hidden position-relative {{ session()->has('locale') && session()->get('locale') =='en' ? 'ltr' : 'rtl'}}" id="main-home" data-session="">
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
             style="background: radial-gradient(102.59% 309.05% at 11.74% 193.12%, #CF57BB 0.07%, #292071 51.14%, #2894CF 100%)">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <!--begin::Content-->
                <div class="d-flex flex-row-fluid flex-column text-center p-10 justify-content-center">
                    <!--begin::Logo-->
                    <a href="../../demo1/dist/index.html" class="py-9 mb-5">
                        <img alt="Logo" src="{{asset('assets/images/logo.png')}}" class="h-60px"/>
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #fff;">{{ __('labels.welcome_to') }}<br> {{ __('labels.khiaratee_dashboard') }}
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid py-20">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form method="POST" id="basicform" class="needs-validation" action="{{ route('login') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">{{ __('labels.sign_in_to_khiaratee') }}</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">{{ __('labels.email') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="email" type="email"
                                       class="form-control form-control-solid @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label
                                        class="form-label fw-bolder text-dark fs-6">{{ __('labels.password') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input id="password" type="password"
                                               class="form-control form-control-solid  @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 show-pass"
                                            data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-10 fv-plugins-icon-container">
                                <div class="form-check form-check-custom form-check-solid form-check-inline">
                                    <input type="checkbox" name="remember" class="form-check-input" tabindex="3"
                                           id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold text-gray-700 fs-6"
                                           for="remember-me">{{ __('labels.Remember_Me') }}</label>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">{{ __('labels.login') }}</span>
                                    <span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                            <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="login-copy-right position-relative d-flex d-sm-block flex-column align-items-center">
                <div class="">
                    <h3>{{__('labels.all_right_reserved')}}</h3>
                </div>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
</div>
<!--end::Main-->
<!--begin::Javascript-->
<!-- General JS Scripts -->
<!-- <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script> -->

<!-- Template JS File -->
<!-- <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script> -->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>













