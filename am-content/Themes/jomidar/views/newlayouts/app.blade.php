<!DOCTYPE html>
<html>
@include('theme::newlayouts.partials.top')

<body>
<div id="fade" class="overlay"></div>
<input type="hidden" id="base_url" value="{{ asset('/') }}">
<div>
    @include('theme::newlayouts.partials.navbar')
    <main>
        @yield('content')
    </main>
    @include('theme::newlayouts.partials.modals')
    @include ('theme::newlayouts.partials.footer')
    @include ('theme::newlayouts.partials.bottom')
    @yield('OTPScript')
</div>
{{ google_analytics() }}
</body>

</html>