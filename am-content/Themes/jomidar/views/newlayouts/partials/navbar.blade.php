<div class="home">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="m-logo">
                <a href="#" class="">
                    <img src="{{theme_asset('assets/images/logo.png')}}" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column flex-md-row w-100 align-items-center justify-content-between">
                    @if (Auth::check())
                    <li class="nav-item d-flex align-items-center mb-3 mb-sm-0">

                        <div class="dropdown after-sign-in">
                            <button class="btn dropdown-toggle theme-text-blue font-medium" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::User()->name}}<img src="{{theme_asset('assets/images/avatar.svg')}}" class="ms-3" />
                            </button>
                            <ul class="dropdown-menu after-sign-drop pt-0 mt-0 pb-0 mb-0" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item text-right" href="my_profile">لوحة التحكم<i class="fa-solid fa-house-user"></i></a></li>
                                <li><a class="dropdown-item text-right" href="favorite">المفضلة<i class="fa-solid fa-heart"></i></a></li>
                                <li><a class="dropdown-item text-right" href="auction">إعلاناتي<i class="fa-solid fa-magnifying-glass"></i></a></li>
                                <li><a class="dropdown-item text-right" href="account"> إعدادات الحساب<i class="fa-solid fa-user"></i></a></li>
                                <li><a class="dropdown-item text-right" href="{{ route('agent.logout') }}">تسجيل خروج<i class="fa-solid fa-right-from-bracket"></i></a></li>
                            </ul>
                        </div>

                    </li>
                    @endif
                    @if (Auth::guest())
                    <li class="nav-item d-flex flex-column flex-sm-row align-items-center mb-3 mb-sm-0">

                        <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <span class="nav-link theme-text-blue font-medium"> <a href="#">تسجيل الدخول</a> </span>
                            <img src="{{theme_asset('assets/images/avatar.svg')}}" class="ms-3" />
                        </div>
                        @endif
                        @if (Auth::User())
                        <button class="btn add-btn font-bold theme-text-white d-flex align-items-center my-3 my-sm-0">
                            <a href="step_one">اضف إعلان</a>
                            <img src="{{theme_asset('assets/images/plus.svg')}}" class="ms-3">
                        </button>
                        @else
                        <button class="btn add-btn font-bold theme-text-white d-flex align-items-center my-3 my-sm-0">
                            <a data-bs-toggle="modal" data-bs-target="#contactModal">اضف إعلان</a>
                            <img src="{{theme_asset('assets/images/plus.svg')}}" class="ms-3">
                        </button>

                    </li>
                    @endif
                    <li class="nav-item d-flex align-items-center mb-3 mb-sm-0">
                        <span class="nav-link font-bold theme-text-blue">تحميل التطبيق</span>
                        <img src="{{theme_asset('assets/images/download.svg')}}" class="ms-3" />
                    </li>
                    <li class="nav-item d-flex align-items-center mb-3 mb-sm-0">
                        <span class="nav-link theme-text-blue font-medium"> <a href="property_auction">المزادات</a> </span>
                        <img src="{{theme_asset('assets/images/hammer.svg')}}" class="ms-3" />
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