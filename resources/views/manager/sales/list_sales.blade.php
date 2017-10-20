@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales <a href="{{route('sales.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>Owner</th>
                                <th>Block - Lot</th>
                                <th>Lot Price</th>
                                <th>Sales Person</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th>ID</th>
                                <th>Owner</th>
                                <th>Block - Lot</th>
                                <th>Total Lot Price</th>
                                <th>Sales Person</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
							@foreach ($sales as $sale)
                            <tr>
								<td>{{$sale->id}}</td>
								<td>{{$sale->customer->first_name}} {{$sale->customer->middle_name}} {{$sale->customer->last_name}}</td>
                                <td>{{$sale->lot_info->block}}-{{$sale->lot_info->lot}}</td>
                                <td class="numeric">{{$sale->total_lot_price}}</td>
                                <td> @if (is_null($sale->sales_person))
										-
									@else
									<a href="{{ route('sales-person.edit', ['id' => $sale->sales_person->id]) }}">{{$sale->sales_person->first_name}} {{$sale->sales_person->middle_name}} {{$sale->sales_person->last_name}}</a> 
									@endif
								</td>
								<td>
                                    <a href="{{ route('sales.edit', ['id' => $sale->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-file" title="Show"></i> </a>
                                    <a href="{{ route('sales.show', ['id' => $sale->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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