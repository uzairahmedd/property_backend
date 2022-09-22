@extends('layouts.backend.app')
@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Getway List'])
<div class="card">
	<div class="card-body">
		<div class="table-responsive custom-table">
			<table class="table">
                <thead>
                    <tr>
                        <th class="am-title"><i class="far fa-image"></i></th>
                        <th class="am-title">{{ __('Name') }}</th>
                        <th class="am-title">{{ __('Status') }}</th>
                        <th class="am-date">{{ __('Last Update') }}</th>
                        <th class="am-date">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $row)
                    <tr>
                        <td><img src="{{ asset($row->slug) }}" height="50"></td>
                        <td>{{ $row->name }}</td>
                        <td>@if($row->status == 1) <span class="badge badge-success">{{ __('Active') }} </span> @else <span class="badge badge-danger">{{ __('disable') }} </span> @endif</td>
                        <td>{{ $row->updated_at->diffForHumans() }}</td>
                        <td><a href="{{ route('admin.payment.edit',$row->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
		</table>
	</div>
</div>
@endsection
