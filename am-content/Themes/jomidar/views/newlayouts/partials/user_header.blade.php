<div class="col-9 mx-auto profile">
    <div class="row mb-4_5 d-flex flex-column-reverse flex-lg-row card personal-card justify-content-between align-items-right align-items-lg-center">
        <div class="col-lg-4 col-md-4 d-flex flex-column align-items-end">
            <span class="font-16 theme-text-sky">رقم الجوال</span>
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/images/tick-verified.png')}}" alt="">
                <h3 class="font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->phone ?? 'N/A' }}</h3>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-flex flex-column align-items-end">
            <span class="font-16 theme-text-sky">مسجل منذ</span>
            <h3 class="font-24 font-medium theme-text-blue mb-0 ms-2">{{ Auth::User()->created_at->format('m/d/Y') }}</h3>
        </div>
        <div class="col-lg-4 col-md-4 d-flex align-items-center flex-column-reverse flex-lg-row">
            <div class="col d-flex flex-column align-items-end text-sm-right welcome justify-content-end">
                <span class="font-16 theme-text-sky">أهلا بك,</span>
                <h3 class="font-24 font-medium theme-text-blue align-items-end mb-0 ms-2">{{ Auth::User()->name }}</h3>
            </div>
            <div class="dp-elipse ms-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/avatar.png')}}" alt="">
            </div>
        </div>
    </div>
</div>