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
                            <h2>{{ $blog->title }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ $blog->title }}</li>
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
                <div class="col-lg-8">
                    <div class="blog-details-area">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset($blog->preview->content ?? null) }}" alt="">
                        </div>
                        <div class="blog-title">
                            <h3>{{ $blog->title }}</h3>
                        </div>
                        <div class="blog-date">
                            <span class="iconify" data-icon="uil:calender" data-inline="false"></span>
                            {{ __('Posted By') }} {{ $blog->user->name ?? null }} {{ __('on') }} {{ $blog->created_at->isoFormat('LLLL') }}
                        </div>
                        <div class="blog-description">
                            {{ content_format($blog->content->content ?? null) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-blog-card mb-30">
                        <div class="blog-card-hader">
                            <h3>{{ __('Search Keyword') }}</h3>
                        </div>
                        <div class="blog-card-body">
                            <form action="{{ route('blog.list') }}">
                                <input type="text" placeholder="Type keyword" name="keyword">
                                <div class="card-btn">
                                    <button>{{ __('Search') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="single-blog-card">
                        <div class="blog-card-hader">
                            <h3>{{ __('Latest Blog') }}</h3>
                        </div>
                        <div class="blog-card-body">
                            @foreach ($latest_news as $news)
                            <div class="row">
                                <div class="col-lg-4 pr-0">
                                    <div class="blog-latest-img">
                                        <a href="{{ route('blog.show',$news->slug) }}"><img  class="img-fluid" src="{{ $news->preview->content ?? null }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="blog-title">
                                        <a href="{{ route('blog.show',$news->slug) }}"><h5>{{ Str::limit($news->title,30) }}</h5></a>
                                    </div>
                                    <div class="blog-latest-date">
                                        <p>{{ $news->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog details area end -->
@endsection
