@extends('theme::layouts.app')

@section('content')
 <!-- hero area start -->
 <section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ $info->title }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ $info->title }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->

<!-- blog details area start -->
<section>
    <div class="blog-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-area">

                        <div class="blog-title">
                            <h3>{{ $info->title }}</h3>
                        </div>

                        <div class="blog-description">
                            {{ content_format($info->content->content ?? null) }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- blog details area end -->
@endsection
