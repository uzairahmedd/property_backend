@extends('layouts.backend.app')

@section('content')
<div class="card"  >
	<div class="card-body">
		<div class="row mb-30">
			<div class="col-lg-6">
				<h4>{{ __('Backup List') }}</h4>
			</div>
			<div class="col-lg-6">
				<div class="add-new-btn">
					<a href="javascript:void(0)" onclick="generateBackup('{{ route('admin.backup.store') }}')" class="btn btn-primary float-right">{{ __('Generate Backup') }}</a>
				</div>
			</div>
		</div>
		<br>
			<div class="table-responsive custom-table">
				<table class="table">
					<thead>
						<tr>
							<th class="am-select">{{ __('Id') }}</th>
							<th class="am-title">{{ __('File Name') }}</th>
							<th class="am-title">{{ __('File Directory') }}</th>
							<th class="am-title">{{ __('Action') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($file_lists as $key=>$list)
						@if($key != 0 && $key != 1)
						<tr>
							<td>{{ $key - 1 }}</td>
							<td>{{ $list }}</td>
							<td>{{ storage_path('app/'.env('APP_NAME').'/'.$list) }}</td>
							<td>
								<a href="{{ route('admin.backup.download',$list) }}" class="btn btn-primary">{{ __('Download') }}</a>
								<a href="{{ route('admin.backup.delete',$list) }}" class="btn btn-danger">{{ __('Delete') }}</a>
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
				</form>
				<tfoot>
					<tr>
						<th class="am-select">{{ __('Id') }}</th>
						<th class="am-title">{{ __('File Name') }}</th>
						<th class="am-title">{{ __('File Directory') }}</th>
						<th class="am-title">{{ __('Action') }}</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
    "use strict";
	function generateBackup(url)
	{
		$.ajax({
			type: 'GET',
			url: url,
			dataType: 'json',
			cache: false,
			beforeSend: function() {
       			$('.loading').fadeIn();
    		},
			success: function(response){
				if(response == 'ok')
				{
					$('.loading').fadeOut();
					Sweet('success','Backup Generated');
					setTimeout(() => {
						location.reload();
					}, 2000);
				}
			},
			error: function(xhr, status, error)
			{
				$('.loading').fadeOut();
				$('.errorarea').show();
				$.each(xhr.responseJSON.errors, function (key, item)
				{
					Sweet('error',item)
					$("#errors").html("<li class='text-danger'>"+item+"</li>")
				});
				errosresponse(xhr, status, error);
			}
		})
	}
</script>
@endsection
