<section>
    <div class="featured-properties-area mb-100 featured-properties-demo-1" id="featured_properties">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="find-agents-title">
                        <div class="left-side-section">
                            <h3 id="featured_properties_title">{{ content('featured_properties','featured_properties_title') }}</h3>
                            <p id="featured_properties_des">{{ content('featured_properties','featured_properties_des') }}</p>
                        </div>
                        <div class="right-side-section">
                            <a href="{{ route(list_page()) }}" id="featured_properties_btn_title">{{ content('featured_properties','featured_properties_btn_title') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured-properties-main-area">
                        <div class="row" id="latest_data">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ route('latest.property') }}" id="f_properties_url">
</section>

