<!DOCTYPE html>
<html>
@include('theme::newlayouts.partials.top')

<body>
<div id="fade" class="overlay"></div>
<div>
    @include('theme::newlayouts.partials.navbar')
    <main>
        @yield('content')
    </main>
    @include('theme::newlayouts.partials.modals')
    @include ('theme::newlayouts.partials.footer')
    @include ('theme::newlayouts.partials.bottom')
</div>
{{ google_analytics() }}
</body>

</html>