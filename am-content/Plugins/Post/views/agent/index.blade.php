@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'All Agents'])
<div class="card">
	<div class="card-body">
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="name" @if($request->type == 'name') selected @endif>{{ __('Search By Name') }}</option>
						<option value="email" @if($request->type == 'email') selected @endif>{{ __('Search User Email') }}</option>
						<option value="id" @if($request->type == 'id') selected @endif>{{ __('Search By Id') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.agent.destroy') }}" class="basicform">
			@csrf
			<div class="float-left">
				<div class="input-group">
					<select class="form-control selectric" name="status">
						<option disabled="" selected="">{{ __('Select Action') }}</option>
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
									<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
									<label class="custom-control-label checkAll" for="selectAll"></label>
								</div>
							</th>
							<th class="am-title">{{ __('Name') }}</th>
							<th class="am-title">{{ __('Credits') }}</th>
							<th class="am-title">{{ __('Avatar') }}</th>
							<th class="am-title">{{ __('Email') }}</th>
							<th class="am-title">{{ __('Status') }}</th>
							<th class="am-title">{{ __('Last Activity') }}</th>
							<th class="am-title">{{ __('Last Login Ip') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($agents as $agent)
						<tr>
							<th>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $agent->id }}" value="{{ $agent->id }}">
									<label class="custom-control-label" for="customCheck{{ $agent->id }}"></label>
								</div>
							</th>
							<td>
								{{ $agent->name }}
								<div class="hover">
									<a  href="{{ route('admin.agent.edit',$agent->id) }}">Edit</a> | <a href="{{ route('admin.agent.login',$agent->id) }}">Login</a>
								</div>
                            </td>
                            <td>{{ $agent->credits }}</td>
							<td>
                                @if($agent->avatar == null)
                                <img src="{{ url('https://ui-avatars.com/api/?name='.$agent->name) }}" alt="" class="rounded-circle ob-cover">
                                @else
                                <img src="{{ asset($agent->avatar) }}" alt="" class="rounded-circle ob-cover">
                                @endif
                            </td>
                            <td>{{ $agent->email }}</td>
                            <td>
                                @if($agent->status == 1)
                                <span class="badge badge-success">{{ __('active') }}</span>
                                @elseif($agent->status == 2)
                                <span class="badge badge-warning">{{ __('Pending') }}</span>
                                @else
                                <span class="badge badge-danger">{{ __('suspended') }}</span>
                                @endif
                            </td>
                            <td>@if(!empty($agent->user_session)) {{ date('Y-m-d H:i:s', $agent->user_session->last_activity) }} @endif</td>
                            <td>@if(!empty($agent->user_session)) {{  $agent->user_session->ip_address }} @endif</td>
							<td>{{ __('Last Modified') }}
								<div class="date">
									{{ $agent->updated_at->diffForHumans() }}
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
								<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
								<label class="custom-control-label checkAll" for="selectAll"></label>
							</div>
						</th>
						<th class="am-title">{{ __('Name') }}</th>
						<th class="am-title">{{ __('Credits') }}</th>
                        <th class="am-title">{{ __('Avatar') }}</th>
                        <th class="am-title">{{ __('Email') }}</th>
                        <th class="am-title">{{ __('Status') }}</th>
                        <th class="am-title">{{ __('Last Activity') }}</th>
                        <th class="am-title">{{ __('Last Login Ip') }}</th>
                        <th class="am-date">{{ __('Last Update') }}</th>
					</tr>
				</tfoot>
			</table>
			{{ $agents->links('vendor.pagination.bootstrap') }}
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
