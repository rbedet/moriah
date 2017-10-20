@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Customers <a href="{{route('customers.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
							@foreach ($customers as $customer)
                            <tr>
								<td>{{$customer -> id}}</td>
                                <td>{{$customer -> first_name}} {{$customer -> last_name}}</td>
                                <td>
								{{$customer ->house_no}}
								{{$customer ->street}}
								{{$customer ->zipcode}}
								{{$customer ->barangay}}
								{{$customer ->municipality}}
								{{$customer ->province}}
								</td>
                                <td>@if ($customer -> inactive == 0) Active @else Inactive @endif</td>                       
                                <td>
                                    <a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('customers.show', ['id' => $customer->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
                            </tr>							
							@endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop