<div class="agency-contact-form">
    <form action="{{ route('property.inquiryform') }}" method="POST" id="inquiryform">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="{{ __('Your Name') }}" name="name"> 
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="{{ __('Email') }}" name="email"> 
        </div>
        <div class="form-group">
            <textarea name="message" cols="30" rows="5" class="form-control" placeholder="{{ __('Message') }}"></textarea> 
        </div>
        <input type="hidden" value="{{ $info->email }}" name="agent_email">
        @if(env('NOCAPTCHA_SITEKEY') != null)
        <div class="form-group">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}


        </div>
        @endif  
        <div class="form-group">
            <button type="submit" class="basicbtn">{{ __('Send Message') }}</button>
        </div>
        
            <div class="alert alert-success none" role="alert">
             
          </div>
          <div class="alert alert-danger none" role="alert">
              
          </div>
        
    </form>
</div>

@push('js')
<script src="{{ theme_asset('assets/js/inquality-form.js') }}"></script>
@endpush



