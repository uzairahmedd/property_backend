@extends('layouts.backend.app')

@section('content')
    @php
        $download_csv_of_property = __('labels.download_csv_of_property');
    @endphp
@include('layouts.backend.partials.headersection',['title' => $download_csv_of_property])
<div class="card">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap">
                    <a href="{{ route('admin.property.csv_page') }}" class="mr-2 mb-2 btn btn-outline-primary @if($type=='all') active @endif">{{__('labels.total')}} ({{ $totals }})</a>
                    <a href="{{ route('admin.property.csv_page_type',1) }}" class="mr-2 mb-2 btn btn-outline-success @if($type==1) active @endif">{{__('labels.published')}} ({{ $actives }})</a>
                    <a href="{{ route('admin.property.csv_page_type',2) }}" class="mr-2 mb-2 btn btn-outline-info @if($type==2) active @endif">{{__('labels.incomplete')}} ({{ $incomplete }})</a>
                    <a href="{{ route('admin.property.csv_page_type',3) }}" class="mr-2 mb-2 btn btn-outline-warning @if($type==3) active @endif">{{__('labels.pending_for_approval')}} ({{ $pendings }})</a>
                    <a href="{{ route('admin.property.csv_page_type',4) }}" class="mr-2 mb-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{__('labels.rejected')}} ({{ $rejected }})</a>
                    <a href="{{ route('admin.property.csv_page_type',0) }}" class="mr-2 mb-2 btn btn-outline-danger @if($type== 0 && $type != 'all') active @endif">{{__('labels.trash')}} ({{ $trash }})</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div style="color: red;">{{$error}}</div>
        @endforeach
        @endif
        @can('csv.export')
        <form method="post" action="{{ route('admin.properties.csv_download') }}">
            @csrf
                <div class="float-left export_csv mb-2">
                    <div class="d-flex">
                        <div>
                            <input type="text"  id="main_date" name="daterange" class="form-control" value="" placeholder="{{__('labels.please_select_date_range')}}" />
                            <input type="hidden" name="from_date" id="from_date">
                            <input type="hidden" name="to_date" id="to_date">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success export_csv_btn btn-sm">{{__('labels.export_csv_file')}}</button>
                        </div>
                    </div>
                </div>
        </form>
        @endcan
        <!-- </div> -->
        <br>
        <div class="float-right mb-2">
            <form>
                <div class="input-group mb-2">
                    <input type="text" id="src" class="form-control h-100" placeholder="{{__('labels.search')}}" required="" name="src" autocomplete="off" value="{{ $request->src ?? '' }}">
                    <select class="form-control selectric" name="type" id="type">
                        <option value="name">{{__('labels.search_by_name')}}</option>
                        <option value="email">{{__('labels.search_user_email')}}</option>
                        <option value="unique_id">{{__('labels.search_by_id')}}</option>
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
						<option disabled selected="">{{__('labels.select_action')}}</option>
						<option value="1">{{__('labels.publish_now')}}</option>
						<option value="2">{{__('labels.incomplete')}}</option>
						<option value="3">{{__('labels.pending')}}</option>
						<option value="4">{{__('labels.reject')}}</option>

						@if($type== 0 && $type != 'all')
						<option value="delete" class="text-danger">{{__('labels.delete_permanently')}}</option>
						@else
						<option value="trash">{{__('labels.move_to_trash')}}</option>
						@endif
					</select>
					<div class="input-group-append">
						<button class="btn btn-primary basicbtn" type="submit">{{__('labels.submit')}}</button>
					</div>
				</div>
				@endcan
			</div> -->
            <div class="table-responsive custom-table">
                <table class="table table-striped table-hover text-center table-borderless" id="properties">
                    <thead>
                        <tr>
                            <th class="am-title">{{__('labels.id')}}</th>
                            <th class="am-title">{{__('labels.ad_id')}}</th>
                            <th class="am-title">{{__('labels.name')}}</th>
                            <th class="am-date">{{__('labels.mobile_number')}}</th>
                            <th class="am-date">{{__('labels.email')}}</th>
                            <th class="am-title">{{__('labels.main_type')}}</th>
                            <th class="am-title">{{__('labels.subtype')}}</th>
                            <th class="am-date">{{__('labels.publication_date')}}</th>
                            <!-- <th class="am-title">{{__('labels.update_date')}}</th> -->
                            <th class="am-title">{{__('labels.expiration')}}</th>
                            <th class="am-title">{{__('labels.status')}}</th>
                            <th class="am-title">{{__('labels.district')}}</th>
                            <th class="am-title">{{__('labels.city')}}</th>
                            <th class="am-title">{{__('labels.using_for')}}</th>
                            <th class="am-date">{{__('labels.property_type')}}</th>
                            <th class="am-title">{{__('labels.space_sqm')}}</th>
                            <th class="am-title">{{__('labels.selling_price')}}</th>
                            <th class="am-title">{{__('labels.rental_price')}}</th>
                            <th class="am-title">{{__('labels.action')}}</th>

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
                            <td>{{__('labels.offer')}}</td>
                            <td>{{Session::get('locale') == 'ar' && !empty($row->property_status_type) ? @$row->property_status_type->category->ar_name :  @$row->property_status_type->category->name }}</td>
                            <td>
                                <div class="scrollable">{{ $row->created_at }}</div>
                            </td>
                            <!-- <td><div class="scrollable">{{ $row->updated_at }}</div></td> -->
                            <td> {{date('d-m-Y', strtotime( $row->created_at->addMonths(3)))}} </td>
                            <td>
                                @if($row->status==1)
                                <span class="badge badge-success">{{ __('labels.publish') }}</span>
                                @elseif($row->status==2)
                                <span class="badge badge-warning">{{ __('labels.incomplete') }}</span>

                                @elseif($row->status==0)
                                <span class="badge badge-danger">{{ __('labels.trash') }}</span>

                                @elseif($row->status==3)
                                <span class="badge badge-warning">{{ __('labels.pending') }}</span>
                                @elseif($row->status==4)
                                <span class="badge badge-danger">{{ __('labels.reject') }}</span>
                                @endif
                            </td>
                            <td>{{  Session::get('locale') == 'ar' && !empty($row->post_district) ? @$row->post_district->district->ar_name : @$row->post_district->district->name}}</td>
                            <td>{{ Session::get('locale') == 'ar' && !empty($row->post_new_city) ? @$row->post_new_city->city->ar_name :  @$row->post_new_city->city->name}}</td>
                            <td>{{  Session::get('locale') == 'ar' && !empty($row->parentcategory) ?  @App\Category::where('id',$row->parentcategory->category_id)->first('ar_name')->ar_name : @App\Category::where('id',$row->parentcategory->category_id)->first('name')->name }}</td>
                            <td>{{ Session::get('locale') == 'ar' && !empty($row->property_type) ? @$row->property_type->category->ar_name  : @$row->property_type->category->name }}</td>
                            <td>
                                <div class=scrollable><span>{{__('labels.built_up_area')}}: {{ !empty($row->builtarea) ? $row->builtarea->content : 'N/A' }}</span><span> {{__('labels.land_area')}}: {{ !empty($row->landarea) ? $row->landarea->content : 'N/A' }} </span></div>
                            </td>
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
                            <td><span><i class="fa fa-eye" title="{{__('labels.view_data')}}" toggle='tooltip' onclick="get_property_data(this)" data-value="{{$row->id}}" data-toggle='tooltip' title="View data"></i></span></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="am-title">{{__('labels.id')}}</th>
                            <th class="am-title">{{__('labels.ad_id')}}</th>
                            <th class="am-title">{{__('labels.name')}}</th>
                            <th class="am-date">{{__('labels.mobile_number')}}</th>
                            <th class="am-date">{{__('labels.email')}}</th>
                            <th class="am-title">{{__('labels.main_type')}}</th>
                            <th class="am-title">{{__('labels.subtype')}}</th>
                            <th class="am-date">{{__('labels.publication_date')}}</th>
                            <!-- <th class="am-title">{{__('labels.update_date')}}</th> -->
                            <th class="am-title">{{__('labels.expiration')}}</th>
                            <th class="am-title">{{__('labels.status')}}</th>
                            <th class="am-title">{{__('labels.district')}}</th>
                            <th class="am-title">{{__('labels.city')}}</th>
                            <th class="am-title">{{__('labels.using_for')}}</th>
                            <th class="am-date">{{__('labels.property_type')}}</th>
                            <th class="am-title">{{__('labels.space_sqm')}}</th>
                            <th class="am-title">{{__('labels.selling_price')}}</th>
                            <th class="am-title">{{__('labels.rental_price')}}</th>
                            <th class="am-title">{{__('labels.action')}}</th>
                        </tr>
                    </tfoot>
                </table>

        </form>
        <div class="d-flex justify-content-center">
            {{ $posts->links('vendor.pagination.bootstrap') }}
        </div>
    </div>
</div>
</div>
<!-- Modal  -->
<div class="modal fade" id="property_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('labels.csv_file_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="main_contend">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('labels.close')}}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('admin/js/form.js') }}"></script>

<script>
    "use strict";
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            maxDate: moment(),
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        }, function(start, end, label) {
            $('#from_date').val(start.format('YYYY-MM-DD'));
            $('#to_date').val(end.format('YYYY-MM-DD'));
            $('#main_date').val(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });

    $(document).ready(function() {
        var table = $('#properties').DataTable( {
            scrollX:        true,
            scrollCollapse: true,
            autoWidth:         true,
            tLengthChange : true,
            bLengthChange : false,
            bInfo:false,
            paging:         false,
            columnDefs: [
                { "width": "130px", "targets": [3,4] },
                { "width": "120px", "targets": [5,6,13,15,16,7,8,14] },
                { "width": "100px", "targets": [13,1,2,10,11,12] },
            ]
        } );
    });
</script>
@endsection
