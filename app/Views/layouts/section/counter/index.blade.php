<section id="counter">
    <div class="counter-area" id="counter_bg_img" style="background-image: url('{{ asset(content('counter','counter_bg_img')) }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="single-counter-icon">
                            <span class="iconify" data-icon="jam:users" data-inline="false"></span>
                        </div>
                        <div class="total-agents">
                            <h5 id="counter_first_section_title">{{ content('counter','counter_first_section_title','counter_first_section') }}</h5>
                        </div>
                        <div class="total-count">
                            <span id="counter_first_section_count">{{ content('counter','counter_first_section_count','counter_first_section') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="single-counter-icon">
                            <span class="iconify" data-icon="jam:rocket" data-inline="false"></span>
                        </div>
                        <div class="total-agents">
                            <h5 id="counter_second_section_title">{{ content('counter','counter_second_section_title','counter_second_section') }}</h5>
                        </div>
                        <div class="total-count">
                            <span id="counter_second_section_count">{{ content('counter','counter_second_section_count','counter_second_section') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="single-counter-icon">
                            <span class="iconify" data-icon="jam:files" data-inline="false"></span>
                        </div>
                        <div class="total-agents">
                            <h5 id="counter_third_section_title">{{ content('counter','counter_third_section_title','counter_third_section') }}</h5>
                        </div>
                        <div class="total-count">
                            <span id="counter_third_section_count">{{ content('counter','counter_third_section_count','counter_third_section') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="single-counter-icon">
                            <span class="iconify" data-icon="fa-regular:smile" data-inline="false"></span>
                        </div>
                        <div class="total-agents">
                            <h5 id="counter_four_section_title">{{ content('counter','counter_four_section_title','counter_four_section') }}</h5>
                        </div>
                        <div class="total-count">
                            <span id="counter_four_section_count">{{ content('counter','counter_four_section_count','counter_four_section') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>