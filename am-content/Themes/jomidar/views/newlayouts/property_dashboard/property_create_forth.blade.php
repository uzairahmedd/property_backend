@extends('theme::newlayouts.app')
@section('content')
<!-- <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
<script src="{{ asset('admin/js/dropzone.js') }}"></script> -->
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    <div class="head text-center">
        <h1 class="font-bold theme-text-white pt-5">أدرج عقارك معنا</h1>
        <p class="theme-text-white font-medium mb-0 mt-2">يمكنك بسهولة تسويق عقارك على موقعنا</p>
    </div>
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
                <ul class="img-ul">
                    <li class="mb-3 font-18 theme-text-seondary-black">يجب التقاط الصور بشكل أفقي</li>
                    <li class="mb-3 font-18 theme-text-seondary-black">حجم الصورة الواحدة لا يتجاوز 20 ميجا بت</li>
                    <li class="mb-3 font-18 theme-text-seondary-black">عدد الصور لا يتجاوز 5 صور</li>
                </ul>

                <div class="col-12 d-flex justify-content-between">
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <!-- <form action="{{ route('agent.media.store') }}" enctype="multipart/form-data" class="dropzone"  style="border: 0px; padding:0px; width:100px; min-height:100px;">
                            @csrf
                            <input type="hidden" name="term_id" value="{{ decrypt($id) }}">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                        </form> -->
                            <input type="file" name="media[]" class="file-input" onchange="loadFile(event)">
                            <img id="first_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <!-- <form action="{{ route('agent.media.store') }}" enctype="multipart/form-data" class="dropzone" style="border: 0px; padding:0px; width:100px; min-height:100px;">
                            @csrf
                            <input type="hidden" name="term_id" value="{{ decrypt($id) }}">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                        </form>    -->
                            <input type="file" class="file-input" name="media[]" onchange="loadFile1(event)">
                            <img id="second_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <!-- <form action="{{ route('agent.media.store') }}" enctype="multipart/form-data" class="dropzone"  style="border: 0px; padding:0px; width:100px; min-height:100px;">
                            @csrf
                            <input type="hidden" name="term_id" value="{{ decrypt($id) }}">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                        </form>  -->
                            <input type="file" class="file-input" name="media[]" onchange="loadFile2(event)">
                            <img id="third_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <!-- <form action="{{ route('agent.media.store') }}" enctype="multipart/form-data" class="dropzone"  style="border: 0px; padding:0px; width:100px; min-height:100px;">
                            @csrf
                            <input type="hidden" name="term_id" value="{{ decrypt($id) }}">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                        </form>    -->
                            <input type="file" class="file-input" name="media[]" onchange="loadFile3(event)">
                            <img id="forth_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                            <!-- <form action="{{ route('agent.media.store') }}" enctype="multipart/form-data" class="dropzone"  style="border: 0px; padding:0px; width:100px; min-height:100px;">
                            @csrf
                            <input type="hidden" name="term_id" value="{{ decrypt($id) }}">
                            <img src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                        </form>   -->
                            <input type="file" class="file-input" name="media[]" onchange="loadFile4(event)">
                            <img id="five_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                            <span class="font-16 theme-text-sky">اضف صورة</span>
                        </div>
                    </div>

                </div>
                <!-- <div class="row mt-2">
                        @foreach($info->medias as $key => $row)
                        <div class="col-sm-3" id="m_area{{ $key }}">
                            <div class="card">
                                <img src="{{ asset($row->url) }}" alt="" height="100">
                                <div class="card-footer">
                                    <button class="btn btn-danger col-12" onclick="remove_image({{ $row->id }},{{ $key }})">{{ __('Remove') }}</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> -->
                <div class="col-12 d-flex font-16">
                    <span class="theme-text-sky add_pics">0</span>/
                    <span class="theme-text-seondary-black">5</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex flex-column align-items-end video-link">
                    <label for="" class="font-18 theme-text-seondary-black">رابط الفيديو ( اختياري )</label>
                    <input type="text" name="virtual_tour" placeholder="مثال: http://youtube.be/dkdsds" class="form-control theme-border">
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">التالي</button>
                <a href="{{ route('agent.property.third_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">السابق</a>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
<!-- <form method="post" action="{{ route('agent.medias.destroy') }}" id="basicform">
  @csrf
	<input type="hidden" id="media_id" name="id[]">
	<input type="hidden"  name="status" value="delete">
</form> -->
@endsection
@push('js')
<!-- <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script> -->
<script src="{{theme_asset('assets/newjs/property_create.js')}}"></script>
@endpush