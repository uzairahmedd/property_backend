<div class="home">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="m-logo">
                <a href="/" class="">
                    <img src="{{theme_asset('assets/images/logo.png')}}" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column-reverse flex-md-row w-100 align-items-center justify-content-between">
                     <div class="header-top-right-section f-right">
                         <li class="nav-item mynavbar lang-txt d-flex">
                             <i class="fa-solid fa-globe d-flex justify-content-center align-items-center"></i>
                             <a class="nav-link lang" id="lang">{{ session()->get('locale') == "ar" ? "English" : "عربي" }}</a>
                         </li>
                    </div>
                    @if (Auth::check())
                    <li class="nav-item d-flex align-items-center mb-3 mb-md-0">

                        <div class="dropdown after-sign-in">
                            <button class="btn dropdown-toggle theme-text-blue font-medium" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::User()->name}}<img src="{{theme_asset('assets/images/avatar.svg')}}" class="ms-3" />
                            </button>
                            <ul class="dropdown-menu after-sign-drop pt-0 mt-0 pb-0 mb-0" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item text-right" href="{{ route('agent.profile.settings') }}">{{__('labels.dashboard')}}<i class="fa-solid fa-house-user"></i></a></li>
                                <li><a class="dropdown-item text-right" href="{{ route('agent.property.userboard_favorite') }}">{{__('labels.favorite')}} <i class="fa-regular fa-heart"></i></a></li>
                                <li><a class="dropdown-item text-right" href="{{ route('agent.property.property_list') }}">{{__('labels.my_properties')}} <i class="fa-solid fa-magnifying-glass"></i></a></li>
                                <li><a class="dropdown-item text-right" href="{{ route('agent.profile.account') }}">{{__('labels.account_setting')}} <i class="fa-solid fa-user"></i></a></li>
                                <li><a class="dropdown-item text-right" href="{{ route('agent.logout') }}">{{__('labels.log_out')}} <i class="fa-solid fa-right-from-bracket"></i></a></li>
                            </ul>
                        </div>

                    </li>
                    @endif

                    <li class="nav-item d-flex flex-column flex-md-row align-items-center mb-3 mb-md-0">
                       @if (Auth::guest())
                        <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#login_modal">
                            <span class="nav-link theme-text-blue font-medium"> <a href="#">{{__('labels.sign_in')}}</a> </span>
                            <img src="{{theme_asset('assets/images/avatar.svg')}}" class="nav-icons" />
                        </div>
                        @endif
                        @if (Auth::User())
                        <button class="btn add-btn custom-btn font-bold theme-text-white d-flex align-items-center my-3 my-sm-0">
                            <a href="{{ route('agent.property.create_property') }}">{{__('labels.add_property')}}</a>
                            <img src="{{theme_asset('assets/images/plus.svg')}}" class="nav-icons">
                        </button>
                        @else
                        <button class="btn add-btn custom-btn font-bold theme-text-white d-flex align-items-center my-3 my-sm-0">
                            <a href="{{ route('phone_verification') }}">{{__('labels.add_property')}}</a>
                            <img src="{{theme_asset('assets/images/plus.svg')}}" class="nav-icons">
                        </button>
                        @endif

                    </li>
                    <li class="nav-item d-flex align-items-center mb-3 mb-md-0">
                        <div class="dropdown">
                            <ul class="dropdown-menu drop-download-app" aria-labelledby="download-app">
                               <h3>{{__('labels.download_app_now')}}</h3>
                                <p>{{__('labels.download_my_options')}}</p>
                                <div class="app-download-img d-flex justify-content-around flex-wrap">
                                    <div class="drop-google-img"><img src="{{asset('assets/images/google-store.png')}}" alt=""></div>
                                    <div class="drop-apple-img"><img src="{{asset('assets/images/google-store.png')}}" alt=""></div>
                                </div>
                            </ul>
                            <span class="nav-link font-bold theme-text-blue dropdown-toggle download-app" id="download-app" data-bs-toggle="dropdown" aria-expanded="false">{{__('labels.download_app_top')}}</span>
                        </div>
                        <img src="{{theme_asset('assets/images/download.svg')}}" class="nav-icons" />
                    </li>
                    <li class="nav-item d-flex align-items-center mb-3 mb-md-0">
                        <span class="nav-link theme-text-blue font-medium"> <a href="#">{{__('labels.auction')}}</a> </span>
                        <img src="{{theme_asset('assets/images/hammer.svg')}}" class="ms-2" />
                    </li>
                    <li class="logo d-none d-lg-block">
                        <a href="/" class="">
                            <img src="{{theme_asset('assets/images/logo.png')}}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
