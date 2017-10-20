@extends('templates.admin.layout')

@section('content')

<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Memorial Lot Types <a href="{{route('lot-types.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
					<div class="clearfix"> </div>
				</div>
				
				<div class="x_content">
					<table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>Lot Type Name</th>
                                <th>Lot Group</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th>ID</th>
								<th>Lot Type Name</th>
                                <th>Lot Group</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
						<tbody>							
							@foreach ($lot_types as $type_name)
								<tr>
									<td>{{$type_name->id}}</td>
									<td>{{$type_name->name}}</td>
									<td>{{$type_name->lot_group->name}}</td>
									<td>{{$type_name->price}}</td>
									<td>
										<a href="{{ route('lot-types.edit', ['id' => $type_name->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
										<a href="{{ route('lot-types.show', ['id' => $type_name->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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