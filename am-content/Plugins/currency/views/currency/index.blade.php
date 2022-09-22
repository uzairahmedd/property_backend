@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Currencies'])
<div class="card">
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{ __('Currency') }}</h4>
			</div>
			<div class="col-lg-6">
				<div class="add-new-btn">
					<a href="{{ route('admin.currency.create') }}" class="btn float-right btn-primary">{{ __('Add New') }}</a>
				</div>
			</div>
		</div>
		<div class="card-action-filter mt-3">
			<form method="post" id="basicform" action="{{ route('admin.currency.destroy') }}">
				@csrf
				<div class="float-left">
					<div class="input-group">
						<select class="form-control selectric" name="method">
							<option value="">{{ __('Select Action') }}</option>
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
									<input type="checkbox" class="custom-control-input checkAll" id="customCheck12">
									<label class="custom-control-label checkAll" for="customCheck12"></label>
								</div>
							</th>
							<th class="am-title">{{ __('Currency Name') }}</th>
							<th class="am-title">{{ __('Currency Symbol') }}</th>
							<th class="am-title">{{ __('Currency Price') }}</th>
							<th class="am-title">{{ __('Is Default') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($currencies as $currency)
                            <tr>
                                <th>
                                	@if($currency->status==0)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $currency->id }}" value="{{ $currency->id }}">
                                        <label class="custom-control-label" for="customCheck{{ $currency->id }}"></label>
                                    </div>
                                    @endif
                                </th>
                                <td>{{ $currency->name }}
                                    <div class="hover">
                                        <a href="{{ route('admin.currency.edit',$currency->id) }}">{{ __('Edit') }}</a>
                                    </div>
                                </td>
                                <td>{{ $currency->slug }}</td>
                                <td>{{ $currency->featured }}</td>
                                <td>@if($currency->status==1) <span class="badge badge-success">{{ __('Yes') }}</span> @else <span class="badge badge-danger">{{ __('No') }}</span> @endif</td>
                                <td>{{ __('Last Modified') }}
                                    <div class="date">
                                        {{ $currency->updated_at->diffForHumans() }}
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
                        <th class="am-title">{{ __('Currency Name') }}</th>
                        <th class="am-title">{{ __('Currency Symbol') }}</th>
						<th class="am-title">{{ __('Currency Price') }}</th>
						<th class="am-title">{{ __('Is Default') }}</th>
                        <th class="am-date">{{ __('Last Update') }}</th>
					</tr>
				</tfoot>
			</table>
			{{ $currencies->links('vendor.pagination.bootstrap') }}
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script type="text/javascript">
	"use strict";
	//response will assign this function
	function success(res){
		location.reload();
	}
</script>
@endsection
