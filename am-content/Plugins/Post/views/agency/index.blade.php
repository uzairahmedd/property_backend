@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'All Agencies'])
<div class="card">
	<div class="card-body">
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="text" id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="name" @if($request->type == 'name') selected @endif>{{ __('Search By Name') }}</option>
						<option value="id" @if($request->type == 'id') selected @endif>{{ __('Search Id') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.agency.delete') }}" class="basicform">
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
							<th class="am-title">{{ __('Team member') }}</th>
							<th class="am-title">{{ __('Status') }}</th>
							<th class="am-date">{{ __('Last Update') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($agencies as $agency)
						<tr>
							<th>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $agency->id }}" value="{{ $agency->id }}">
									<label class="custom-control-label" for="customCheck{{ $agency->id }}"></label>
								</div>
							</th>
							<td>
								{{ $agency->name }}
								<div class="hover">
									<a href="{{ route('admin.agency.edit',$agency->id) }}">{{ __('Edit') }}</a>
								</div>
                            </td>
                            <td>
                                @if($agency->agency->count() > 0)
								@foreach($agency->agency as $member)
								@if(App\Models\User::find($member->user_id)->avatar == null)
								<a href="#" class="mr-2">
                                    <img class="rounded-circle ob-cover" src="{{ asset('https://ui-avatars.com/api/?name='.App\Models\User::find($member->user_id)->name)  }}" alt="">
								</a>
								@else
								<a href="#" class="mr-2">
                                    <img class="rounded-circle ob-cover" src="{{ asset(App\Models\User::find($member->user_id)->avatar)  }}" alt="">
								</a>
								@endif
                                @endforeach
                                @endif
                            </td>
                            <td>
								@if($agency->status == 1)
								<span class="badge badge-success">{{ __('Active') }}</span>
								@elseif($agency->status == 2)
								<span class="badge badge-waring">{{ __('pending') }}</span>
								@else
								<span class="badge badge-danger">{{ __('suspended') }}</span>
								@endif
                            </td>
							<td>{{ __('Last Modified') }}
								<div class="date">
									{{ $agency->updated_at->diffForHumans() }}
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
                        <th class="am-title">{{ __('team member') }}</th>
                        <th class="am-title">{{ __('Status') }}</th>
                        <th class="am-date">{{ __('Last Update') }}</th>
					</tr>
				</tfoot>
			</table>
			{{ $agencies->links('vendor.pagination.bootstrap') }}

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
