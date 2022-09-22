<section id="hero">
    <div class="hero-area hero-demo-2" id="hero_background_img" style="background-image: url('{{ content('hero','hero_background_img') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content">
                        <div class="slider-content-main-area">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="content-slider">
                                        <h2 id="hero_big_title">{{ content('hero','hero_big_title') }}</h2>
                                        <p id="hero_des">{{ content('hero','hero_des') }}</p>
                                        <a id="hero_btn_link" href="{{ content('hero','hero_btn_link') }}" ><span id="hero_btn_title">{{ content('hero','hero_btn_title') }}</span></a>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <form action="{{ route(list_page()) }}">
                                        <div class="slider-right-section">
                                            <div class="slider-search-area">
                                                <div class="slider-search-content">
                                                    @php
                                                        $statuses = App\Category::where('type','status')->where('featured',1)->take(4)->get();
                                                    @endphp
                                                    <div class="row">
                                                        <div class="col-lg-12 mb-30">
                                                            <div class="location-input">
                                                                <div class="location-input-area">
                                                                    <input type="text" id="hero_address_placeholder" placeholder="{{ content('hero','hero_address_placeholder') }}" name="src">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-30">
                                                            <div class="slider-select-form">
                                                                <select name="status" class="selectric">
                                                                    <option disabled selected>{{ __('Property Status') }}</option>
                                                                    @foreach ($statuses as $value)
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-30">
                                                            <div class="location-input">
                                                                <div class="location-input-area">
                                                                    <input type="number"  placeholder="{{ __('Min Price') }}" name="min_price">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 mb-30">
                                                            <div class="location-input">
                                                                <div class="location-input-area">
                                                                    <input type="number"  placeholder="{{ __('Max Price') }}" name="max_price">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="slider-search-btn">
                                                                <button type="submit" id="hero_search_btn">{{ content('hero','hero_search_btn') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
