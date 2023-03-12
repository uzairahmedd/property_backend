@extends('theme::layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
<script src="{{ asset('admin/js/dropzone.js') }}"></script>
<link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">
@endpush

@section('title','Create Property')

@section('content')
<section>
	<div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-area-start text-center">
						<div class="breadcrumb-content">
							<h2>{{ __('Edit Property') }}</h2>
							<div class="breadcrumb-menu">
								<nav>
									<ul>
										<li><a href="{{ route('agent.property.index') }}">{{ __('Edit Property') }}</a></li>
										<li><span class="iconify" data-icon="ri:arrow-right-s-line" data-inline="false"></span></li>
										<li>{{ __('Create Property') }}</li>
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
					<div class="widget-card">
						<div class="card-body">
							@if (session()->has('flash_notification.message'))
							<div class="alert alert-{{ session()->get('flash_notification.level') }}">
								<button type="button" class="close text-dark" data-dismiss="alert" aria-hidden="true">×</button>
								{{ session()->get('flash_notification.message') }}
							</div>
							@endif
							@if(session()->has('message'))
							<div class="alert alert-success">
								<button type="button" class="close text-dark" data-dismiss="alert" aria-hidden="true">×</button>
								{{ session()->get('message') }}
							</div>
							@endif
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<ul class="nav nav-pills" id="myTab3" role="tablist">
								<li class="nav-item">
									<a class="nav-link active show" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">{{ __('General') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab" aria-controls="profile" aria-selected="false">{{ __('Images') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#floor_plan" role="tab" aria-controls="profile" aria-selected="false">{{ __('Floor Plan') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#contact_type" role="tab" aria-controls="profile" aria-selected="false">{{ __('Contact Information') }}</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent2">
								<div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="profile-tab3">
									<form action="{{ route('agent.media.store') }}" enctype="multipart/form-data" class="dropzone" id="mydropzone">
										@csrf
										<input type="hidden" name="term_id" value="{{ $info->id }}">
									</form>
									<div class="row mt-2">
										@foreach($info->medias as $key => $row)
										<div class="col-sm-3" id="m_area{{ $key }}">
											<div class="card">
												<img src="{{ asset($row->url) }}" alt="" height="100" >
												<div class="card-footer">
													<button class="btn btn-danger col-12" onclick="remove_image({{ $row->id }},{{ $key }})">{{ __('Remove') }}</button>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
								<div class="tab-pane fade" id="floor_plan" role="tabpanel" aria-labelledby="profile-tab3">
									<div class="row">
										<div class="col-sm-8"></div>
										<div class="col-sm-4">
											<button class="btn btn-primary mt-2 mb-1 col-12" type="button" data-toggle="modal" data-target="#exampleModal">{{ __('Add New Floor plan') }}</button>
										</div>
										<div class="table-responsive col-sm-12">
											<table class="table table-tripe">
												<tr>
													<th>{{ __('Name') }}</th>
													<th>{{ __('Square Feet') }}</th>
													<th>{{ __('Image') }}</th>
													<th>{{ __('Delete') }}</th>
												</tr>
												@foreach($info->floor_plans as $r)
												@php
												$data=json_decode($r->content);
												@endphp
												<tr>
													<td>{{ $data->name }}</td>
													<td>{{ $data->square_ft }}</td>
													<td><a href="{{ asset($data->file_name) }}" target="_blank"><img src="{{ asset($data->file_name) }}" alt="" height="50"></a></td>
													<td><a href="{{ route('agent.floor.delete',$r->id) }}" class="btn btn-danger btn-sm cancel"><i class="fa fa-trash"></i></a></td>
												</tr>
												@endforeach
											</table>
										</div>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<form method="post" class="post_form" action="{{ route('agent.floor.store',$info->id) }}" enctype="multipart/form-data">
												@csrf
											<div class="modal-content">
												<div class="modal-header">
													<h5  id="exampleModalLabel">{{ __('Add Floor Plan') }}</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="form-group">
														<label>{{ __('Name') }}</label>
														<input type="text" name="name" class="form-control" required="">
													</div>
													<div class="form-group">
														<label>{{ __('Square Feet') }}</label>
														<input type="number" step="any" name="square_ft" class="form-control" required="">
													</div>
													<div class="form-group">
														<label>{{ __('Image') }}</label>
														<input type="file" accept="image/*" name="file" class="form-control" required="">
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
													<button type="submit" class="btn btn-primary update_btn">{{ __('Save changes') }}</button>
												</div>
											</div>
											</form>
										</div>
									</div>
								</div>
								@isset($contact_type->contact_type)
								<div class="tab-pane fade" id="contact_type" role="tabpanel" aria-labelledby="profile-tab3">
									<form method="post" action="{{ route('agent.contact_type',$info->id) }}" enctype="multipart/form-data" class="basicform">
										@csrf
									<div class="form-group">
										<label>{{ __('Contact Type') }}</label>
										<select class="form-control" name="contact_type" id="contact">
											<option value="mail" @if($contact_type->contact_type=='mail') selected @endif>{{ __('Enquiry Form') }}</option>
											<option value="phone" @if($contact_type->contact_type=='phone') selected @endif>{{ __('Direct Call') }}</option>
											<option value="affiliate_button" @if($contact_type->contact_type=='affiliate_button') selected @endif>{{ __('Affiliate Button') }}</option>
											<option value="affiliate_banner_ads" @if($contact_type->contact_type=='affiliate_banner_ads') selected @endif>{{ __('Affiliate Banner Ads') }}</option>
										</select>
									</div>
									<div class="form-group @if($contact_type->contact_type !== 'mail') none @endif" id="email">
										<label>{{ __('Email') }}</label>
										<input type="email" name="email" class="form-control" value="{{ $contact_type->email ?? '' }}">
									</div>
									<div class="form-group @if($contact_type->contact_type !== 'phone') none @endif" id="phone">
										<label>{{ __('Phone Number') }}</label>
										<input type="phone" name="phone" class="form-control" value="{{ $contact_type->phone ?? '' }}">
									</div>
									<div class="form-group @if($contact_type->contact_type !== 'affiliate_banner_ads') none @endif" id="affiliate_banner">
										<label>{{ __('Affiliate Banner') }}</label>
										<input type="file" name="banner" accept="image/*" class="form-control">
									</div>
									<div class="form-group @if($contact_type->contact_type !== 'affiliate_banner_ads' && $contact_type->contact_type !== 'affiliate_button') none  @endif" id="affiliate_url">
										<label>{{ __('Affiliate Url') }}</label>
										<input type="phone" name="url" class="form-control" value="{{ $contact_type->url ?? ''}}">
									</div>
									<div class="form-group" >
										<button class="btn btn-primary basicbtn" type="submit">{{ __('Update') }}</button>
									</div>
									</form>
								</div>
								@endisset
								<div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
									<div class="pt-20">
										<form method="post" action="{{ route('agent.property.update',$info->id) }}" class="post_form">
											@csrf
											@method('PUT')

											@php
											$arr['title']= __('Name');
											$arr['id']= 'title';
											$arr['type']= 'text';
											$arr['placeholder']= __('Enter Name');
											$arr['name']= 'name';
											$arr['is_required'] = true;
											$arr['value'] = $info->title;

											echo  input($arr);

											$arr2['title']= __('Description');
											$arr2['id']= 'Description';
											$arr2['name']= 'excerpt';
											$arr2['placeholder']= __('Short Description');
											$arr2['is_required'] = true;
											$arr2['value'] = $info->excerpt->content ?? '';

											echo  textarea($arr2);

											$arr3['title']= __('Content');
											$arr3['id']= 'content';
											$arr3['name']= 'content';
											$arr3['placeholder']= '';
											$arr3['is_required'] = true;
											$arr3['value'] = $info->content->content ?? '';
											echo  editor($arr3);

											@endphp
											<div class="form-group">
												<label for="title">{{ __('Select State') }}</label>
												<select class="form-control"  id="state" name="state[]">
													<option >{{ __('Select State') }}</option>
													@foreach(App\Category::where('type','states')->get() as $row)
													<option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>

													@endforeach
												</select>
											</div>
											<div class="form-group none city">
												<label for="title">{{ __('Select Area') }}</label>
												<select class="form-control" name="city" id="city">
													<option disabled="" selected="">{{ __('Select Area') }}</option>

												</select>
											</div>
											@php
											$arr22['title']= __('Location');
											$arr22['id']= 'location_input';
											$arr22['type']= 'text';
											$arr22['placeholder']= __('Enter Location');
											$arr22['name']= 'location';
											$arr22['value']= $info->city->value ?? '';
											$arr22['is_required'] = true;
											echo  input($arr22);
											@endphp
											<input type="text" name="latitude" id="latitude" value="{{ $info->latitude->value ?? '' }}">
											<input type="text" name="longitude" id="longitude" value="{{ $info->longitude->value ?? '' }}">
											<div id="map-canvas" style="height: 200px" height="200"  class="map-canvas"></div>
											<hr>
											<p>{{ __('Price') }}</p>
											<hr>
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label>{{ __('Min Price') }} ({{ default_currency()->name ?? 'USD' }})</label>
														<input type="number" step="any" name="min_price" class="form-control" required="" value="{{ $info->min_price->price }}">

													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label>{{ __('Max Price') }} ({{ default_currency()->name ?? 'USD' }})</label>
														<input type="number" step="any" name="max_price" class="form-control" required="" value="{{ $info->max_price->price }}">
													</div>
												</div>
											</div>
											<p>{{ __('Options') }}</p>
											<hr>
											<div class="row">
												@foreach($input_options as $row)
												<div class="col-sm-3">
													<div class="form-group">
														<label>{{ $row->name }}</label>
														<input type="number" step="any"  name="input_option[]" value="{{ $row->post_category_option->value ?? '' }}" placeholder="{{ $row->name }}" class="form-control">
														<input type="hidden"  name="input_id[]" value="{{ $row->id }}">
													</div>
												</div>
												@endforeach
											</div>
											<div class="form-group">
												<div >
													<label>{{ __('Distance between facilities') }}</label>
													<button type="button" class="btn btn-primary float-right add_more">{{ __('Add More') }}</button>
													<hr>
													<div class="form-group mb-3">
														@php
														$rand=rand(100,300);
														@endphp
														<table class="table facilities_area">
															@if(count($info->facilities) == 0)

															<tr id="table_row{{ $rand }}">
																<td>
																	<select name="facilities[]" class="form-control">
																		<option value="">{{ __('Select facility') }}</option>
																		@foreach($facilities as $row)
																		<option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
																		@endforeach
																	</select>
																</td>
																<td>
																	<input type="number" name="facilities_input[]" placeholder="{{ __('Distance (Km)') }}" class="form-control col-12" step="any">
																</td>
																<td>
																	<button type="button" onclick="remove_row({{ $rand }})" class="btn btn-danger mt-1 float-left delete_btn"><i class="fa fa-trash"></i></button>
																</td>
															</tr>
															@else
															@foreach($info->facilities as $facility)
															<tr id="table_row{{ $rand.$facility->id }}">
																<td>
																	<select name="facilities[]" class="form-control">
																		<option value="">{{ __('Select facility') }}</option>
																		@foreach($facilities as $rows)
																		<option value="{{ $rows->id }}" @if($facility->category_id == $rows->id) selected="" @endif>{{ $rows->name }}</option>
																		@endforeach
																	</select>
																</td>
																<td>
																	<input value="{{ $facility->value }}" type="number" step="any" name="facilities_input[]" placeholder="{{ __('Distance (Km)') }}" class="form-control col-12" >
																</td>
																<td>
																	<button type="button" onclick="remove_row({{ $rand.$facility->id }})" class="btn btn-danger mt-1 float-left delete_btn"><i class="fa fa-trash"></i></button>
																</td>
															</tr>
															@endforeach
															@endif
														</table>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>{{ __('Features') }}</label>
												<hr>
												@foreach(App\Category::where('type','feature')->get() as $row)
												<label class="checkbox-inline">
													<input name="features[]" type="checkbox" value="{{ $row->id }}" @if(in_array($row->id, $array)) checked="" @endif>&nbsp {{ $row->name }}
												</label>
												@endforeach
											</div>
											<div class="form-group">
												<label>{{ __('Youtube Video Url (optional)') }}</label>
												<hr>
												@if($info->youtube_url != null)
												<input type="text" name="youtube_url" class="form-control" placeholder="https://www.youtube.com/watch?v=example" value="{{ 'https://www.youtube.com/watch?v='.$info->youtube_url->content }}">
												@else
												<input type="text" name="youtube_url" class="form-control" placeholder="https://www.youtube.com/watch?v=example" >
												@endif
											</div>
											<div class="form-group">
												<label>{{ __('Virtual Tour (optional)') }}</label>
												<hr>
												<input type="text" name="virtual_tour" class="form-control" placeholder="https://my.matterport.com/show/?m=example" value="{{ $info->virtual_tour->content ?? null }}">
											</div>
											<div class="row">
												<div class="form-group col-sm-6">
													<h5>{{ __('Status') }}</h5>
													<hr>
													<select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="status[]">
														@foreach(\App\Category::where('type','status')->get() as $row)
														<option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group col-sm-6">
													<h5>{{ __('Project') }}</h5>
													<hr>
													<select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="project">
														<option value="">{{ __('Select Project') }}</option>
														@foreach(\App\Terms::where('type','project')->where('status',1)->get() as $row)

														<option value="{{ $row->id }}" @if($row->id==$child) selected="" @endif>{{ $row->title }}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group col-sm-6">
													<button class="btn btn-success basicbtn update_btn" type="submit">{{ __('Update') }}</button>
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
		</div>
	</form>
</section>
	<!-- dashboard area end -->
<form method="post" action="{{ route('locations.info') }}" id="basicform3">
  @csrf
  <input type="hidden" name="id" id="id2" >
</form>

<div class="d-none">
    <div class="f_row">
    <select name="facilities[]" class="form-control">
      <option value="">{{ __('Select facility') }}</option>
      @foreach($facilities as $row)
      <option value="{{ $row->id }}">{{ $row->name }}</option>
      @endforeach
    </select>
    </div>
</div>

<form method="post" action="{{ route('agent.medias.destroy') }}" id="basicform">
  @csrf
	<input type="hidden" id="media_id" name="id[]">
	<input type="hidden"  name="status" value="delete">
</form>

<input type="hidden" id="city_id" value="{{ $info->city->category_id ?? '' }}">

@endsection
@push('js')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initialize"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/agent/property-edit.js') }}"></script>
@endpush
