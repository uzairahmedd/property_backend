@extends('theme::layouts.app')

@section('title','Create Property')

@section('content')
<section>
	<div class="hero-area hero-demo-2 breadcrumb" style="background-image: url('{{ breadcrumb() }}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-area-start text-center">
						<div class="breadcrumb-content">
							<h2>{{ __('Property') }}</h2>
							<div class="breadcrumb-menu">
								<nav>
									<ul>
										<li><a href="{{ route('agent.property.index') }}">{{ __('Property') }}</a></li>
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
					<div class="property-dashboard">
						<div class="row">
							<div class="col-lg-12">
								<div class="widget-card">
									<div class="widget-card-header">
										<h5>{{ __('Create New Property') }}</h5>
									</div>
									@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif
									<div class="widget-card-body">
										<form method="post" action="{{ route('agent.property.store') }}">
											@csrf
											<div class="property-form">
												<div class="form-group">
													<label>{{ __('Name') }}</label>
													<input type="text" placeholder="{{ __('Name') }}" name="title" required="" class="form-control">
												</div>
												<div class="form-group">
													<label>{{ __('Select Category') }}</label>
													<select class="form-control" name="category">
														@foreach($categories as $row)
														<option value="{{ $row->id }}">{{ $row->name }}</option>
														@endforeach
													</select>
												</div>
												<div class="row">
													<div class="form-group col-sm-6">
														<label>{{ __('Min Price') }} ({{ $currency->name ?? 'USD' }})</label>
														<input type="number" step="any" placeholder="{{ __('Min Price') }}" name="min_price" required="" class="form-control">
													</div>
													<div class="form-group col-sm-6">
														<label>{{ __('Max Price') }} ({{ $currency->name ?? 'USD' }})</label>
														<input type="number" step="any" placeholder="{{ __('Max Price') }}" name="max_price" required="" class="form-control">
													</div>
												</div>
												<div class="property-btn">
													<button type="submit">{{ __('Next') }}</button>
												</div>
											</div>
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
</section>
<!-- dashboard area end -->
@endsection