@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'All Reviews'])
<div class="card">
	<div class="card-body">
		<div class="float-right">
			<form>
				<div class="input-group mb-2">
					<input type="number" id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
					<select class="form-control selectric" name="type" id="type">
						<option value="term_id" @if($request->type == 'term_id') selected @endif>{{ __('Search By Post Id') }}</option>
						<option value="user_id" @if($request->type == 'user_id') selected @endif>{{ __('Search By Agent Id') }}</option>
						<option value="id" @if($request->type == 'id') selected @endif>{{ __('Search By Id') }}</option>
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<form method="post" action="{{ route('admin.reviews.destroy') }}" class="basicform">
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
							<th class="am-title">{{ __('Agent') }}</th>
							<th class="am-title">{{ __('Post') }}</th>
							<th class="am-title">{{ __('Star') }}</th>
							<th class="am-title">{{ __('Review') }}</th>
							<th class="am-title">{{ __('Is Reported') }}</th>
							<th class="am-date">{{ __('Created At') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $row)
						<tr>
							<td>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $row->id }}" value="{{ $row->id }}">
									<label class="custom-control-label" for="customCheck{{ $row->id }}"></label>
								</div>
							</td>
							<td><a href="{{ url('/admin/agent/'.$row->user->id.'/edit') }}">{{ $row->user->name }}</a></td>
							<td><a href="{{ url('/property',$row->term->slug) }}" target="_blank">{{ Str::limit($row->term->slug,20) }}</a></td>
							<td>{{ $row->rating }}</td>
							<td>{{ Str::limit($row->review,20) }}</td>
							<td>@if($row->is_reported == 1) <span class="badge badge-success">Yes</span> @else <span class="badge badge-danger">No</span> @endif</td>

							<td>{{ __('Created At') }}
								<div class="date">
									{{ $row->updated_at->diffForHumans() }}
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
                        <th class="am-title">{{ __('Agent') }}</th>
                        <th class="am-title">{{ __('Post') }}</th>
                        <th class="am-title">{{ __('Star') }}</th>
                        <th class="am-title">{{ __('Review') }}</th>
                        <th class="am-title">{{ __('Is Reported') }}</th>
                        <th class="am-date">{{ __('Created At') }}</th>
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
@endsection
