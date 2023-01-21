@extends('layouts.backend.app')

@section('content')
@include('layouts.backend.partials.headersection',['title'=>'Properties List'])
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-lg-10">
                <div class="">
                    <a href="{{ route('admin.property.csv_page') }}" class="mr-2 btn btn-outline-primary @if($type=='all') active @endif">{{ __('Total') }} ({{ $totals }})</a>

                    <a href="{{ route('admin.property.csv_page_type',1) }}" class="mr-2 btn btn-outline-success @if($type==1) active @endif">{{ __('Published') }} ({{ $actives }})</a>

                    <a href="{{ route('admin.property.csv_page_type',2) }}" class="mr-2 btn btn-outline-info @if($type==2) active @endif">{{ __('Incomplete') }} ({{ $incomplete }})</a>
                    <a href="{{ route('admin.property.csv_page_type',3) }}" class="mr-2 btn btn-outline-warning @if($type==3) active @endif">{{ __('Pending For Approval') }} ({{ $pendings }})</a>

                    <a href="{{ route('admin.property.csv_page_type',4) }}" class="mr-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{ __('Rejected') }} ({{ $rejected }})</a>

                    <a href="{{ route('admin.property.csv_page_type',0) }}" class="mr-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{ __('Trash') }} ({{ $trash }})</a>
                </div>
            </div>
            <!-- <div class="col-lg-2">
                <a href="{{ route('admin.property.create') }}" class="btn btn-outline-primary add-property-btn">{{ __('Add') }}</a>
			</div> -->
        </div>
        <br>
        <div class="float-right">
            <form>
                <div class="input-group mb-2">
                    <input type="text" id="src" class="form-control h-100" placeholder="Search..." required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
                    <select class="form-control selectric" name="type" id="type">
                        <option value="name">{{ __('Search By Name') }}</option>
                        <option value="email">{{ __('Search User Email') }}</option>
                        <option value="unique_id">{{ __('Search By Id') }}</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <form method="post" action="{{ route('admin.properties.destroy') }}" class="basicform">
            @csrf
            <!-- <div class="float-left">

				@can('Properties.delete')
				<div class="input-group">
					<select class="form-control selectric" name="method">
						<option disabled selected="">{{ __('Select Action') }}</option>
						<option value="1">{{ __('Publish Now') }}</option>
						<option value="2">{{ __('Incomplete') }}</option>
						<option value="3">{{ __('Pending') }}</option>
						<option value="4">{{ __('Reject') }}</option>

						@if($type== 0 && $type != 'all')
						<option value="delete" class="text-danger">{{ __('Delete Permanently') }}</option>
						@else
						<option value="trash">{{ __('Move To Trash') }}</option>
						@endif
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary basicbtn" type="submit">{{ __('Submit') }}</button>
					</div>
				</div>
				@endcan
			</div> -->
            <div class="table-responsive custom-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="am-title">{{ __('Id') }}</th>
                            <th class="am-title">{{ __('Ad Id') }}</th>
                            <th class="am-title">{{ __('Name') }}</th>
                            <th class="am-date">{{ __('Mobile number') }}</th>
                            <th class="am-date">{{ __('Email') }}</th>
                            <th class="am-title">{{ __('Main type') }}</th>
                            <th class="am-title">{{ __('Subtype') }}</th>
                            <th class="am-date">{{ __('publication date') }}</th>
                            <th class="am-title">{{ __('Update date') }}</th>
                            <th class="am-title">{{ __('Expiration') }}</th>
                            <th class="am-title">{{ __('Status') }}</th>
                            <th class="am-title">{{ __('District') }}</th>
                            <th class="am-title">{{ __('City') }}</th>
                            <th class="am-title">{{ __('Using For') }}</th>
                            <th class="am-date">{{ __('Property Type') }}</th>
                            <th class="am-title">{{ __('The Space SQM') }}</th>
                            <th class="am-title">{{ __('Seling price') }}</th>
                            <th class="am-title">{{ __('Rental price') }}</th>
                            <th class="am-title">{{ __('Action') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $row)
                        <tr id="row{{  $row->id }}">
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->unique_id }}</td>
                            <td><a href="{{ route('admin.users.edit',$row->user->id) }}">{{ $row->user->name }}</a></td>
                            <td>{{$row->user->phone}}</td>
                            <td>{{$row->user->email}}</td>
                            <td>Offer</td>
                            <td>{{!empty($row->property_status_type) ? $row->property_status_type->category->name : 'N/A'}}</td>
                            <td><div class="scrollable">{{ $row->created_at }}</div></td>
                            <td><div class="scrollable">{{ $row->updated_at }}</div></td>
                            <td> {{date('d-m-Y', strtotime( $row->created_at->addMonths(3)))}} </td>
                            <td>
                                @if($row->status==1)
                                <span class="badge badge-success">{{ __('Published') }}</span>
                                @elseif($row->status==2)
                                <span class="badge badge-warning">{{ __('Incomplete') }}</span>

                                @elseif($row->status==0)
                                <span class="badge badge-danger">{{ __('Trash') }}</span>

                                @elseif($row->status==3)
                                <span class="badge badge-warning">{{ __('Pending') }}</span>
                                @elseif($row->status==4)
                                <span class="badge badge-danger">{{ __('Rejected') }}</span>
                                @endif
                            </td>
                            <td>{{ !empty($row->post_district) ? $row->post_district->district->name : 'N/A'}}</td>
                            <td>{{ !empty($row->post_new_city) ? $row->post_new_city->city->name : 'N/A'}}</td>
                            <td>{{ !empty($row->parentcategory) ? App\Category::where('id',$row->parentcategory->category_id)->first('name')->name : 'N/A' }}</td>
                            <td>{{ !empty($row->property_type) ? $row->property_type->category->name : 'N/A' }}</td>
                            <td><div class=scrollable><span>Built-up area: {{ !empty($row->builtarea) ? $row->builtarea->content : 'N/A' }}</span><span> Land area: {{ !empty($row->landarea) ? $row->landarea->content : 'N/A' }} </span></div></td>
                            @if(!empty($row->property_status_type) && $row->property_status_type->category->name == "Sale")
                            <td>{{!empty($row->price) ? $row->price->price : 'N/A' }}</td>
                            @else
                            <td>N/A</td>
                            @endif
                            @if(!empty($row->property_status_type) && $row->property_status_type->category->name == "Rent")
                            <td>{{!empty($row->price) ? $row->price->price : 'N/A' }}</td>
                            @else
                            <td>N/A</td>
                            @endif
                            <td><span><i class="fa fa-eye" onclick="get_property_data(this)" data-value="{{$row->id}}" data-toggle='tooltip' title="View data"></i></span></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="am-title">{{ __('Id') }}</th>
                            <th class="am-title">{{ __('Ad Id') }}</th>
                            <th class="am-title">{{ __('Name') }}</th>
                            <th class="am-date">{{ __('Mobile number') }}</th>
                            <th class="am-date">{{ __('Email') }}</th>
                            <th class="am-title">{{ __('Main type') }}</th>
                            <th class="am-title">{{ __('Subtype') }}</th>
                            <th class="am-date">{{ __('publication date') }}</th>
                            <th class="am-title">{{ __('Update date') }}</th>
                            <th class="am-title">{{ __('Expiration') }}</th>
                            <th class="am-title">{{ __('Status') }}</th>
                            <th class="am-title">{{ __('District') }}</th>
                            <th class="am-title">{{ __('City') }}</th>
                            <th class="am-title">{{ __('Using For') }}</th>
                            <th class="am-date">{{ __('Property Type') }}</th>
                            <th class="am-title">{{ __('The Space SQM') }}</th>
                            <th class="am-title">{{ __('Seling price') }}</th>
                            <th class="am-title">{{ __('Rental price') }}</th>
                            <th class="am-title">{{ __('Action') }}</th>
                        </tr>
                    </tfoot>
                </table>

        </form>
        {{ $posts->links('vendor.pagination.bootstrap') }}
    </div>
</div>
</div>
<!-- Modal  -->
<div class="modal fade" id="property_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CSV file data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="main_contend">
      
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
@endsection