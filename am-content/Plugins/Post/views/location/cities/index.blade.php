@extends('layouts.backend.app')

@section('content')
    @php
    $city = __('labels.city');
    @endphp
@include('layouts.backend.partials.headersection',['title'=> $city])
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{__('labels.city')}}</h4>
			</div>
			@can('cities.create')
			<div class="col-lg-6">
				<div class="add-new-btn">
					<a href="{{ route('admin.cities.create') }}" class="btn float-right btn-primary">{{__('labels.add_new')}}</a>
				</div>
			</div>
			@endcan
		</div>
		<div class="card-action-filter mt-3">
			<form method="post" id="confirm_basicform" action="{{ route('admin.cities.destroy') }}">
				@csrf
				 <!-- @can('cities.delete')
				<div class="float-left">
					<div class="input-group">
						<select class="form-control selectric" name="method">
							<option value="">
                                {{ __('labels.select_action') }}
                            </option>
							<option value="delete">{{ __('labels.delete_permanently') }}</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">{{ __('labels.submit') }}</button>
						</div>
					</div>
				</div>
				@endcan -->
				<div class="float-right">
					<div class="form-group">
						<input type="text" id="data_search" class="form-control" placeholder="{{__('labels.enter_value')}}">
					</div>
				</div>

		</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover text-center table-borderless">
				<thead>
					<tr>
						<!-- <th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th> -->
						<th class="am-title">{{__('labels.title')}}</th>
						<th class="am-title">{{__('labels.arabic_title')}}</th>
						<th class="am-title">{{__('labels.featured')}}</th>
						<th class="am-date">{{__('labels.date')}}</th>
						<th class="am-date">{{__('labels.action')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<!-- <th>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $post->id }}" value="{{ $post->id }}">
								<label class="custom-control-label" for="customCheck{{ $post->id }}"></label>
							</div>
						</th> -->
						<!-- <td>
								<img alt="" src="{{ asset($post->preview->content ?? '') }}" height="50">
							</td> -->
						<td>
							{{ $post->name }}
							<div class="hover">
								<a href="{{ route('admin.cities.edit',$post->id) }}">{{ __('labels.edit') }}</a>
							</div>
						</td>
						<td>{{ $post->ar_name }}</td>
						<td>
							@if($post->featured==1)
							<span class="badge badge-success">{{__('labels.yes')}}</span>
							@else
							<span class="badge badge-danger">{{ __('labels.no') }}</span>
							@endif
						</td>
						<td>{{ __('Last Modified') }}
							<div class="date">
								{{ $post->updated_at->diffForHumans() }}
							</div>
						</td>
                        <td>
                            <i class="fa fa-book" data-id="{{$post->id}}" onclick="location_logs(this)" data-toggle="tooltip" title="Location Logs"></i>
                        </td>
					</tr>
					@endforeach
				</tbody>
				</form>
				<tfoot>
					<tr>
						<!-- <th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th> -->
						<!-- <th class="am-title"><i class="far fa-image"></i></th> -->
                        <th class="am-title">{{__('labels.title')}}</th>
                        <th class="am-title">{{__('labels.arabic_title')}}</th>
                        <th class="am-title">{{__('labels.featured')}}</th>
                        <th class="am-date">{{__('labels.date')}}</th>
                        <th class="am-date">{{__('labels.action')}}</th>
					</tr>
				</tfoot>
			</table>
			{{ $posts->links('vendor.pagination.bootstrap') }}
		</div>
		</form>
	</div>
</div>
</div>
</div>

    !-- Modal -->
    <div class="modal fade" id="property_logs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('labels.Property_Logs')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('labels.close')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
	"use strict";
	//response will assign this function
	function success(res) {
		location.reload();
	}
</script>
@endsection
