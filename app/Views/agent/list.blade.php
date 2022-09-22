@extends('theme::layouts.app')

@section('content')

 <!-- hero area start -->
 <section id="breadcrumb">
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');" id="bg_breadcrumb_img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2 id="breadcrumb_agent_title">{{ __('All Agents') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li id="breadcrumb_agent_des">{{ __('All Agents') }}</li>
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

<!-- agent list area start -->
<section>
    <div class="property-list-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="find-agents-area agent-demo-1 pt-0 mb-5">
                        <input type="hidden" value="{{ route('agent.list.data') }}" id="agent_list_data_url">
                        @if($query == null)
                        <div class="row" id="agents_data">
                            
                        </div>
                        @else 
                        <div class="row">
                            @if ($query->count() > 0)
                            @foreach ($query as $row)
                            <div class="col-lg-4">
                                <div class="single-agent">
                                    <div class="agent-img text-center"> 
                                        <a href="{{ route('agent.show',$row->slug) }}"> <img src="{{ $row->avatar }}" alt=""> </a>
                                    </div>
                                    @php
                                        $info = json_decode($row->usermeta->content);
                                    @endphp
                                    <div class="agent-content text-center"> 
                                        <a href="{{ route('agent.show',$row->slug) }}"><h2>{{ $row->name }}</h2></a>
                                        <div class="agent-number-info"> 
                                            <a href="{{ route('agent.show',$row->slug) }}">{{ __('View Profile') }}</a>
                                        </div>
                                        <div class="agent-number-info"> 
                                            <span>{{ $info->phone }}</span>
                                            <div class="agent-email">
                                                <p>{{ $row->email }}</p>
                                            </div>
                                        </div>
                                        <div class="agent-social-links">
                                            <nav>
                                                <ul>
                                                    <li>
                                                        <a href="{{ $info->facebook }}"><span class="iconify" data-icon="ri:facebook-fill" data-inline="false"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $info->twitter }}"><span class="iconify" data-icon="ri:twitter-fill" data-inline="false"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $info->youtube }}"><span class="iconify" data-icon="ri:youtube-fill" data-inline="false"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $info->linkedin }}"><span class="iconify" data-icon="ri:linkedin-box-fill" data-inline="false"></span></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $info->pinterest }}"><span class="iconify" data-icon="ri:pinterest-fill" data-inline="false"></span></a>
                                                    </li>
                                                </ul> 
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach  
                            @else
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <h4><p>{{ __('No Data Found') }}</p></h4>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    @if ($query == null)
                    @if ($agents > 4)
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="propery-review-see-more-btn text-center agent-load-more">
                                <a href="javascript:void(0)" id="agent_load_more"><span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> {{ __('See More Agents') }}</a>
                            </div>
                        </div>
                    </div>
                    @endif 
                    @else 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="f-right">
                                {{ $query->links('vendor.pagination.bootstrap') }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- agent list area end -->   
@endsection

@push('js')
    <script src="{{ theme_asset('assets/js/agent-list.js') }}"></script>
@endpush