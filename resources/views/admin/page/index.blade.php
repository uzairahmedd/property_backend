@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Pages'])
<div class="card"  >
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{ __('Page List') }}</h4>
			</div>
			<div class="col-lg-6">
				<div class="add-new-btn">
					<a href="{{ route('admin.page.create') }}" class="btn float-right btn-primary">{{ __('Add New') }}</a>
				</div>
			</div>
		</div>
		<div class="card-action-filter mt-3">
			<form method="post" id="basicform" action="{{ route('admin.page.destroy') }}">
				@csrf
				<div class="float-left">
					<div class="input-group">
						<select class="form-control selectric" name="status">
							<option disabled="" selected="">{{ __('Select Action') }}</option>
							<option value="delete">{{ __('Delete Permanently') }}</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
						</div>
					</div>
				</div>
				<div class="float-right">
					<div class="form-group">
						<input type="text" id="data_search" class="form-control" placeholder="Enter Value">
					</div>
				</div>
			</div>
			<div class="table-responsive custom-table">
				<table class="table">
					<thead>
						<tr>
							<th class="am-select">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll"></label>
								</div>
							</th>
							<th class="am-title">{{ __('Title') }}</th>
							<th class="am-title">{{ __('Url') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pages as $page)
						<tr>
							<th>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $page->id }}" value="{{ $page->id }}">
									<label class="custom-control-label" for="customCheck{{ $page->id }}"></label>
								</div>
							</th>
							<td>
								{{ $page->title }}
								<div class="hover">
									<a href="{{ route('admin.page.edit',$page->id) }}">{{ __('Edit') }}</a>
								</div>
							</td>
							<input type="text" class="offscreen" id="myUrl{{ $page->id }}" value="{{ url('/page',$page->slug)  }}">
							<td style="cursor: pointer" onclick="copyUrl('{{ $page->id }}')">{{ url('/page',$page->slug)  }}</td>

							<td>{{ __('Last Modified') }}
								<div class="date">
									{{ $page->updated_at->diffForHumans() }}
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</form>
			</table>
			{{ $pages->links('vendor.pagination.bootstrap') }}
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
	"use strict";
	//response will assign this function
	function success(res){
		location.reload();
	}

	function copyUrl(id)
	{
		var copyText = document.getElementById("myUrl"+id);
		copyText.select();
		copyText.setSelectionRange(0, 99999)
		document.execCommand("copy");
		Sweet('success','Link copied to clipboard.');
	}

</script>
@endsection
