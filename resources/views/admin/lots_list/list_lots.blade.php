@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lots <a href="{{route('lots.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Block</th>
                                <th>Lot</th>
                                <th>Lot Type</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Block</th>
                                <th>Lot</th>
                                <th>Lot Type</th>
								<th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
							@foreach ($lots as $lot)
								<tr>
									<td>{{$lot->id}} </td>
									<td>{{$lot->block}} </td>
									<td>{{$lot->lot}} </td>
									<td>
									@foreach ($groups as $group)
										@if ($group->id==$lot->lot_type->lot_group_id)
											{{$group->name}}
										@endif
									@endforeach  - {{$lot->lot_type->name}} 
									</td>
									<td>{{$lot->description}}</td>
									<td>{{$lot->status}}</td>
									<td>
										<a href="{{ route('lots.edit', ['id' => $lot->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
										<a href="{{ route('lots.show', ['id' =>  $lot->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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