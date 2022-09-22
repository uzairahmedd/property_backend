<section id="find_city">
    @if (isset($class))
    <div class="place-area {{ $class }}">
    @else
    <div class="place-area place-demo-1" id="find_city_bg_img" style="background-image: url({{ content('find_city','find_city_bg_img') }});">
    @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured-properties-title text-center">
                        <h3 id="find_city_title">{{ content('find_city','find_city_title') }}</h3>
                        <p id="find_city_des">{{ content('find_city','find_city_des') }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4" id="city_append">
                
            </div>
        </div>
    </div>
    <input type="hidden" id="city_url" value="{{ route('city.data') }}">
</section>