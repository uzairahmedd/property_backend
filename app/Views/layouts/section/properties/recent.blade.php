<section class="mt-100 mb-100">
    <div class="recentproperty recent-demo-2" id="featured_properties">
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
            <div class="row" id="recent_properties">
               
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ route('recent_property.data') }}" id="recent_property_url">
</section>