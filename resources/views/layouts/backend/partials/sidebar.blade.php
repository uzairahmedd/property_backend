 <div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand p-4">
      <a href="{{ url('/') }}"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">{{ Str::limit(env('APP_NAME'), $limit = 1) }}</a>
    </div>
    <ul class="sidebar-menu">

     @foreach(AdminSidebar() as $key => $adminmenus)
     @if(isset($adminmenus['child']))
     @php
     $active  = $adminmenus['active'] ?? '';
     @endphp
     <li class="dropdown {{ $active ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $adminmenus['icon'] ?? 'fas fa-columns' }}"></i> <span>{{ $adminmenus['name'] }}</span></a>
      <ul class="dropdown-menu">
        @foreach($adminmenus['child'] as $ch_key => $adminmenuChild)
        <li @if($adminmenuChild == url()->current()) class="active" @endif><a class="nav-link {{ $adminmenus['class'] ?? '' }}" href="{{ url($adminmenuChild) }}">{{ $ch_key }}</a></li>
        @endforeach
      </ul>
    </li>
    @else

    <li class="@if(url($adminmenus['url']) == url()->full()) active @endif">
      <a class="nav-link {{ $adminmenus['class'] ?? '' }}"  href="{{ url($adminmenus['url']) }}">
        <i class="{{ $adminmenus['icon'] ?? 'fas fa-columns' }}"></i> <span>{{ $adminmenus['name'] }}</span>
      </a>
    </li>
    @endif
    @endforeach
  </aside>
</div>












{{--<!--begin::Aside-->--}}
{{--<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"--}}
{{--     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"--}}
{{--     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"--}}
{{--     data-kt-drawer-toggle="#kt_aside_mobile_toggle">--}}
{{--    <!--begin::Brand-->--}}
{{--    <div class="aside-logo flex-column-auto" id="kt_aside_logo">--}}
{{--        <!--begin::Logo-->--}}
{{--        <a href="{{url('admin/dashboard')}}">--}}
{{--            <img alt="Logo" src="{{asset('admin/assets/media/logos/brand-logo.png')}}" class="h-25px logo"/>--}}
{{--        </a>--}}
{{--        <!--end::Logo-->--}}
{{--        <!--begin::Aside toggler-->--}}
{{--        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"--}}
{{--             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"--}}
{{--             data-kt-toggle-name="aside-minimize">--}}
{{--            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->--}}
{{--            <span class="svg-icon svg-icon-1 rotate-180">--}}
{{--								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                                     fill="none">--}}
{{--									<path opacity="0.5"--}}
{{--                                          d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"--}}
{{--                                          fill="currentColor"/>--}}
{{--									<path--}}
{{--                                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"--}}
{{--                                        fill="currentColor"/>--}}
{{--								</svg>--}}
{{--							</span>--}}
{{--            <!--end::Svg Icon-->--}}
{{--        </div>--}}
{{--        <!--end::Aside toggler-->--}}
{{--    </div>--}}
{{--    <!--end::Brand-->--}}
{{--    <!--begin::Aside menu-->--}}
{{--    <div class="aside-menu flex-column-fluid">--}}
{{--        <!--begin::Aside Menu-->--}}
{{--        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"--}}
{{--             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"--}}
{{--             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"--}}
{{--             data-kt-scroll-offset="0">--}}
{{--            <!--begin::Menu-->--}}
{{--            <div--}}
{{--                class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"--}}
{{--                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">--}}
{{--                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">--}}
{{--									<span class="menu-link">--}}
{{--										<span class="menu-icon">--}}
{{--											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->--}}
{{--											<span class="svg-icon svg-icon-2">--}}
{{--												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                     viewBox="0 0 24 24" fill="none">--}}
{{--													<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"/>--}}
{{--													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"--}}
{{--                                                          fill="currentColor"/>--}}
{{--													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"--}}
{{--                                                          fill="currentColor"/>--}}
{{--													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"--}}
{{--                                                          fill="currentColor"/>--}}
{{--												</svg>--}}
{{--											</span>--}}
{{--                                            <!--end::Svg Icon-->--}}
{{--										</span>--}}
{{--                                        <a class="menu-link active"--}}
{{--                                           href="{{url('admin/dashboard')}}">--}}
{{--													<span class="menu-bullet">--}}
{{--                                            --}}{{--                                            														<span--}}
{{--                                            --}}{{--                                                                                                        class="bullet bullet-dot"></span>--}}
{{--                                            --}}{{--                                            													</span>--}}
{{--                                    <span class="menu-title">Dashboard</span>--}}
{{--                                </a>--}}
{{--									</span>--}}
{{--                </div>--}}
{{--                --}}{{--                <div class="menu-item">--}}
{{--                --}}{{--                    <div class="menu-content pt-8 pb-2">--}}
{{--                --}}{{--                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Crafted</span>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                </div>--}}
{{--                Location Menu--}}
{{--                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
{{--									<span class="menu-link">--}}
{{--										<span class="menu-icon">--}}
{{--											<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->--}}
{{--											<span class="svg-icon svg-icon-2">--}}
{{--												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                     viewBox="0 0 24 24" fill="none">--}}
{{--													<path--}}
{{--                                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"--}}
{{--                                                        fill="currentColor"/>--}}
{{--													<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"--}}
{{--                                                          fill="currentColor"/>--}}
{{--												</svg>--}}
{{--											</span>--}}
{{--                                            <!--end::Svg Icon-->--}}
{{--										</span>--}}
{{--										<span class="menu-title">Locations</span>--}}
{{--										<span class="menu-arrow"></span>--}}
{{--									</span>--}}
{{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/locations/cities')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Cities</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/locations/district')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Districts</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                Real Estate Menu--}}
{{--                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
{{--                    <span class="menu-link">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->--}}
{{--                            <span class="svg-icon svg-icon-2">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                     viewBox="0 0 24 24" fill="none">--}}
{{--                                    <path--}}
{{--                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"--}}
{{--                                        fill="currentColor"/>--}}
{{--                                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"--}}
{{--                                          fill="currentColor"/>--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                            <!--end::Svg Icon-->--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Real Estate</span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </span>--}}
{{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/real-state/property')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Properties</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/real-state/land-block')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Land Blocks</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/real-state/download-csv')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Download CSV</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/real-state/feature')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Features</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/real-state/category')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Categories</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/real-state/input')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Input Options</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                Agents and Users Menu--}}
{{--                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
{{--                    <span class="menu-link">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->--}}
{{--                            <span class="svg-icon svg-icon-2">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                     viewBox="0 0 24 24" fill="none">--}}
{{--                                    <path--}}
{{--                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"--}}
{{--                                        fill="currentColor"/>--}}
{{--                                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"--}}
{{--                                          fill="currentColor"/>--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                            <!--end::Svg Icon-->--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Agents and Users</span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </span>--}}
{{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/agent')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Users</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                Admin and Roles Menu--}}
{{--                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
{{--                    <span class="menu-link">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->--}}
{{--                            <span class="svg-icon svg-icon-2">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                     viewBox="0 0 24 24" fill="none">--}}
{{--                                    <path--}}
{{--                                        d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"--}}
{{--                                        fill="currentColor"/>--}}
{{--                                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"--}}
{{--                                          fill="currentColor"/>--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                            <!--end::Svg Icon-->--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Agents and Roles</span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </span>--}}
{{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/role')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Roles</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="menu-item">--}}
{{--                            <a class="menu-link" href="{{url('/admin/users')}}">--}}
{{--												<span class="menu-bullet">--}}
{{--													<span class="bullet bullet-dot"></span>--}}
{{--												</span>--}}
{{--                                <span class="menu-title">Admins</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--end::Menu-->--}}
{{--        </div>--}}
{{--        <!--end::Aside Menu-->--}}
{{--    </div>--}}
{{--    <!--end::Aside menu-->--}}
{{--</div>--}}
{{--<!--end::Aside-->--}}


















