<section id="review">
    <div class="review-area text-center mt-100 mb-100" id="review_bg_img" style="background-image: url('{{ asset(content('review','review_bg_img')) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="review-main-area pt-150 pb-150">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="review-title-area">
                                    <h4 id="review_title">{{ content('review','review_title') }}</h4>
                                    <p id="review_des">{{ content('review','review_des') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="review-card-area">
                            <div class="row" id="review_append">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="review_url" value="{{ route('review.data') }}">
</section>