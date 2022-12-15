@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.five_update_property',$id) }}">
            @csrf
            @method('PUT')
            <div class="description-card card align-items-end">
                <div class="col-12 d-flex mt-n3 font-medium">
                    <span class="theme-text-sky ">5</span>/
                    <span class="theme-text-seondary-black">6</span>
                </div>
                <p class="mb-0 font-18 theme-text-seondary-black">{{__('labels.determine_the_features')}}</p>
                <p class="mb-3 font-14 theme-text-grey">{{__('labels.choose_more_than_one')}}</p>
                <div class="row theme-gx-2 theme-gy-36 justify-content-end">
                    @foreach(App\Category::where('type','feature')->get() as $row)
                    <div class="radio-container checkbox-step5">
                        <input name="features[]" type="checkbox" value="{{ $row->id }}" @if(in_array($row->id, $features_array)) checked @endif >
                        <span class="checmark step font-14 font-medium">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button class="btn btn-theme">{{__('labels.next')}}</button>
                <a href="{{ route('agent.property.forth_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection
