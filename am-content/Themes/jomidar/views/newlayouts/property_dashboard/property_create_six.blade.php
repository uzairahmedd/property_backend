@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.six_update_property',$id) }}" class="post_form">
            @csrf
            @method('PUT')
            <div class="description-card card align-items-end">
                <div class="col-12 d-flex mt-n3 font-medium">
                    <span class="theme-text-sky ">6</span>/
                    <span class="theme-text-seondary-black">6</span>
                </div>
                <p class="font-18 theme-text-seondary-black" style="margin-bottom: 10px;">{{__('labels.why_document_property')}}</p>
                <ul class="img-ul mb-4_5">
                    <li class="mb-3 font-14 theme-text-sky">{{__('labels.vulnerable_icon')}}</li>
                    <li class="mb-3 font-14 theme-text-sky">{{__('labels.priority_search')}}</li>
                    <li class="mb-3 font-14 theme-text-sky">{{__('labels.ensure_contact')}}</li>
                </ul>
                <div class="document row theme-gx-32 justify-content-end">
                    <div class="col-xl-5 col-lg-4 id-number col-md-6 col-sm-12 d-flex flex-column align-items-end">
                        <label for="" class="font-18 theme-text-seondary-black">{{__('labels.instrument_no')}}</label>
                        <input type="text" name="id_number" value="{{ !empty( $post_data->id_number) ? $post_data->id_number->content  : old("id_number") }}" placeholder="{{__('labels.please_enter_code')}}" class="form-control payment theme-border">
                    </div>
                    <div class="col-xl-5 col-lg-4 id-number col-md-6 col-sm-12 d-flex flex-column align-items-end">
                        <label for="" class="font-18 theme-text-seondary-black">{{__('labels.identification_no')}}</label>
                        <input type="text" name="instrument_number" value="{{ !empty( $post_data->instrument_number) ? $post_data->instrument_number->content  : old("instrument_number") }}" placeholder="10251511212151" class="form-control payment theme-border">
                    </div>
                </div>
                <div class="chek-info d-flex flex-column justify-content-end align-items-end">
                    <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                        <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                            <a class="form-check-label check-box-terms" for="inlineCheckbox1"> {{__("labels.is_there_mortage")}}</a>
                            <span class="theme-text-seondary-black font-16 ms-1"> </span>
                            <input class="form-check-input" name="rule[]" type="checkbox" id="inlineCheckbox1" value="1" {{ !empty( $post_data->rules) && str_contains($post_data->rules->content, '1') ? "checked"  : old("rule") }}>

                        </div>
                    </div>
                    <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                        <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                            <a class="form-check-label check-box-terms" for="inlineCheckbox2"> {{__("labels.right_and_obligations")}}</a>
                            <span class="theme-text-seondary-black font-16 ms-1"> </span>
                            <input class="form-check-input" name="rule[]" type="checkbox" id="inlineCheckbox2" value="2" {{ !empty( $post_data->rules) && str_contains($post_data->rules->content, '2') ? "checked"  : old("rule") }}>

                        </div>
                    </div>
                    <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                        <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                            <a class="form-check-label check-box-terms" for="inlineCheckbox3">{{__("labels.info_property_effects")}}</a>
                            <span class="theme-text-seondary-black font-16 ms-1"> </span>
                            <input class="form-check-input" name="rule[]" type="checkbox" id="inlineCheckbox3" value="3" {{ !empty( $post_data->rules) && str_contains($post_data->rules->content, '3') ? "checked"  : old("rule") }}>
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">{{__('labels.next')}}</button>
                <a href="{{ route('agent.property.five_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection