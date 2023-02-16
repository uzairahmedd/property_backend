@extends('layouts.backend.app')
@php
    $features_list = __('labels.features_list');
@endphp
@section('content')
@include('layouts.backend.partials.headersection',['title'=> $features_list])
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{__('labels.features')}}</h4>
			</div>
			<div class="col-lg-6">
				@can('feature.create')
				<div class="add-new-btn">
					<a href="{{ route('admin.feature.create') }}" class="btn float-right btn-primary">{{__('labels.add_new')}}</a>
				</div>
				@endcan
			</div>
		</div>
		<div class="card-action-filter mt-3">
			<form method="post" id="confirm_basicform" action="{{ route('admin.features.destroy') }}">
				@csrf
				<!-- @can('feature.delete')
				<div class="float-left">
					<div class="input-group">
						<select class="form-control selectric" name="method">
							<option value="">{{__('labels.select_action')}}</option>
							<option value="delete">{{__('labels.delete_permanently')}}</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">{{__('labels.submit')}}</button>
						</div>
					</div>
				</div>
				@endcan
				<div class="float-right">
					<div class="form-group">
						<input type="text" id="data_search" class="form-control" placeholder="{{__('labels.enter_value')}}">
					</div>
				</div>
		</div>
		<div class="table-responsive custom-table">
			<table class="table text-left table-striped table-hover text-center table-borderless">
				<thead>
					<tr>
						<th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th>
						<!-- <th class="am-title"><i class="far fa-image"></i></th> -->
						<th class="am-title">{{__('labels.title')}}</th>
						<th class="am-title">{{__('labels.arabic_title')}}</th>
						<th class="am-title">{{__('labels.featured')}}</th>
						<th class="am-date">{{__('labels.date')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<th>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $post->id }}" value="{{ $post->id }}">
								<label class="custom-control-label" for="customCheck{{ $post->id }}"></label>
							</div>
						</th>
						<!-- <td>
								<i class="{{ $post->icon->content ?? '' }}"></i>
							</td> -->
						<td>
							{{ $post->name }}
							<div class="hover">
								<a href="{{ route('admin.feature.edit',$post->id) }}">{{ __('Edit') }}</a>
							</div>
						</td>
						<td>
							{{ $post->ar_name }}
						</td>
						<td>
							@if($post->featured==1)
							<span class="badge badge-success">{{ __('Yes') }}</span>
							@else
							<span class="badge badge-danger">{{ __('No') }}</span>
							@endif
						</td>
						<td>{{ __('Last Modified') }}
							<div class="date">
								{{ $post->updated_at->diffForHumans() }}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
				</form>
				<tfoot>
					<tr>
						<th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th>
						<!-- <th class="am-title"><i class="far fa-image"></i></th> -->
                        <th class="am-title">{{__('labels.title')}}</th>
                        <th class="am-title">{{__('labels.arabic_title')}}</th>
                        <th class="am-title">{{__('labels.featured')}}</th>
                        <th class="am-date">{{__('labels.date')}}</th>
					</tr>
				</tfoot>
			</table>
			{{ $posts->links('vendor.pagination.bootstrap') }}
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
	"use strict";
	//response will assign this function
	function success(res) {
		location.reload();
	}
</script>
@endsection
