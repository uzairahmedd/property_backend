@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'All Transactions'])
<div class="card">
	<div class="card-body">
		<div class="float-left">
			<h5>{{ __('Transactions') }}</h5>
		</div>
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="payment_id" @if($request->type == 'payment_id') selected @endif>{{ __('Search By  Transaction Id') }}</option>
						<option value="payment_method" @if($request->type == 'payment_method') selected @endif>{{ __('Search By  Payment Method') }}</option>
						<option value="user_id" @if($request->type == 'id') selected @endif>{{ __('Search By User Id') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="table-responsive custom-table">
			<table class="table">
				<thead>
					<tr>
						<th class="am-title">{{ __('User') }}</th>
						<th class="am-title">{{ __('Package Name') }}</th>
						<th class="am-title">{{ __('Payment Getway') }}</th>
						<th class="am-title">{{ __('Transaction Id') }}</th>
						<th class="am-date">{{ __('Credits') }}</th>
						<th class="am-date">{{ __('Amount') }}</th>
						<th class="am-date">{{ __('Transaction At') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $row)
					<tr>
						<td><a href="{{ url('/admin/agent/'.$row->user_id.'/edit') }}">{{ $row->user->name }}</a></td>
						<td>{{ $row->package->title }}</td>
						<td>{{ $row->payment_method }}</td>
						<td>{{ $row->payment_id }}</td>
						<td>{{ $row->credits }}</td>
						<td>{{ $row->amount }}</td>
						<td>{{ $row->created_at->format('d-F-Y') }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		{{ $posts->appends($request->all())->links('vendor.pagination.bootstrap') }}
	</div>
</div>
@endsection
