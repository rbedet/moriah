@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Memorial Lot Groups <a href="{{route('lot-groups.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
							@foreach ($lot_groups as $group_name)
							<tr>
								<td>{{ $group_name->id }}</td>
                                <td>{{ $group_name->name }}</td>
                                <td>{{ $group_name->description }}</td>
                                <td>
                                    <a href="{{ route('lot-groups.edit', ['id' => $group_name->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('lot-groups.show', ['id' => $group_name->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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