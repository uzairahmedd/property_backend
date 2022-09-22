@extends('layouts.backend.app')

@section('content')
<section>
    <div class="card">
        <div class="card-header">
            <h4>{{ __('Theme Option') }}</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.theme.option') }}" id="basicform" method="POST" enctype="multipart/form-data">
                @csrf
                @php
                    $color = App\Options::where('key','theme_color')->first();
                    $listing_page = App\Options::where('key','listing_page')->first();
                @endphp
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="logo">{{ __('Select Logo') }}</label>
                            <input type="file" name="logo" class="form-control" id="logo">
                            <br>
                            <div class="pre-img">
                                <span>{{ __('Pre Logo') }}: <img width="50" height="50" src="{{ asset('uploads/logo.png') }}" alt=""></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="favicon">{{ __('Select Favicon') }}</label>
                            <input type="file" name="favicon" class="form-control" id="favicon">
                            <br>
                            <div class="pre-img">
                                <span>{{ __('Pre Favicon') }}: <img src="{{ asset('uploads/favicon.ico') }}" alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('Select Listing Template') }}</label>
                    <select name="listing_page" class="form-control">
                        <option {{ $listing_page->value == 'with_map' ? 'selected' : '' }} value="with_map">{{ __('Withmap Page') }}</option>
                        <option {{ $listing_page->value == 'without_map' ? 'selected' : '' }} value="without_map">{{ __('Withoutmap Page') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>{{ __('Select Theme Color') }}</label>
                    <input type="color" name="theme_color" class="form-control" value="{{ $color->value }}">
                </div>
                @php
                    $option = App\Options::where('key','breadcrumb')->first();
                    if($option)
                    {
                        $preview = $option->value;
                    }else{
                        $preview = null;
                    }
                    $media['title'] = 'Breadcrumb Background Image';
                    $media['preview'] = $preview;
                    $media['value'] = null;
                @endphp
                {{ mediasection($media) }}
                <button type="submit" class="btn btn-primary w-100 basicbtn">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
</section>
{{ mediasingle() }}
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>
<script>
    (function ($) {
      "use strict";

      $('.use').on('click',function(){

        $('#preview').attr('src',myradiovalue);
        $('#image').val(myradiovalue);
        $('#preview_input').val(myradiovalue);

      });

    })(jQuery);
</script>
@endsection
