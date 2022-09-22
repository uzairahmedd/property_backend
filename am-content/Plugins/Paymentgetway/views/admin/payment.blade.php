@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Currency And Payment'])
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<form method="post" action="{{ route('admin.payment.store') }}" class="basicform">
					@csrf
					<div class="form-group">
						<label>{{ __('Currency Name') }}</label>
						<input type="text" name="currency_name" class="form-control" value="{{ $info->currency_name ?? '' }}">
					</div>
					<div class="form-group">
						<label>{{ __('Currency icon') }}</label>
						<input type="text" name="currency_icon" class="form-control" value="{{ $info->currency_icon ?? '' }}">
					</div>
					<div class="form-group">
						<label>{{ __('Currency Position') }}</label>
						<select  class="form-control" name="currency_position">
							<option value="left">{{ __('Left') }}</option>
							<option value="right">{{ __('Right') }}</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary basicbtn">{{ __('Update') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/form.js') }}"></script>
@endsection
