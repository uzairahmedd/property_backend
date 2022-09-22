@extends('layouts.backend.app')

@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">

				<h5></h5>
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Name') }}: {{ $info->name }}
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Email') }}: {{ $info->email }}
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Phone') }}:
						{{ $info->phone->content ?? '' }}
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Address') }}:
						{{ $info->address->content ?? '' }}
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Identification number') }}:
						{{ $info->nid->content ?? '' }}
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Customer Id') }}:
						{{ $info->customer_id->content ?? '' }}
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Level') }}
						<span class="badge badge-primary badge-pill">{{ $info->level->name ?? '' }}</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Total Orders') }}
						<span class="badge badge-info badge-pill">{{ $info->order_count }}</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Total Pending Orders') }}
						<span class="badge badge-warning badge-pill">{{ $info->pending_order_count }}</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Total Complete Orders') }}
						<span class="badge badge-success badge-pill">{{ $info->complete_order_count }}</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						{{ __('Total Spend Of Amount') }}
						<span class="badge badge-primary badge-pill">{{ number_format($spends,2) }}</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>{{ __('Order History') }}</h4>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive table-invoice">
					<table class="table table-striped">
						<tbody><tr>
							<th>{{ __('Invoice ID') }}</th>
							<th>{{ __('Amount') }}</th>
							<th>{{ __('Items') }}</th>
							<th>{{ __('Payment Method') }}</th>
							<th>{{ __('Payment Status') }}</th>
							<th>{{ __('Order Status') }}</th>
							<th>{{ __('Due Date') }}</th>
							<th>{{ __('Action') }}</th>
						</tr>
						@foreach($oders as $row)
						<tr>
							<td><a href="{{ route('admin.order.invoice',$row->id) }}">{{ $row->order_no }}</a></td>
							<td class="font-weight-600">{{ number_format($row->amount,2) }}</td>
							<td class="font-weight-600">{{ $row->item_count }}</td>
							<td>{{ $row->payment_method }}</td>
							<td>{{ $row->payment_status }}</td>
							<td>@if($row->status == 'pending')
								<div class="badge badge-danger">
									{{ $row->status }}
								</div>
								@elseif($row->status == 'processing')
								<div class="badge badge-primary">
									{{ $row->status }}
								</div>
								@elseif($row->status == 'ready_for_pickup')
								<div class="badge badge-info">
									{{ str_replace('_', ' ', $row->status) }}
								</div>
								@elseif($row->status == 'completed')
								<div class="badge badge-success">
									{{ $row->status }}
								</div>

								@elseif($row->status == 'cancelled')
								<div class="badge badge-warning">
									{{ $row->status }}
								</div>
								@else
								<div class="badge badge-secondary">
									{{ $row->status }}
								</div>
							@endif</td>
							<td>{{ $row->created_at->format('d-F-Y') }}</td>
							<td>
								<a href="{{ url('admin/order/view',$row->id) }}" class="btn btn-primary">{{ __('Detail') }}</a>
							</td>
						</tr>
						@endforeach
					</tbody></table>
					{{ $oders->links('vendor.pagination.bootstrap') }}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>{{ __('Subscriptions History') }}</h4>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive table-invoice">
					<table class="table table-striped">
						<thead><tr>
							<th>{{ __('Level') }}</th>
							<th>{{ __('Amount') }}</th>
							<th>{{ __('Payment Status') }}</th>
							<th>{{ __('Payment Method') }}</th>
							<th>{{ __('Billcode') }}</th>
							<th>{{ __('Transaction id') }}</th>
							<th>{{ __('Created At') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($info->subscribe_log as $log)
						@php
						$json=json_decode($log->log);
						if ($log->payment_method=='toyyibpay') {
							$billcode=$json->billcode ?? '';
							$transaction_id=$json->transaction_id ?? '';
						}
						if ($log->payment_method=='bizappay') {
							$billcode=$json->billcode ?? '';
							$transaction_id=$json->billtrans ?? '';
						}
						@endphp
						<tr>
							<td>{{ $log->level->name }}</td>
							<td>{{ $log->amount }}</td>
							<td>@if($log->payment_status==1) <span class="badge badge-success">{{ __('Complete') }}</span> @else <span class="badge badge-danger">{{ __('Faild') }}</span> @endif</td>
							<td>{{ $log->payment_method }}</td>
							<td>{{ $billcode ?? '' }}</td>
							<td>{{ $transaction_id ?? '' }}</td>
							<td>{{ $log->created_at->format('d-F-Y') }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
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
	function success(res){
		location.reload();
	}
</script>
@endsection
