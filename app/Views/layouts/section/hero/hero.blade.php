<section id="hero">
    <div class="hero-area" id="hero_background_img" style="background-image: url({{ asset(content('hero','hero_background_img')) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-content">
                        <div class="slider-main-content text-center">
                            <h1 id="hero_big_title">{{ content('hero','hero_big_title') }}</h1>
                            <p id="hero_des">{{ content('hero','hero_des') }}</p>
                            <form action="{{ url(list_page()) }}">
                            <div class="slider-menu-area">
                                <nav>
                                    <ul>
                                        @foreach($status as $key => $row)
                                        <li @if($key == 0) class="active" @endif><label for="status{{ $key }}">{{ $row->name }} <input type="radio" name="status" id="status{{ $key }}" value="{{ $row->id }}" class="d-none"></label></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                            <div class="slider-search-area">
                                <div class="slider-search-content">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="location-input">
                                                <div class="location-input-area">
                                                    <input type="text" name="src" id="hero_address_placeholder" placeholder="{{ content('hero','hero_address_placeholder') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="slider-select-form" >
                                                <select name="category" class="selectric">
                                                   @foreach($categories as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="slider-select-form">
                                                <select name="state" class="selectric">
                                                    @foreach($states as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="location-input-area price">
                                               <input type="number" step="any" name="min_price" placeholder="{{ __('Price') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="slider-search-btn">
                                                <button type="submit" id="hero_search_btn">{{ content('hero','hero_search_btn') }}</button>
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
</section>
