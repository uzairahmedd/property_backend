@extends('layouts.backend.app')

@section('content')
    @php
        $categories = __('labels.categories');
    @endphp
@include('layouts.backend.partials.headersection',['title'=> $categories])
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{__('labels.categories')}}</h4>
			</div>
			<div class="col-lg-6">
			@can('category.create')
				<div class="add-new-btn">
					<a href="{{ route('admin.category.create') }}" class="btn float-right btn-primary">{{__('labels.add_new')}}</a>
				</div>
				@endcan
			</div>
		</div>
		<div class="card-action-filter mt-3">
			<form method="post" id="confirm_basicform" action="{{ route('admin.category.destroy') }}">
				@csrf
				<!-- @can('category.delete')
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
				@endcan -->
				<div class="float-right">
					<div class="form-group">
						<input type="text" id="data_search" class="form-control" placeholder="{{__('labels.enter_value')}}">
					</div>
				</div>
		</div>
		<div class="table-responsive custom-table">
			<table class="table text-left table-striped table-hover text-center table-borderless" id="category_datatable">
				<thead>
					<tr>
						<!-- <th class="am-select">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
								<label class="custom-control-label checkAll" for="customCheck12"></label>
							</div>
						</th> -->
						<th class="am-title">{{__('labels.icon')}}</th>
						<th class="am-title">{{__('labels.title')}}</th>
						<th class="am-title">{{__('labels.arabic_title')}}</th>
						<th class="am-title">{{__('labels.property_type')}}</th>
						<th class="am-title">{{__('labels.land_area')}}</th>
						<th class="am-title">{{__('labels.built_up_area')}}</th>
						<th class="am-title">{{__('labels.property_age')}}</th>
						<th class="am-title">{{__('labels.features_section')}}</th>
						<th class="am-title">{{__('labels.furnishing_section')}}</th>
						<th class="am-title">{{__('labels.total_floors')}}</th>
						<th class="am-title">{{__('labels.property_floor')}}</th>
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
						<td>
							<span><i class="{{!empty($post->icon) ? $post->icon->content : ''}}"></i></span>
						</td>
						<td>
							{{ $post->name }}
							<div class="hover">
								<a href="{{ route('admin.category.edit',$post->id) }}">{{ __('labels.edit') }}</a>
							</div>
						</td>
						<td>
							{{ $post->ar_name }}
						</td>
						<td>
							@foreach($post->child_name as $name_type)
							<span class="badge badge-primary">{{Session::get('locale') == 'ar' ? @$name_type->ar_name :  @$name_type->name}}</span>
							@endforeach
						</td>

						@if($post->land_area == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif

						@if($post->buildup_area == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif
						@if($post->property_age == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif
						@if($post->features_section == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif
						@if($post->furnishing_section == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif
						@if($post->total_floor == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif
						@if($post->property_floor == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif
						@if($post->featured == 1)
						<td><span class="badge badge-success">{{__('labels.yes')}}</span></td>
						@else
						<td><span class="badge badge-danger">{{__('labels.no')}}</span></td>
						@endif
						<td>{{ __('Last Modified') }}
							<div class="date">
								{{ $post->updated_at->diffForHumans() }}
							</div>
						</td>
                        <td>
                            <i class="fa fa-book" data-id="{{$post->id}}" onclick="category_logs(this)" data-toggle="tooltip" title="Category Logs"></i>
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
                        <th class="am-title">{{__('labels.icon')}}</th>
                        <th class="am-title">{{__('labels.title')}}</th>
                        <th class="am-title">{{__('labels.arabic_title')}}</th>
                        <th class="am-title">{{__('labels.property_type')}}</th>
                        <th class="am-title">{{__('labels.land_area')}}</th>
                        <th class="am-title">{{__('labels.built_up_area')}}</th>
                        <th class="am-title">{{__('labels.property_age')}}</th>
                        <th class="am-title">{{__('labels.features_section')}}</th>
                        <th class="am-title">{{__('labels.furnishing_section')}}</th>
                        <th class="am-title">{{__('labels.total_floors')}}</th>
                        <th class="am-title">{{__('labels.property_floor')}}</th>
                        <th class="am-title">{{__('labels.featured')}}</th>
                        <th class="am-date">{{__('labels.date')}}</th>
                        <th class="am-date">{{__('labels.action')}}</th>
					</tr>
				</tfoot>
			</table>

            <div class="d-flex justify-content-center">
                {{ $posts->links('vendor.pagination.bootstrap') }}
            </div>

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

    $(document).ready(function() {
        var table = $('#category_datatable').DataTable( {
            scrollX:        true,
            scrollCollapse: true,
            autoWidth:         true,
            tLengthChange : true,
            bLengthChange : false,
            bInfo:false,
            paging:         false,
            columnDefs: [
                { "width": "150px", "targets": [2,3,4,5,6,7,8,9,10,11,12] },
            ]
        } );
    });
</script>
@endsection
