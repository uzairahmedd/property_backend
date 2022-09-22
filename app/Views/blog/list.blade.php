@extends('theme::layouts.app')

@section('content')
<!-- hero area start -->
<section id="blog_breadcrumb">
    <div class="hero-area hero-demo-2 breadcrumb" id="bg_blog_breadcrumb_img" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2 id="breadcrumb_title">{{ __('Blog Lists') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li id="breadcrumb_des">{{ __('Blog Lists') }}</li>
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
                    <div class="row">
                        @if ($news->count() > 0)
                        @foreach ($news as $new)
                        <div class="col-lg-6 mb-30">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="{{ route('blog.show',$new->slug) }}">
                                        <img class="img-fluid" src="{{ $new->preview->content }}" alt="blog">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <a href="{{ route('blog.show',$new->slug) }}">
                                        <h3>{{ $new->title }}</h3>
                                    </a>
                                    <div class="blog-des">
                                        <p>{{ $new->excerpt->content }}</p>
                                    </div>
                                </div>
                                <div class="blog-bottom-area">
                                    <a href="{{ route('blog.show',$new->slug) }}">
                                        <img src="{{ $new->user->avatar ?? null }}" alt="">
                                        <span>{{ $new->user->name }}</span>
                                    </a>
                                    <p>{{ $new->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        @else
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h3>{{ __('Sorry! No Data Found') }}</h3>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="text-center">
                                {{  $news->links('vendor.pagination.bootstrap-4')  }}
                            </div>
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
                                <input type="text" placeholder="Type keyword" name="keyword" value="{{ $keyword != null ? $keyword : '' }}">
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