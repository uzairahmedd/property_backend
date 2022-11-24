<!DOCTYPE html>
<html>
@include('theme::newlayouts.partials.top')

<body>
    <div id="fade" class="overlay"></div>
    <input type="hidden" id="base_url" value="{{ asset('/') }}">
    <input type="hidden" id="asset_url" value="{{ asset('/') }}">
    <input type="hidden" value="{{ route('property.favourite') }}" id="favourite_property_url">
    <input type="hidden" id="favourite_check_url" value="{{ route('favourite.check') }}">

    <input type="hidden" class="currency_name" value="USD">
    <input type="hidden" class="currency_icon" value="$">
    <input type="hidden" class="currency_rate" value="1">
    <input type="hidden" class="currency_position" value="left">
    <div>
        @include('theme::newlayouts.partials.navbar')
        <main>
            @yield('content')
        </main>
        @include('theme::newlayouts.partials.modals')
        @include ('theme::newlayouts.partials.footer')
        @include ('theme::newlayouts.partials.bottom')
        @yield('dropdown-select');
        @yield('property_list_select');
        @yield('property_create');
        @yield('OTPScript')
    </div>
    {{ google_analytics() }}
</body>

</html>