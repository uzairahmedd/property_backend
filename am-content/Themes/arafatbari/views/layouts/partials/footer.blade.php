<footer>
    <div class="footer-area footer-demo-1" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-left-area">
                        <div class="footer-logo">
                            <img id="footer_image" src="{{ asset(content('footer','footer_image')) }}" alt="">
                            <div class="footer-content">
                                <p id="footer_des">{{ content('footer','footer_des') }}</p>
                            </div>
                            <div class="agent-social-links">
                                <nav>
                                    <ul>
                                        <li><a href="#"><span class="iconify" data-icon="ri:facebook-fill" data-inline="false"></span></a></li>
                                        <li><a href="#"><span class="iconify" data-icon="ri:twitter-fill" data-inline="false"></span></a></li>
                                        <li><a href="#"><span class="iconify" data-icon="ri:google-fill" data-inline="false"></span></a></li>
                                        <li><a href="#"><span class="iconify" data-icon="ri:instagram-fill" data-inline="false"></span></a></li>
                                        <li><a href="#"><span class="iconify" data-icon="ri:pinterest-fill" data-inline="false"></span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-menu">
                        {{ MenuCustom('Footer_left','','','','',true) }}
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-menu">
                        {{ MenuCustom('Footer_right','','','','',true) }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="{{ route('mailchamp.store') }}" method="POST" id="mailchimp_form">
                        @csrf
                        <div class="footer-newsletter">
                            <div class="footer-menu-title">
                                <h4 id="footer_right_title">{{ content('footer','footer_right_title','footer_right') }}</h4>
                            </div>
                            <div class="footer-content">
                                <p id="footer_right_des">{{ content('footer','footer_right_des','footer_right') }}</p>
                            </div>
                            <div class="footer-newsletter-input">
                                <input type="text" placeholder="{{ __('Enter Your Email Address') }}" name="email">
                                <button type="submit" id="footer_right_btn_title">{{ content('footer','footer_right_btn_title','footer_right') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area footer-demo-1">
        <div class="footer-bottom-content text-center">
            <span id="footer_copyright">{{ content('footer','footer_copyright') }}</span>
        </div>
    </div>
</footer>
