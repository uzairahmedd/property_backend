<div class="agency-contact-form">
    <div class="">
        <p><strong>{{ __('Phone Number') }}: </strong> {{ $info->phone }}</p>
        <div class="phone-call">
            <a href="tel:{{ $info->phone }}" class="phone_call"><i class="fas fa-phone"></i> {{ __('Direct Call') }}</a>
        </div>
    </div>
</div>