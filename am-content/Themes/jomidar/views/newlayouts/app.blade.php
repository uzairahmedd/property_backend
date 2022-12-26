<!DOCTYPE html>
<html>
@include('theme::newlayouts.partials.top')

<body>
<div class="overflow-hidden position-relative {{ session()->has('locale') && session()->get('locale') =='en' ? 'rtl' : 'ltr'}}" id="main-home" data-session="">
    <input type="hidden" id="base_url" value="{{ asset('/') }}">
    <input type="hidden" id="asset_url" value="{{ asset('/') }}">
    <input type="hidden" value="{{ route('property.favourite') }}" id="favourite_property_url">
    <input type="hidden" id="favourite_check_url" value="{{ route('favourite.check') }}">
    <input type="hidden" class="locale" value="{{ Session::has('locale') ? Session::get('locale') : 'ar' }}">
    <!-- <input type="hidden" class="currency_name" value="Riyal">
    <input type="hidden" class="currency_icon" value="SAR">
    <input type="hidden" class="currency_rate" value="1">
    <input type="hidden" class="currency_position" value="left"> -->
    <div>
        @include('theme::newlayouts.partials.navbar')
        <main>
            @yield('content')
        </main>
        @include('theme::newlayouts.partials.modals')
        @include ('theme::newlayouts.partials.footer')
        @include ('theme::newlayouts.partials.bottom')
        @yield('home_js')
        @yield('property_list_select')
        @yield('account_js')
        @yield('favorite_properties')
        @yield('property_create')
        @yield('yearpicker')
        @yield('OTPScript')
    </div>
    {{ google_analytics() }}
    </div>
</body>

</html>
