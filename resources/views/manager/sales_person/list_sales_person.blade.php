@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Person <a href="{{route('sales-person.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
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
							@foreach ($sales_people as $person)
                            <tr>
								<td>{{$person -> id}}</td>
                                <td>{{$person -> first_name}} {{$person -> last_name}}</td>
                                <td>
								{{$person ->house_no}}
								{{$person ->street}}
								{{$person ->zipcode}}
								{{$person ->barangay}}
								{{$person ->municipality}}
								{{$person ->province}}
								</td>
                                <td>@if ($person -> inactive == 0) Active @else Inactive @endif</td>                       
                                <td>
                                
									<a href="{{ route('sales-person.edit', ['id' => $person -> id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('sales-person.show', ['id' => $person -> id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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