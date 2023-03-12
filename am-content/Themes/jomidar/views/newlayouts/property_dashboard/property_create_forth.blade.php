@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.forth_update_property',$id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="term_id" value="{{ decrypt($id) }}">
            <div class="description-card card align-items-end">
                <div class="col-12 d-flex mt-n3 font-medium">
                    <span class="theme-text-sky ">4</span>/
                    <span class="theme-text-seondary-black">6</span>
                </div>
                @if($errors->has('error'))
                <div class="error col-12 d-flex mt-n3 font-medium">{{ $errors->first('error') }}</div>
                @endif
                @if($errors->has('media.*'))
                @foreach($errors->get('media.*') as $errors)
                @foreach($errors as $error)
                <div class="error col-12 d-flex mt-n3 font-medium">{{ $error }}</div>
                @endforeach
                @endforeach
                @endif

                <ul class="img-ul">
                    <li class="mb-6 font-18 theme-text-seondary-black">{{__('labels.photo_horizontally')}}</li>
                    <li class="mb-6 font-18 theme-text-seondary-black">{{__('labels.img_size_20MB')}}</li>
                    <li class="mb-6 font-18 theme-text-seondary-black">{{__('labels.photos_exceed')}}</li>
                </ul>

                <div class="col-12 d-flex justify-content-between flex-wrap">
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" name="media[]" class="file-input" onchange="loadFile(event)">
                            <img id="first_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input" name="media[]" onchange="loadFile1(event)">
                            <img id="second_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                        </div>

                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input" name="media[]" onchange="loadFile2(event)">
                            <img id="third_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input" name="media[]" onchange="loadFile3(event)">
                            <img id="forth_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <input type="file" class="file-input" name="media[]" onchange="loadFile4(event)">
                            <img id="five_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    @foreach($info->medias as $key => $row)
                    <div class="col-sm-3" id="m_area{{ $key }}">
                        <div class="card">
                            <img src="{{ asset($row->url) }}" alt="" height="100">
                            <div class="card-footer">
                                <a class="btn btn-danger col-12" onclick="remove_image({{ $row->id }},{{ $key }})">{{ __('Remove') }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 d-flex font-16">
                    <span class="theme-text-sky add_pics">0</span>/
                    <span class="theme-text-seondary-black">5</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex flex-column align-items-end video-link">
                    <label for="" class="font-18 theme-text-seondary-black">{{__('labels.video_link_optional')}}</label>
                    <input type="text" value="{{ !empty( $info->virtual_tour) ? $info->virtual_tour->content  : old("virtual_tour") }}" name="virtual_tour" placeholder="{{__('labels.example')}} http://example.com" class="form-control theme-border">
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">{{__('labels.next')}}</button>
                @if($info->property_type->category->name == 'Land' || $info->property_type->category->name == 'Farm' ||  $info->property_type->category->name == 'Warehouse')
                <a href="{{ route('agent.property.second_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
                @else
                <a href="{{ route('agent.property.third_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
                @endif
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
<form method="post" action="{{ route('agent.medias.destroy') }}" id="basicform">
    @csrf
    <input type="hidden" id="media_id" name="id[]">
    <input type="hidden" name="status" value="delete">
</form>

@endsection
@push('js')
<script src="{{theme_asset('assets/newjs/property_create.js')}}"></script>
<script src="{{theme_asset('assets/newjs/property_step.js')}}"></script>
@endpush