@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/term.css')}}">
    <div class="container term_policy">
        <div class="terms-top">
            <h3 class="text-center theme-text-blue pt-5 terms-text">{{__('labels.privacy_term')}}</h3>
            <p class="text-center pt-4">{{__('labels.term1')}}</p>
            <p class="text-center pt-2">{{__('labels.term2')}}</p>
            <p class="text-center pt-2">{{__('labels.term3')}}</p>
            <p class="text-center pt-2">{{__('labels.term4')}}</p>
        </div>
        <div class="data-collection">
            <p class="text-right font-24 theme-text-sky">{{__('labels.data_collection')}}</p>
            <p class="text-right">{{__('labels.term5')}}</p>
            <p>
                {{__('labels.term6')}}<br>
                {{__('labels.term7')}}<br>
                {{__('labels.term8')}}<br>
                {{__('labels.term9')}}<br>
                {{__('labels.term10')}}<br>
                {{__('labels.term11')}}<br>
                {{__('labels.term12')}}<br>
                {{__('labels.term13')}}<br>
                {{__('labels.term14')}}<br>
                {{__('labels.term15')}}<br>
            </p>
        </div>
        <div class="all-collection">
            <p class="text-right font-24 theme-text-sky">{{__('labels.use_info')}} </p>
            <p class="">{{__('labels.term16')}}</p>
            <p>
                {{__('labels.term17')}}<br>
                {{__('labels.term18')}}<br>
                {{__('labels.term19')}}<br>
                {{__('labels.term20')}}<br>
                {{__('labels.term21')}}<br>
                {{__('labels.term22')}}<br>
                {{__('labels.term23')}}<br>
                {{__('labels.term24')}}<br>
            </p>
        </div>
        <div class="all-collection">
            <p class="text-right font-24 theme-text-sky">{{__('labels.use_info')}}</p>
            <p class="">{{__('labels.term25')}}</p>
            <p class="">{{__('labels.term26')}}</p>
            <p class="">{{__('labels.term27')}}</p>
            <p class="">{{__('labels.term28')}}</p>
            <p class="">{{__('labels.term29')}}</p>
            <p class="">{{__('labels.term30')}}</p>
            <p class="">{{__('labels.term31')}}</p>
            <p class="">{{__('labels.term32')}}</p>
        </div>
        <div class="all-collection">
            <p class="text-right font-24 theme-text-sky">{{__('labels.disclosure_info')}}</p>
            <p class="">
{{__('labels.term33')}}
            </p>
        </div>
        <div class="all-collection">
            <p class="text-right font-24 theme-text-sky">{{__('labels.security')}}</p>
            <p class="">
{{__('labels.term34')}}
            </p>
            <p>
{{__('labels.term35')}}
            </p>
        </div>
        <div class="all-collection">
            <p class="text-right font-24 theme-text-sky">{{__('labels.term36')}}</p>
            <p class="">{{__('labels.term37')}}</p>
        </div>
        <div class="all-collection">
            <p class="text-right font-24 theme-text-sky">{{__('labels.waiver')}}</p>
            <p class="">{{__('labels.term38')}}</p>
        </div>
    </div>
@endsection
