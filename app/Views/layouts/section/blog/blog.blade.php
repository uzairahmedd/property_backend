<section>
    <div class="blog-area blog-demo-1" id="blog_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="find-agents-title">
                        <div class="left-side-section">
                            <h3 id="blog_list_title">{{ content('blog_list','blog_list_title') }}</h3>
                            <p id="blog_list_des">{{ content('blog_list','blog_list_des') }}</p>
                        </div>
                        <div class="right-side-section">
                            <a href="{{ url('blogs') }}" id="blog_list_btn_title">{{ content('blog_list','blog_list_btn_title') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="blog_append">
                
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ route('blog.data') }}" id="blog_url">
</section>