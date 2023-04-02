<input type="hidden" id="base_url" value="{{ url('/') }}">
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto menu-icons">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li> -->
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img src="{{ asset('https://ui-avatars.com/api/?name='.Auth::user()->name) }}" alt=""
                     class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ __('labels.Hi') }}, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.admin.mysettings') }}" class="dropdown-item has-icon">
                   <div class="d-lg-inline-block nav-link top-drop">
                       <i class="far fa-user "></i> {{ __('labels.profile') }}
                   </div>
                </a>
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user lang">
                    <div class="d-lg-inline-block nav-link admin-lang top-drop"
                         id="admin_lang"><i class="fa fa-globe lang-change-icon" aria-hidden="true"></i><span class="lang-span">{{ session()->get('locale') == "ar" ? "English" : "عربي" }}</span></div>
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                    <div class="d-lg-inline-block nav-link top-drop">
                        <i class="fas fa-sign-out-alt"></i> {{ __('labels.logout') }}
                    </div>

                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        {{--        <li class="dropdown">--}}
        {{--            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user lang">--}}

        {{--                <div class="d-lg-inline-block nav-link admin-lang" id="admin_lang">{{ session()->get('locale') == "ar" ? "English" : "عربي" }}</div>--}}
        {{--            </a>--}}
        {{--        </li>--}}
    </ul>
</nav>


{{--<input type="hidden" id="base_url" value="{{ url('/') }}">--}}
{{--<!--begin::Header-->--}}
{{--<div id="kt_header" style="" class="header align-items-stretch">--}}
{{--    <!--begin::Container-->--}}
{{--    <div class="container-fluid d-flex align-items-stretch justify-content-between">--}}
{{--        <!--begin::Aside mobile toggle-->--}}
{{--        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">--}}
{{--            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">--}}
{{--                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->--}}
{{--                <span class="svg-icon svg-icon-1">--}}
{{--										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />--}}
{{--											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />--}}
{{--										</svg>--}}
{{--									</span>--}}
{{--                <!--end::Svg Icon-->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--end::Aside mobile toggle-->--}}
{{--        <!--begin::Mobile logo-->--}}
{{--        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">--}}
{{--            <a href="../../demo1/dist/index.html" class="d-lg-none">--}}
{{--                <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-30px" />--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <!--end::Mobile logo-->--}}
{{--        <!--begin::Wrapper-->--}}
{{--        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">--}}
{{--            <!--begin::Navbar-->--}}
{{--            <div class="d-flex align-items-stretch" id="kt_header_nav">--}}
{{--                <!--begin::Menu wrapper-->--}}
{{--                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}"></div>--}}
{{--                <!--end::Menu wrapper-->--}}
{{--            </div>--}}
{{--            <!--end::Navbar-->--}}
{{--            <!--begin::Toolbar wrapper-->--}}
{{--            <div class="d-flex align-items-stretch flex-shrink-0">--}}
{{--                --}}{{--                <!--begin::Search-->--}}
{{--                --}}{{--                <div class="d-flex align-items-stretch ms-1 ms-lg-3">--}}
{{--                --}}{{--                    <!--begin::Search-->--}}
{{--                --}}{{--                    <div id="kt_header_search" class="header-search d-flex align-items-stretch" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-overflow="false" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">--}}
{{--                --}}{{--                        <!--begin::Search toggle-->--}}
{{--                --}}{{--                        <div class="d-flex align-items-center" data-kt-search-element="toggle" id="kt_header_search_toggle">--}}
{{--                --}}{{--                            <div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px">--}}
{{--                --}}{{--                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->--}}
{{--                --}}{{--                                <span class="svg-icon svg-icon-1">--}}
{{--                --}}{{--														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                --}}{{--															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />--}}
{{--                --}}{{--															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />--}}
{{--                --}}{{--														</svg>--}}
{{--                --}}{{--													</span>--}}
{{--                --}}{{--                                <!--end::Svg Icon-->--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                        </div>--}}
{{--                --}}{{--                        <!--end::Search toggle-->--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <!--end::Search-->--}}
{{--                --}}{{--                </div>--}}
{{--                --}}{{--                <!--end::Search-->--}}
{{--                <!--begin::User menu-->--}}
{{--                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">--}}
{{--                    <!--begin::Menu wrapper-->--}}
{{--                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">--}}
{{--                        <img src="{{ asset('https://ui-avatars.com/api/?name='.Auth::user()->name) }}" alt="user" />--}}
{{--                    </div>--}}
{{--                    <!--begin::User account menu-->--}}
{{--                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">--}}
{{--                        <!--begin::Menu item-->--}}
{{--                        <div class="menu-item px-3">--}}
{{--                            <div class="menu-content d-flex align-items-center px-3">--}}
{{--                                <!--begin::Avatar-->--}}
{{--                                <div class="symbol symbol-50px me-5">--}}
{{--                                    <img alt="Logo" src="{{ asset('https://ui-avatars.com/api/?name='.Auth::user()->name) }}" />--}}
{{--                                </div>--}}
{{--                                <!--end::Avatar-->--}}
{{--                                <!--begin::Username-->--}}
{{--                                <div class="d-flex flex-column">--}}
{{--                                    <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }}--}}
{{--                                        --}}{{--                                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>--}}
{{--                                        --}}{{--                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Username-->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Menu item-->--}}
{{--                            <!--begin::Menu separator-->--}}
{{--                            <div class="separator my-2"></div>--}}
{{--                            <!--end::Menu separator-->--}}
{{--                            <!--begin::Menu item-->--}}
{{--                            <div class="menu-item px-5">--}}
{{--                                <a href="{{ route('admin.admin.mysettings') }}" class="menu-link px-5">{{ __('labels.profile') }}</a>--}}
{{--                            </div>--}}
{{--                            <!--end::Menu item-->--}}

{{--                            <!--begin::Menu item-->--}}
{{--                            <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">--}}
{{--                                <a href="#" class="menu-link px-5">--}}
{{--													<span class="menu-title position-relative">Language--}}
{{--													<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English--}}
{{--													<img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>--}}
{{--                                </a>--}}
{{--                                <!--begin::Menu sub-->--}}
{{--                                <div class="menu-sub menu-sub-dropdown w-175px py-4">--}}
{{--                                    <!--begin::Menu item-->--}}
{{--                                    <div class="menu-item px-3">--}}
{{--                                        <a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5 active">--}}
{{--														<span class="symbol symbol-20px me-4">--}}
{{--															<img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />--}}
{{--														</span>English</a>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Menu item-->--}}
{{--                                    <!--begin::Menu item-->--}}
{{--                                    <div class="menu-item px-3">--}}
{{--                                        <a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5">--}}
{{--														<span class="symbol symbol-20px me-4">--}}
{{--															<img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />--}}
{{--														</span>Hindi</a>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Menu item-->--}}
{{--                                </div>--}}
{{--                                <!--end::Menu sub-->--}}
{{--                            </div>--}}
{{--                            <!--end::Menu item-->--}}
{{--                            <!--begin::Menu item-->--}}
{{--                            <div class="menu-item px-5">--}}
{{--                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link px-5">{{ __('labels.logout') }}</a>--}}
{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <!--end::Menu item-->--}}
{{--                        </div>--}}
{{--                        <!--end::User account menu-->--}}
{{--                        <!--end::Menu wrapper-->--}}
{{--                    </div>--}}
{{--                    <!--end::User menu-->--}}
{{--                    <!--begin::Header menu toggle-->--}}
{{--                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">--}}
{{--                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">--}}
{{--                            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->--}}
{{--                            <span class="svg-icon svg-icon-1">--}}
{{--												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--													<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="currentColor" />--}}
{{--													<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="currentColor" />--}}
{{--												</svg>--}}
{{--											</span>--}}
{{--                            <!--end::Svg Icon-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--end::Header menu toggle-->--}}
{{--                </div>--}}
{{--                <!--end::Toolbar wrapper-->--}}
{{--            </div>--}}
{{--            <!--end::Wrapper-->--}}
{{--        </div>--}}
{{--        <!--end::Container-->--}}
{{--    </div>--}}
{{--    <!--end::Header-->--}}
