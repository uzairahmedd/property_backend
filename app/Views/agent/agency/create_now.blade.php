@extends('theme::layouts.app')

@section('title','My Packages')

@section('content')
<!-- hero area start -->
<section>
    <div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-area-start text-center">
                        <div class="breadcrumb-content">
                            <h2>{{ __('Agency') }}</h2>
                            <div class="breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                                        <li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
                                        <li>{{ __('Agency Create') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->

<!-- dashboard area start -->
<section>
    <div class="dashboard-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('view::layouts.agent.partials.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="property-dashboard">
                        <div class="row">
                            @if(Session::has('success'))
                            <div class="col-sm-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>  
                            @endif
                            @if(Session::has('error'))
                            <div class="col-sm-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ Session::get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>  
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="widget-card">
                                    <div class="widget-card-header">
                                        <h5>{{ __('Create Agency') }}</h5>
                                    </div>
                                    <div class="widget-card-body">
                                            <div class="widget-form">
                                                <form action="{{ route('agent.agency.store') }}" method="post" class="basicform_with_reset">
                                                    @csrf
                                                <input type="hidden" name="id" value="{{ $info->id }}">
                                                <div class="pt-20">
                                                    @php
                                                    $arr['title']= __('Name');
                                                    $arr['id']= 'name';
                                                    $arr['type']= 'text';
                                                    $arr['placeholder']= __('Enter Name');
                                                    $arr['name']= 'name';
                                                    $arr['is_required'] = true;
                                                    echo  input($arr);
                                                @endphp 
                        
                                                <div class="form-group">
                                                    <label for="address">{{ __('Address') }}</label>
                                                    <textarea name="address" id="address" cols="30" class="form-control" rows="8" placeholder="{{ __('Address') }}"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">{{ __('Description') }}</label>
                                                    <textarea name="description" id="description" cols="30" class="form-control" rows="8" placeholder="{{ __('Description') }}"></textarea>
                                                </div>
                                                @php
                                                $arr['title']= __('Phone Number');
                                                $arr['id']= 'phone';
                                                $arr['type']= 'number';
                                                $arr['placeholder']=  __('Enter Phone Number');
                                                $arr['name']= 'phone';
                                                $arr['is_required'] = false;
                                                echo  input($arr); 
                                                
                                                $arr['title']= 'Email Address';
                                                $arr['id']= 'email';
                                                $arr['type']= 'email';
                                                $arr['placeholder']=  __('Enter Email Address');
                                                $arr['name']= 'email';
                                                $arr['is_required'] = false;
                                                echo  input($arr); 
                                                
                                                $arr['title']= __('Facebook Link');
                                                $arr['id']= 'facebook';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Facebook Link');
                                                $arr['name']= 'facebook';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Twitter Link');
                                                $arr['id']= 'twitter';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Twitter Link');
                                                $arr['name']= 'twitter';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Youtube Link');
                                                $arr['id']= 'youtube';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Youtube Link');
                                                $arr['name']= 'youtube';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Pinterest Link');
                                                $arr['id']= 'pinterest';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Pinterest Link');
                                                $arr['name']= 'pinterest';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Linkedin Link');
                                                $arr['id']= 'linkedin';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Linkedin Link');
                                                $arr['name']= 'linkedin';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Instagram Link');
                                                $arr['id']= 'instagram';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Instagram Link');
                                                $arr['name']= 'instagram';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Whatsapp Phone Number');
                                                $arr['id']= 'whatsapp';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Whatsapp Phone Number');
                                                $arr['name']= 'whatsapp';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Service Area');
                                                $arr['id']= 'service_area';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Service Area');
                                                $arr['name']= 'service_area';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('Tax Number');
                                                $arr['id']= 'tax_number';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('Tax Number');
                                                $arr['name']= 'tax_number';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                
                                                $arr['title']= __('License Number');
                                                $arr['id']= 'license';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('License Number');
                                                $arr['name']= 'license';
                                                $arr['is_required'] = false;
                                                echo  input($arr);
                                                @endphp

                                                <button class="basicbtn" type="submit">{{ __('Submit') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dashboard area end -->
@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush