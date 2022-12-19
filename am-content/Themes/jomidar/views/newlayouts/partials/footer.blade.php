<div class="footer">
    <div class="container">
        <div class="d-flex flex-column-reverse flex-xl-row align-items-center justify-content-center">
            <ul class="list-unstyled d-flex flex-sm-column-reverse flex-column flex-wrap flex-md-row-reverse justify-content-right align-items-center p-0 mt-4 me-lg-5 col-lg-9">
                <li>
                    <a href="{{ route('list') }}">{{__('labels.search')}}</a>
                </li>
                <li>
                    <a href="{{ route('list', ['status' => '26']) }}">{{__('labels.ads_sale')}}</a>
                </li>
                <li>
                    <a href="{{ route('list', ['status' => '27']) }}">{{__('labels.ads_rent')}}</a>
                </li>
                <li>
                    <a href="#">{{__('labels.auction')}}</a>
                </li>
                <li>
                    <a href="/privacy_policy">{{__('labels.privacy_term')}}</a>
                </li>
                <li>
                    <a href="/terms_and_conditions">{{__('labels.term_use')}}</a>
                </li>
                <li>
                    <a href="#">{{__('labels.terms_of_advertising')}}</a>
                </li>
                <li>
                    <a href="#">{{__('labels.complain')}}</a>
                </li>
            </ul>
            <img src="{{theme_asset('assets/images/logo.png')}}"
                 class="col-7 col-lg footer-logo img-fluid mb-3 mb-xl-0" alt="">
        </div>
    </div>
    <!-- Miin Footer Starts Here -->
    <div class="mini-footer">
        <div class="container">
            <div class="d-flex flex-column-reverse flex-sm-row justify-content-between align-items-center">
                <div class="social-links d-flex flex-column align-items-end">
                    <h3>{{__('labels.follow_us')}}</h3>
                    <div class="d-flex">
                        <img src="{{asset('assets/images/facebook.svg')}}" alt="">
                        <img src="{{asset('assets/images/insta.png')}}" alt="">
                        <img src="{{asset('assets/images/linkedin.svg')}}" alt="">
                        <img class="twitter" src="{{asset('assets/images/twitter.svg')}}" alt="">
                        <img src="{{asset('assets/images/youtube.png')}}" alt="">
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <h3>{{__('labels.real_estate_licensed')}}</h3>
                    <img src="{{asset('assets/images/Khiaratee-slogan.png')}}" class="ms-3" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Miin Footer Ends Here -->
</div>
<div class="copy-right position-relative d-flex d-sm-block flex-column align-items-center">
    <div class="">
        <h3>{{__('labels.all_right_reserved')}}</h3>
    </div>
    <div class="arrow-top d-flex align-items-center justify-content-center" onclick="scrollToTop()">
        <img src="{{asset('assets/images/arrow-up.svg')}}" alt="" class="img-fluid">
    </div>
</div>
