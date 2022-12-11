@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/select-style.css')}}">
<!-- Header Section Starts Here -->
<div class="overlay home_fade"></div>
<div class="header d-flex flex-column align-items-center">
    <li class="col-12 col-sm-10 col-lg-8 col-xl-5">
        <h1 class="font-medium theme-text-white text-center">{{__('labels.exclusive_platform')}} <span class="font-bold">{{__('labels.kingdom')}}</span></h1>
    </li>
    <form action="{{ url(list_page()) }}">
        <div class="col-12 row looking-for theme-bg-white d-flex flex-lg-row flex-sm-row align-items-center">
            <div class="col-lg-2 search-button-div col-md-2 col-sm-2 col-xs-12" id="search">
                <button type="submit" id="hero_search_btn" title="Search property" data-toggle="tooltip">
                    <img type="submit" id="hero_search_btn" class="search-home-img" src="{{theme_asset('assets/images/search.svg')}}" alt=""><span class="search-txt">Search</span> </button>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="dropdown complete-rent-drop">
                    <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                    @foreach($status as $status_data)
                    @if( $status_data->name =='Rent')
                    <input type="hidden" value="{{ $status_data->id}}" name="status" id=status>
                    @endif
                    @endforeach
                    @foreach($property_nature as $nature)
                    @if($nature->name == 'Residential')
                    <input type="hidden" name="parent_category" value="{{ $nature->id}}" id="parent_category">
                    @endif
                    @endforeach

                    <input type="hidden" name="category" value="" id="category">
                    <button class="btn dropdown-toggle rent-dropdown-toggle rent-btn" role="button" id="dropdownMenuLink-home" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">{{__('labels.rent')}}
                    </button>
                    <ul class="dropdown-menu new-rent-dropdown" aria-labelledby="dropdownMenuLink-list">
                        <div class="resident-dropdown-content">
                            <div class="row">
                                <div class="col-12 p-0">
                                    <!-- Tab -->
                                    <nav>
                                        <p class="rent-buy-txt">{{__('labels.purpose')}}</p>
                                        <div class="nav nav-tabs mb-4 rent-tabs d-flex justify-content-center align-items-center" id="nav-tab" role="tablist">
                                            @foreach($status as $status_data)
                                            @if( $status_data->name =='Sale')
                                            <a class="nav-item nav-link rent-link nav-sale active" id="nav-rent-tab" data-bs-toggle="tab" data-value="{{$status_data->id}}" href="#nav-rent" role="tab" aria-controls="nav-rent" aria-selected="true">{{__('labels.sale')}}</a>
                                            @elseif( $status_data->name =='Rent')
                                            <a class="nav-item nav-link rent-link nav-rent" id="nav-buy-tab" data-bs-toggle="tab" href="#nav-buy" data-value="{{$status_data->id}}" role="tab" aria-controls="nav-buy" aria-selected="false">{{__('labels.rent')}}</a>
                                            @endif
                                            @endforeach
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-rent" role="tabpanel" aria-labelledby="nav-rent-tab">
                                            {{-- <p class="rent-buy-txt">حالة العقار</p>--}}
                                            {{-- <div class="rent-buy-pans d-flex justify-content-center align-items-center">--}}
                                            {{-- <li class="buy-rent-pan" name="category" value="1">قيد الإنشاء</li>--}}
                                            {{-- <li class="buy-rent-pan" name="category" value="2">جاهز</li>--}}
                                            {{-- <li class="buy-rent-pan" name="category" value="3">الجميع</li>--}}
                                            {{-- </div>--}}
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="complete-btn"><a href="">{{__('labels.apply')}}</a></button>
                                                <button class="reset-btn"><a href="">{{__('labels.reset')}}</a></button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-buy" role="tabpanel" aria-labelledby="nav-buy-tab">
                                            <p class="rent-buy-txt">{{__('labels.rental_fre')}}</p>
                                            <div class="rent-buy-pans d-flex flex-row-reverse justify-content-center align-items-center">
                                                <li class="rent-all">
                                                    <input class="rent-select-dropdown" value="" type="radio" id="radio02-01" checked />
                                                    <label class="rent-box any" for="radio02-01">الجميع</label>
                                                </li>

                                                <li class="rent-all">
                                                    <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio02-02" />
                                                    <label class="rent-box rent_label_list" for="radio02-02">يومياً</label>
                                                </li>

                                                <li class="rent-all">
                                                    <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio03-03" />
                                                    <label class="rent-box project_label" for="radio03-03">أسبوعياً</label>
                                                </li>

                                                <li class="rent-all">
                                                    <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio04-04" />
                                                    <label class="rent-box project_label" for="radio04-04">شهرياً</label>
                                                </li>

                                                <li class="rent-all">
                                                    <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio05-05" />
                                                    <label class="rent-box project_label" for="radio05-05">سنوياً</label>
                                                </li>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="complete-btn"><a href="">{{__('labels.apply')}}</a></button>
                                                <button class="reset-btn"><a href="">{{__('labels.reset')}}</a></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of tab -->
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div class="dropdown complete-resident-drop">
                    <span class="rent-toggle-icon rental-toggle-icon" id="rent-t-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                    <button class="btn dropdown-toggle resident-dropdown-toggle resident-btn" role="button" id="dropdownMenuLink1" name="category" value="" onclick="" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">{{__('labels.residential')}}
                    </button>
                    <ul class="dropdown-menu resident-dropdown" aria-labelledby="dropdownMenuLink1">
                        <div class="resident-dropdown-content">
                            <div class="row">
                                <div class="col-12 p-0">
                                    <!-- Tab -->
                                    <nav>
                                        <div class="nav nav-tabs mb-4 resident-tabs" id="nav-tab-main" role="tablist">
                                            @foreach($property_nature as $nature)
                                            @if($nature->name == 'Commercial')
                                            <a class="nav-item nav-link resident-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-commercial" role="tab" aria-controls="nav-profile" data-id="{{$nature->id}}" aria-selected="false">{{$nature->name}}</a>
                                            @else
                                            <a class="nav-item nav-link resident-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-residential" role="tab" aria-controls="nav-home" data-id="{{$nature->id}}" aria-selected="true">{{$nature->name}}</a>
                                            @endif
                                            @endforeach

                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-residential" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="d-flex justify-content-between resident-centent">
                                                <div class="resident-pans">
                                                    @foreach($property_type as $key=>$value)
                                                    @if($key < 3) @foreach($value->child as $child)
                                                        @if($child->name == 'Residential')
                                                        <li class="resident-pan" name="category" value="{{$value->id}}">{{$value->name}}<i class="fa-solid {{$value->icon->content}}"></i></li>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        @endforeach
                                                </div>
                                                <div class="resident-pans">
                                                    @foreach($property_type as $key=>$value)
                                                    @if($key >= 3)
                                                    @foreach($value->child as $child)
                                                    @if($child->name == 'Residential')
                                                    <li class="resident-pan" name="category" value="{{$value->id}}">{{$value->name}}<i class="fa-solid {{$value->icon->content}}"></i></li>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="complete-btn"><a href="">{{__('labels.apply')}}</a></button>
                                                <button class="reset-btn"><a href="">{{__('labels.reset')}}</a></button>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-commercial" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="d-flex justify-content-between resident-centent">
                                                <div class="resident-pans">
                                                    @foreach($property_type as $key=>$value)
                                                    @if($key < 3) @foreach($value->child as $child)
                                                        @if($child->name == 'Commercial')
                                                        <li class="resident-pan" name="category" value="{{$value->id}}">{{$value->name}}<i class="fa-solid {{$value->icon->content}}"></i></li>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        @endforeach
                                                </div>
                                                <div class="resident-pans">
                                                    @foreach($property_type as $key=>$value)
                                                    @if($key >= 3)
                                                    @foreach($value->child as $child)
                                                    @if($child->name == 'Commercial')
                                                    <li class="resident-pan" name="category" value="{{$value->id}}">{{$value->name}}<i class="fa-solid {{$value->icon->content}}"></i></li>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="complete-btn"><a href="">{{__('labels.apply')}}</a></button>
                                                <button class="reset-btn"><a href="">{{__('labels.reset')}}</a></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of tab -->
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 search-input-bar">
                <select class="theme-text-secondary-black border-0" theme="google" width="400" id="state_dropdown" style="appearance: none;" placeholder="{{__('labels.looking_property')}}" data-search="true" name="state">
                    <option value="" disabled selected>{{__('labels.looking_property')}}</option>
                    @foreach($states as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                    <!-- <option value="AX">الرياض<span class="property_num">(1)</span></option>-->
                </select>
            </div>
        </div>
    </form>
</div>
<!-- Header Section Ends Here -->
<!-- Verified Section Starts Here -->
<div class="col-12 verified theme-bg-white">
    <ul class="list-unstyled d-flex flex-column flex-md-row justify-content-between">
        <li class="d-flex flex-sm-column-reverse flex-lg-row align-items-end align-items-sm-center align-items-lg-end">
            <h3 class="col font-medium theme-text-blue text-end text-sm-center text-lg-end">{{__('labels.comprehensive_information')}}</h3>
            <img src="{{theme_asset('assets/images/searching.svg')}}" alt="">
        </li>
        <li class="d-flex flex-sm-column-reverse flex-lg-row align-items-end align-items-sm-center align-items-lg-end">
            <h3 class="col font-medium theme-text-blue text-end text-sm-center text-lg-end">{{__('labels.real_info')}}</h3>
            <img src="{{theme_asset('assets/images/verified.svg')}}" alt="">
        </li>
        <li class="d-flex flex-sm-column-reverse flex-lg-row align-items-end align-items-sm-center align-items-lg-end">
            <h3 class="col font-medium theme-text-blue text-end text-sm-center text-lg-end">{{__('labels.verified_member')}}</h3>
            <img src="{{theme_asset('assets/images/verified2.svg')}}" alt="">
        </li>
    </ul>
</div>
<!-- Verified Section Ends Here -->
<!-- Property Listing Sale Section Starts Here -->
<div class="property-listing property-sale">
    <div class="container position-relative">
        @if(isset($status_properties['sell_property']) && count($status_properties['sell_property']) > 0)
        <div class="property-listing-content d-flex align-items-center justify-content-between">
            @foreach($status as $status_data)
            @if( $status_data->name =='Sale')
            <p class="mb-0 theme-text-sky font-medium"><a href="{{ route('list', ['status' => $status_data->id]) }}">{{__('labels.show_more')}}</a></p>
            @endif
            @endforeach
            <div class="d-flex align-items-center gap-3">
                <h2 class="mb-0 font-medium theme-text-blue">{{__('labels.recently_add')}}</h2>
                <div class="chip font-medium theme-text-secondary">
                    <span>{{__('labels.sale')}}</span>
                </div>
            </div>
        </div>
        <div class="owl-carousel">
            @foreach($status_properties['sell_property'] as $sale_data)
            @php
            $image='';
            if($sale_data->post_preview != null){
            $image = $sale_data->post_preview->media->url;
            }else{
            $image = asset('/') .'uploads/default.png';
            }
            @endphp
            <div class="listing">

                <div class="list" style="background-image: url({{$image}});">
                    <div class="content d-flex justify-content-between">
                        <div class="d-flex flex-column align-items-start theme-text-white">
                            <div class="sale theme-bg-sky">
                                <span class="font-medium">{{__('labels.sale')}}</span>
                            </div>
                            <!--<div class="sale theme-bg-blue">
                                                <span class="font-medium">متاح</span>
                                            </div> -->
                        </div>
                        @if (Auth::check())
                        @php
                        $data = DB::table('terms_user')->where([
                        ['terms_id',$sale_data->id],
                        ['user_id',Auth::User()->id]
                        ])->first();
                        if($data)
                        {
                        $property_id = $data->terms_id;
                        }else{
                        $property_id = null;
                        }
                        @endphp
                        <div class="fav-elipse d-flex align-items-center justify-content-center" onclick="favourite_property('{{$sale_data->id}}')">
                            <i class="fa-regular fa-heart {{isset($property_id) ? 'fa-solid' : 'fa-regular'}} heart{{$sale_data->id}}" title="Favorite property" data-toggle="tooltip"></i>
                        </div>
                        @else
                        <div class="fav-elipse d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="fa-regular fa-heart" title="Favorite property" data-toggle="tooltip"></i>
                        </div>
                        @endif
                    </div>
                    <div class="price theme-text-white d-flex align-items-center justify-content-center">
                        <span class="font-bold">{{ new_amount_format($sale_data->price->price ?? 0) }}</span>
                    </div>
                </div>
                <a href="property-detail/{{$sale_data->slug}}">
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">{{$sale_data->title}}</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">{{$sale_data->post_city->value}} - {{$sale_data->post_city->category->name}} </p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
</div>
<!-- Property Listing Sale Section Ends Here -->
<!-- Property Listing Rent Section starts Here -->
<div class="property-listing property-rent">
    @if(isset($status_properties['rent_property']) && count($status_properties['rent_property']) > 0)
    <div class="container position-relative">
        <div class="property-listing-content d-flex align-items-center justify-content-between">
            @foreach($status as $status_data)
            @if( $status_data->name =='Rent')
            <p class="mb-0 theme-text-sky font-medium"><a href="{{ route('list', ['status' => $status_data->id]) }}">{{__('labels.show_more')}}</a></p>
            @endif
            @endforeach
            <div class="d-flex align-items-center gap-3">
                <h2 class="mb-0 font-medium theme-text-blue"> {{__('labels.recently_add')}}</h2>
                <div class="chip font-medium theme-text-secondary">
                    <span>{{__('labels.rent')}}</span>
                </div>
            </div>
        </div>
        <div class="owl-carousel">
            @foreach($status_properties['rent_property'] as $rent_data)
            @php
            $rent_image='';
            if($rent_data->post_preview != null){
            $rent_image = $rent_data->post_preview->media->url;
            }else{
            $rent_image = asset('/') .'uploads/default.png';
            }
            @endphp
            <div class="listing">

                <div class="list" style="background-image: url({{$rent_image}});">

                    <div class="content d-flex justify-content-between">
                        <div class="d-flex flex-column align-items-start theme-text-white">
                            <div class="sale theme-bg-sky">
                                <span class="font-medium">للايجار</span>
                            </div>
                            <!-- <div class="sale theme-bg-blue">
                                                <span class="font-medium">متاح</span>
                                            </div> -->
                        </div>
                        @if (Auth::check())
                        @php
                        $data = DB::table('terms_user')->where([
                        ['terms_id',$rent_data->id],
                        ['user_id',Auth::User()->id]
                        ])->first();
                        if($data)
                        {
                        $property_id = $data->terms_id;
                        }else{
                        $property_id = null;
                        }
                        @endphp
                        <div class="fav-elipse d-flex align-items-center justify-content-center" onclick="favourite_property('{{$rent_data->id}}')">
                            <i class="fa-regular fa-heart {{isset($property_id) ? 'fa-solid' : 'fa-regular'}} heart{{$rent_data->id}}" title="Favorite property" data-toggle="tooltip"></i>
                        </div>
                        @else
                        <div class="fav-elipse d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="fa-regular fa-heart" title="Favorite property" data-toggle="tooltip"></i>
                        </div>
                        @endif
                    </div>
                    <div class="price theme-text-white d-flex align-items-center justify-content-center">
                        <span class="font-bold">{{ new_amount_format($rent_data->price->price ?? 0) }}</span>
                    </div>
                </div>
                <a href="property-detail/{{$rent_data->slug}}">
                    <div class="mt-3">
                        <h3 class="font-medium theme-text-blue">{{$rent_data->title}}</h3>
                        <div class="d-flex align-items-start justify-content-end pt-2">
                            <p class="mb-0 theme-text-seondary-black me-2">{{$rent_data->post_city->value}} - {{$rent_data->post_city->category->name}}</p>
                            <img src="{{theme_asset('assets/images/location.png')}}" alt="">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<!-- Property Listing Rent Section Ends Here -->
<!-- Property Sell and Buy section Starts Here -->
<div class="property-sl-r d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-10 col-lg-8 col-xl-5">
        <h1 class="font-bold theme-text-white mb-0">{{__('labels.property_sale_rent')}}</h1>
        <h3 class="mb-0 theme-text-white">{{__('labels.market_property_txt')}}</h3>
        <div>
            @if (Auth::User())
            <button class="btn-add btn-theme">
                <a href="{{ route('agent.property.create_property') }}"> {{__('labels.add_property_now')}}</a>
            </button>
            @else
            <button class="btn-add btn-theme">
                <a data-bs-toggle="modal" data-bs-target="#contactModal"> {{__('labels.add_property_now')}}</a>
            </button>
            @endif
        </div>
    </div>
</div>
<!-- Property Sell and Buy section Ends Here -->
<!-- Auction Section Starts Here -->
<div class="auction">
    <div class="container">
        <div class="auction-content d-flex flex-wrap justify-content-between">
            <div class="col-12 col-xl-7 zig-zag d-flex flex-column justify-content-between">
                <div class="w-100 d-flex justify-content-end">
                    <div class="d-none hammer-circle d-md-flex align-items-center justify-content-center">
                        <img src="{{theme_asset('assets/images/hammer.svg')}}" alt="">
                    </div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center align-items-md-start">
                    <div class="card2 d-inline-block position-relative">
                        <p>{{__('labels.minimum_more')}}</p>
                        <h1 class="my-3">{{__('labels.millions_riyal')}}</h1>
                        <h3>{{__('labels.random_auction_end_date')}}</h3>
                    </div>
                    <div class="d-flex flex-column w-sm-100">
                        <div class="card">
                            <div class="d-flex flex-column">
                                <h1>1.85</h1>
                                <p>{{__('labels.1_million_sar')}}</p>
                            </div>
                            <div class="d-flex flex-column ms-auto">
                                <p>{{__('labels.you_bid_from')}}</p>
                                <h1>{{__('labels.ahmed_hisham')}}</h1>
                                <h3>{{__('labels.minutes_ago_35')}}</h3>
                            </div>
                            <div class="circle d-flex align-items-center justify-content-center">
                                <h1 class="text-uppercase m-0">AH</h1>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="d-flex flex-column">
                                <h1>1.85</h1>
                                <p>{{__('labels.1_million_sar')}}</p>
                            </div>
                            <div class="d-flex flex-column ms-auto">
                                <p>{{__('labels.you_bid_from')}}</p>
                                <h1>{{__('labels.ahmed_hisham')}}</h1>
                                <h3>{{__('labels.minutes_ago_35')}}</h3>
                            </div>
                            <div class="circle d-flex align-items-center justify-content-center">
                                <h1 class="text-uppercase m-0">AH</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-5 d-flex flex-column justify-content-center mt-5 mt-xl-0">
                <h1>{{__('labels.real_estate_auction')}}</h1>
                <div>
                    <button class="auction-btn btn-theme">
                        {{__('labels.browse_auction')}}
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Auction Section Ends Here -->
<!-- Apps Section Starts Here -->
<div class="apps py-4 py-lg-0">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="col-12 col-lg-5 d-none d-lg-block mock-up">
                <img src="{{theme_asset('assets/images/mockup.png')}}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-5 text-end apps-content d-flex flex-column justify-content-center">
                <h1>{{__('labels.download_app')}}</h1>
                <h3>{{__('labels.team_approved_property')}}</h3>
                <div class="d-flex flex-column flex-sm-row justify-content-end apps-store">
                    <img src="{{theme_asset('assets/images/google-store.png')}}" alt="google-store" class="mb-3 mb-sm-0 img-fluid">
                    <img src="{{theme_asset('assets/images/apple-store.png')}}" class="mb-3 mb-sm-0 ms-sm-4 img-fluid" alt="apple-store">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Apps Section Ends Here -->
@endsection

@section('home.js')
<script src="{{theme_asset('assets/newjs/select-style.js')}}"></script>
<script src="{{theme_asset('assets/newjs/home.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        $('select').selectstyle({
            width: 400,
            height: 300,
            theme: 'light',
            onchange: function(val) {}
        });
    });
</script>
@endsection
