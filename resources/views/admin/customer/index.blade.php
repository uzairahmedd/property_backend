@extends('layouts.backend.app')
@section('content')
@include('layouts.backend.partials.headersection',['title'=>'All Customers'])
<div class="row">
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <form>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $src ?? '' }}">
                            <select class="form-control selectric" name="type">
                                <option value="name">{{ __('Search By Name') }}</option>
                                <option value="email">{{ __('Search By Email') }}</option>
                                <option value="id">{{ __('Search By Id') }}</option>
                            </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
       <form method="post" action="{{ route('admin.customer.destroy') }}" class="basicform">
          @csrf
            <div class="float-left mr-3">
                @can('customer.delete')
                <div class="input-group">
                    <select class="form-control selectric" name="status">
                        <option disabled selected="">{{ __('Select Action') }}</option>
                        <option value="1" >{{ __('Active') }}</option>
                        <option value="0" >{{ __('Deactive') }}</option>
                        <option value="delete" class="text-danger">{{ __('Delete Users Permanently') }}</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary basicbtn" type="submit">{{ __('Submit') }}</button>
                    </div>
                </div>
                @endcan
            </div>
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th class="am-select">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input checkAll" id="selectAll">
                            <label class="custom-control-label checkAll" for="selectAll"></label>
                        </div>
                    </th>
                    <th class="am-title">{{ __('Customer Id') }}</th>
                    <th class="am-title">{{ __('Name') }}</th>
                    <th class="am-title">{{ __('Email') }}</th>
                    <th class="am-title">{{ __('Level') }}</th>
                    <th class="am-title">{{ __('Orders') }}</th>
                    <th class="am-title">{{ __('Status') }}</th>
                    <th class="am-date">{{ __('Joining Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="ids[]" class="custom-control-input" id="customCheck{{ $customer->id }}" value="{{ $customer->id }}">
                            <label class="custom-control-label" for="customCheck{{ $customer->id }}"></label>
                            </div>
                        </th>
                        <td>{{ $customer->customer_id->content ?? '' }}</td>
                        <td>
                            {{ $customer->name }}

                            <div class="hover">
                            @can('customer.edit')
                            <a href="{{ route('admin.customer.edit',$customer->id) }}">{{ __('Edit') }}</a> |
                            @endcan
                            @can('customer.view')
                            <a href="{{ route('admin.customer.show',$customer->id) }}" class="last">{{ __('View') }}</a>
                            @endcan
                            </div>
                        </td>
                        <td>{{ $customer->email }}</td>
                        <td><a href="{{ url('/admin/level/'.$customer->level->id.'/edit') }}">{{ $customer->level->name }}</a></td>
                        <td>{{ $customer->order_count }}</td>
                        <td>@if($customer->status==1)  <span class="badge btn-success">{{ __('Active') }} </span>@elseif($customer->status==2) <span class="badge badge-warning"> Pending </span> @else <span class="badge badge-danger">{{ __('Deactive') }}</span> @endif</td>
                        <td>
                            <div class="date">
                            {{ $customer->created_at->format('d-F-Y') }}
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
                    <th class="am-title">{{ __('Customer Id') }}</th>
                    <th class="am-title">{{ __('Name') }}</th>
                    <th class="am-title">{{ __('Email') }}</th>
                    <th class="am-title">{{ __('Level') }}</th>
                    <th class="am-title">{{ __('Orders') }}</th>
                    <th class="am-title">{{ __('Status') }}</th>
                    <th class="am-date">{{ __('Joining Date') }}</th>
                </tr>
                </tfoot>
            </table>
            {{ $customers->links('vendor.pagination.bootstrap') }}
            </div>
       </form>
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

