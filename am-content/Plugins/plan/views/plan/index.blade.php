@extends('layouts.backend.app')

@section('content')

@include('layouts.backend.partials.headersection',['title'=>'Agency Package List'])
<div class="card">
	<div class="card-body">
		<div class="row mb-2">
			<div class="col-lg-8">
				<div class="">
					<a href="{{ route('admin.agency-package.index') }}" class="mr-2 btn btn-outline-primary">{{ __('All') }} ({{ App\Terms::where('type','package')->where('status','!=',0)->count() }})</a>
					<a href="?st=1" class="mr-2 btn btn-outline-success">{{ __('Published') }} ({{ App\Terms::where('type','package')->where('status',1)->count() }})</a>
					<a href="?st=2" class="mr-2 btn btn-outline-warning">{{ __('Drafts') }} ({{ App\Terms::where('type','package')->where('status',2)->count() }})</a>
					<a href="?st=trash" class="mr-2 btn btn-outline-danger">{{ __('Trash') }} ({{ App\Terms::where('type','package')->where('status',0)->count() }})</a>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="float-right ">
					<a href="{{ route('admin.plan.create') }}" class="btn btn-primary float-right">{{ __('Add New') }}</a>
				</div>
			</div>
		</div>
		<br>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="data_search" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off">
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.plan.destroy') }}" class="basicform">
			@csrf
			<div class="float-left">
				<div class="input-group">
					<select class="form-control selectric" name="status">
						<option value="publish">{{ __('Publish') }}</option>
						<option value="trash">{{ __('Move to Trash') }}</option>
						<option value="delete">{{ __('Delete Permanently') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary basicbtn" type="submit">{{ __('Submit') }}</button>
					</div>
				</div>
			</div>
			<div class="table-responsive custom-table">
				<table class="table">
					<thead>
						<tr>
							<th class="am-select">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
									<label class="custom-control-label checkAll" for="customCheck12"></label>
								</div>
							</th>
							<th class="am-title">{{ __('Title') }}</th>
							<th class="am-title">{{ __('Price') }}</th>
							<th class="am-title">{{ __('Credit') }}</th>
							<th class="am-title">{{ __('Status') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($packages as $package)
						<tr>
							<th>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $package->id }}" value="{{ $package->id }}">
									<label class="custom-control-label" for="customCheck{{ $package->id }}"></label>
								</div>
							</th>
							<td>{{ $package->title }} <div><a href="{{ route('admin.plan.edit',$package->id) }}">{{ __('Edit') }}</a></div></td>
							<td>{{ $package->count }}</td>
							<td>{{ $package->featured }}</td>
							<td>@if($package->status==1) <span class="badge badge-success">{{ __('Active') }}</span> @elseif($package->status==2) <span class="badge badge-warning">{{ __('Draft') }}</span>@else
								<span class="badge badge-danger">{{ __('Trash') }}</span> @endif </td>
								<td>{{ $package->updated_at->diffForHumans() }}</td>
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
							<th class="am-title">{{ __('Title') }}</th>
							<th class="am-title">{{ __('Price') }}</th>
							<th class="am-title">{{ __('Credit') }}</th>
							<th class="am-title">{{ __('Status') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</tfoot>
				</table>
				{{ $packages->appends($request->all())->links('vendor.pagination.bootstrap') }}
			</div>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
	"use strict";
	//success response will assign here
	function success(res){
		location.reload()
	}
</script>
@endsection
