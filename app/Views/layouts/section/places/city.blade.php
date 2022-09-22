<!-- city area start -->
<section id="find_city">
    <div class="city-area city-demo-2 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="find-agents-title">
                        <div class="left-side-section">
                            <h3 id="find_city_title">{{ content('find_city','find_city_title') }}</h3>
                            <p id="find_city_des">{{ content('find_city','find_city_des') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row city-demo-two" id="city_append">
                
            </div>
        </div>
    </div>
    <input type="hidden" id="city_url" value="{{ route('city.data') }}">
</section>
<!-- city area end -->