@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Deceased <a href="{{route('deceased.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birth Date</th>
                                <th>Death Date</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>                                
                                <th>Birth Date</th>
                                <th>Death Date</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
							@foreach ($deceased as $person)
                            <tr>
								<td>{{$person->id}}</td>
                                <td>{{$person->first_name}}</td>
                                <td>{{$person->last_name}}</td>
                                <td>{{$person->birthdate}}</td>                       
                                <td>{{$person->deathdate}}</td>                       
                                <td>{{$person->lot->block}}                       
									{{$person->lot->lot}}</td>                       
                                <td>
                                    <a href="{{ route('deceased.edit', ['id' => $person->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('deceased.show', ['id' => $person->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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