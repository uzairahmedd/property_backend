{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--  <meta charset="UTF-8">--}}
{{--  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">--}}
{{--  <title>{{ env('APP_NAME') }}</title>--}}
{{--  <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--  <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}"/>--}}
{{--  <!-- General CSS Files -->--}}
{{--  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">--}}
{{--  <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">--}}

{{--  <!-- Template CSS -->--}}
{{--  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">--}}
{{--  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">--}}
{{--</head>--}}

{{--<body>--}}
{{--  <div id="app">--}}
{{--    <section class="section">--}}
{{--      <div class="container mt-5">--}}
{{--        <div class="row">--}}
{{--          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">--}}
{{--            <div class="login-brand" >--}}
{{--              <a href="/">--}}
{{--            <img src="{{theme_asset('assets/images/logo.png')}}" alt=""></a>--}}
{{--              <!-- <img src="{{ asset('uploads/logo.png') }}" alt="logo" class="shadow-light"> -->--}}
{{--            </div>--}}
{{--            <div class="card card-primary">--}}
{{--              <div class="card-header"><h4>{{ __('labels.login') }}</h4></div>--}}
{{--              <div class="card-body">--}}
{{--               <form method="POST" id="basicform" class="needs-validation" action="{{ route('login') }}">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                  <label for="email">{{ __('labels.email') }}</label>--}}
{{--                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >--}}
{{--                  @error('email')--}}
{{--                  <div class="invalid-feedback">--}}
{{--                    {{ $message }}--}}
{{--                  </div>--}}
{{--                  @enderror--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                  <!-- <div class="d-block">--}}
{{--                    <label for="password" class="control-label">{{ __('labels.password') }}</label>--}}
{{--                    @if (Route::has('password.request'))--}}
{{--                    <div class="float-right">--}}
{{--                      <a href="{{ route('password.request') }}" class="text-small">--}}
{{--                        {{ __('labels.forgot_password') }}--}}
{{--                      </a>--}}
{{--                    </div>--}}
{{--                    @endif--}}
{{--                  </div> -->--}}
{{--                  <label for="Password">{{ __('labels.password') }}</label>--}}
{{--                  <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}
{{--                  @error('password')--}}
{{--                  <div class="invalid-feedback">--}}
{{--                    {{ $message }}--}}
{{--                  </div>--}}
{{--                  @enderror--}}
{{--                  <div class="form-group">--}}
{{--                    <div class="custom-control custom-checkbox">--}}
{{--                     <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                     <label class="custom-control-label" for="remember-me">{{ __('labels.Remember_Me') }}</label>--}}
{{--                   </div>--}}
{{--                 </div>--}}
{{--                 <div class="form-group">--}}
{{--                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">--}}
{{--                      {{ __('labels.login') }}--}}
{{--                  </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--          <div class="simple-footer">--}}
{{--              {{__('labels.all_right_reserved')}}--}}
{{--            <!-- {{ __('Copyright') }} &copy; {{ env('APP_NAME') }} {{ date('Y') }} -->--}}
{{--          </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}
{{--</div>--}}

{{--<!-- General JS Scripts -->--}}
{{--<script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>--}}

{{--<!-- Template JS File -->--}}
{{--<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}


    <!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../">
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8"/>
    {{--    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />--}}
    {{--    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />--}}
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/new_css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
<!--begin::Root-->
<div id="app">
    <section class="section">
        <div class="d-flex flex-column flex-root">
            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Aside-->
                <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                     style="background: radial-gradient(102.59% 309.05% at 11.74% 193.12%, #CF57BB 0.07%, #292071 51.14%, #2894CF 100%);">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px">
                        <!--begin::Content-->
                        <div class="d-flex flex-row-fluid justify-content-center align-items-center flex-column text-center p-10 pt-lg-20">
                            <!--begin::Logo-->
                            <a href="../../demo1/dist/index.html" class="py-9 mb-5">
                                <img alt="Logo" src="{{asset('admin/assets/media/logos/brand-logo.png')}}"
                                     class="h-60px"/>
                            </a>
                            <!--end::Logo-->
                            <!--begin::Title-->
                            <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #fff;"> {{ __('labels.welcome_to') }} <br> {{ __('labels.khiaratee_dashboard') }}</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
{{--                            <p class="fw-bold fs-2" style="color: #fff;">--}}
{{--                                <br/>FIND YOUR IDEAL HOME, PROPERTIES, HOUSES AND APARTMENTS FOR BUY, SELL OR ALSO--}}
{{--                                DISCOVER RENTAL PROPERTIES AND SEE HOME VALUES.</p>--}}
                            <!--end::Description-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid py-18">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column flex-column-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                            <!--begin::Form-->
                            <form method="POST" id="basicform" class="needs-validation form w-100"
                                  action="{{ route('login') }}">
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
                                           class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus>
                                    @error('email')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="email" data-validator="notEmpty">
                                            {{ $message }}
                                        </div>
                                    </div>
                                    @enderror
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

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
                                                   class="form-control form-control-lg form-control-solid  @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password">
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
                                        </div>
                                        <!--end::Input wrapper-->
                                        <!--begin::Meter-->
{{--                                        <div class="d-flex align-items-center mb-3"--}}
{{--                                             data-kt-password-meter-control="highlight">--}}
{{--                                            <div--}}
{{--                                                class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>--}}
{{--                                            <div--}}
{{--                                                class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>--}}
{{--                                            <div--}}
{{--                                                class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>--}}
{{--                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>--}}
{{--                                        </div>--}}
                                        <!--end::Meter-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Hint-->
{{--                                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers--}}
{{--                                        &amp; symbols.--}}
{{--                                    </div>--}}
                                    <!--end::Hint-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                {{--remember password--}}
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <div class="form-check form-check-custom form-check-solid form-check-inline custom-control custom-checkbox">
                                        <input type="checkbox" name="remember"
                                               class="custom-control-input form-check-input" tabindex="3"
                                               id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-gray-700 fs-6">{{ __('labels.Remember_Me') }}</label>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <!--begin::Submit button-->
                                    <button type="submit" id="kt_sign_in_submit"
                                            class="btn btn-lg btn-primary w-100 mb-5">
                                        {{ __('labels.login') }}
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
                    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                        <!--begin::Links-->
                        <div class="d-flex flex-center fw-bold fs-6">
                            <a href="https://mychoice.sa/" class="text-muted text-hover-primary px-2" target="_blank">
                                {{__('labels.all_right_reserved')}}
                            </a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
    </section>
</div>
<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('admin/assets/new_js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('admin/assets/new_js/custom/authentication/sign-in/general.js')}}"></script>
<!--end::Page Custom Javascript-->
{{--<!-- Template JS File -->--}}
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>




