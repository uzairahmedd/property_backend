@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Shop Settings'])
<div class="card">
    <div class="card-body">
     <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
        <ul class="nav nav-pills" id="myTab3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">{{ __('General') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">{{ __('Payments') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">{{ __('WhatsApp') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#email" role="tab" aria-controls="contact" aria-selected="false">{{ __('Email Templates') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#settings" role="tab" aria-controls="contact" aria-selected="false">{{ __('Bill Settings') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#bank" role="tab" aria-controls="contact" aria-selected="false">{{ __('Bank Settings') }}</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent2">
          <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
            <form class="basicform" method="post" action="{{ route('admin.gen.update') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label>{{ __('Currency Icon') }}</label>
                        <input type="text" name="currency_icon" value="{{ $currency_icon->value ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Currency Name') }}</label>
                        <input type="text" name="currency_name" value="{{ $currency_name->value ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Tax (%)') }}</label>
                        <input type="number" step="any" name="tax" value="{{ $tax->value ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Incoming Mail After Order Create') }}</label>
                        <input type="email"  name="incoming_mail" value="{{ $incoming_mail->value ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Address') }}</label>
                        <input type="text" name="address" value="{{ $address->address }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('City') }}</label>
                        <input type="text" name="city" value="{{ $address->city }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Contact Number 1') }}</label>
                        <input type="text" name="number1" value="{{ $address->number1 ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Contact Number 2') }}</label>
                        <input type="text" name="number2" value="{{ $address->number2 ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Shop Direction Map Link') }}</label>
                        <input type="text" name="direction_link" value="{{ $address->direction_link ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="form-group col-6">
                        <label>{{ __('Footer Description') }}</label>
                        <input type="text" name="footer_description" value="{{ $address->footer_description ?? '' }}" class="form-control" required="">
                    </div>
                    <div class="col-12" >
                       <div class="single-area" >
                           <div class="card sub" >
                              <div class="card-body" >
                                 <h5><a href="#" data-toggle="modal" data-target=".media-single" class="text-dark">{{ __('Banner') }}</a></h5>
                                 <hr>
                                 <a href="#" data-toggle="modal" data-target=".media-single" class="single-modal">
                                    <img style="height: 200px;width: auto;" class="img-fluid" id="preview" src="{{ asset($shop_banner->value) }}"></a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="preview_input" class="input_image" name="preview" value="{{ $shop_banner->value }}">
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-primary basicbtn" type="submit">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
            <form method="post" action="{{ route('admin.payment.update') }}" class="basicform">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Method') }}</th>
                            <th>{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                        <td>{{ __('Direct bank transfer') }}</td>
                        <td>
                            <select class="form-control" name="bank_status">
                                <option value="enable" @if($payment_method->bank_status=='enable') selected="" @endif>{{ __('Enable') }}</option>
                                <option value="disable" @if($payment_method->bank_status=='disable') selected="" @endif>{{ __('Disable') }}</option>
                            </select>
                        </td>
                   </tr>
                   <tr>
                    <td>{{ __('Toyyibpay') }}</td>
                    <td><select class="form-control" name="toyyibpay_status">
                        <option value="enable" @if($payment_method->toyyibpay_status=='enable') selected="" @endif>{{ __('Enable') }}</option>
                        <option value="disable" @if($payment_method->toyyibpay_status=='disable') selected="" @endif>{{ __('Disable') }}</option>
                    </select></td>
                </tr>
                <tr>
                    <td>{{ __('Bizappay') }}</td>
                    <td><select class="form-control" name="billplz_status">
                     <option value="enable" @if($payment_method->billplz_status=='enable') selected="" @endif>{{ __('Enable') }}</option>
                     <option value="disable" @if($payment_method->billplz_status=='disable') selected="" @endif>{{ __('Disable') }}</option>
                 </select></td>
             </tr>
         </tbody>
     </table>
     <button class="btn btn-primary basicbtn">{{ __('Save') }}</button>
 </form>
</div>
<div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
   <form class="basicform" method="post" action="{{ route('admin.whatsapp.update') }}">
        @csrf
        <div class="row">
            <div class="form-group col-6">
                <label>{{ __('Phone Number') }}</label>
                <input type="text" name="phone" value="{{ $whatsapp->phone }}" class="form-control" required="">
            </div>
            <div class="form-group col-6">
                <label>{{ __('Button Text') }}</label>
                <input type="text" name="btn_text" value="{{ $whatsapp->btn_text }}" class="form-control" required="">
            </div>
            <div class="form-group col-12">
                <label>{{ __('Pretext') }}</label>
                <textarea class="form-control" name="pretext" required="">{{ $whatsapp->pretext }}</textarea>
            </div>
            <div class="form-group col-12">
                <label>{{ __('Status') }}</label>
                <select class="form-control" name="status">
                    <option value="enable" @if($whatsapp->status=='enable') selected="" @endif>{{ __('Enable') }}</option>
                    <option value="disable" @if($whatsapp->status=='disable') selected="" @endif>{{ __('Disable') }}</option>
                </select>
            </div>
            <div class="form-group col-12">
                <button type="submit" class="btn btn-primary basicbtn">{{ __('Save') }}</button>
            </div>
        </div>
    </form>
    </div>
        <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="contact-tab3">
            <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Email Template') }}</th>
                            <th>{{ __('Edit') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ __('Order Create Template') }}</td>
                            <td>
                                <a href="{{ route('admin.template.update','order_template') }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Order Status Template') }}</td>
                            <td>
                                <a href="{{ route('admin.template.update','order_status') }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="contact-tab3">
                <form class="basicform" method="post" action="{{ route('admin.billsettings.update') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="col-12">
                                <h6>{{ __('For Products') }}</h6>
                                <hr>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Bill Name') }}</label>
                                <input type="text" name="bill_name_product" value="{{ $product_bill->bill_name_product}}" class="form-control" required="" >
                            </div>
                            <div class="form-group col-12">
                                 <label>{{ __('Bill Description') }}</label>
                                <textarea class="form-control" name="bill_description_product" required="">{{ $product_bill->bill_description_product }}</textarea>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Bill Content Email') }}</label>
                                <input class="form-control" name="bill_content_email_product" value="{{ $product_bill->bill_content_email_product}}" required="" placeholder="Thank you for purchase!"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-12">
                                <h6>{{ __('For Subscription') }}</h6>
                                <hr>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Bill Name') }}</label>
                                <input type="text" name="bill_name_subscription" value="{{ $subscription_bill->bill_name_subscription }}" class="form-control" required="">
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Bill Description') }}</label>
                                <textarea class="form-control" name="bill_description_subscription" required="">{{ $subscription_bill->bill_description_subscription }}</textarea>
                            </div>
                            <div class="form-group col-12">
                                <label>{{ __('Bill Content Email') }}</label>
                                <input class="form-control" name="bill_content_email_subscription" value="{{ $subscription_bill->bill_content_email_subscription }}" required="" placeholder="Thank you for purchase!"/>
                            </div>
                        </div>
                        <div class="col-sm-12" >
                            <button class="btn btn-primary ml-3 basicbtn">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="contact-tab3">
                <form action="{{ route('admin.bank.settings.update') }}" method="POST" id="basicform">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Bank Name') }}</label>
                                    <input type="text" name="bank_name" class="form-control" value="{{ $bank_value->bank_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Branch Name') }}</label>
                                    <input type="text" name="branch_name" class="form-control" value="{{ $bank_value->branch_name ?? '' }}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Account Number') }}</label>
                                    <input type="text" name="account_num" class="form-control" value="{{ $bank_value->account_num }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Account Name') }}</label>
                                    <input type="text" name="account_name" class="form-control" value="{{ $bank_value->account_name }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary float-right">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{ mediasingle() }}
@endsection

@section('script')
<script src="{{ asset('admin/js/media.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
   $('.use').on('click',function(){

      $('#preview').attr('src',myradiovalue);
      $('#image').val(myradiovalue);
      $('#preview_input').val(myradiovalue);

      $('#general').click();

  });

   $('.media-single-dismiss').on('click',function(){
      $('#general').click();
  });
</script>
@endsection
