<div class="agency-contact-form">
    <div class="">
        <div class="phone-call">
            <a href="{{ $info->url }}" class="phone_call" target="__blank">{{ __('Book Now') }}</a>
            <br>
            <p>{{ __('By') }} {{ parse_url($info->url, PHP_URL_HOST) }}</p>
        </div>
    </div>
</div>