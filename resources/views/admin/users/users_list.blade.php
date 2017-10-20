@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Users <a href="{{route('users.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
							@if(count($users))
								@foreach ($users as $user)
									<tr>
										<td>{{$user->id}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->username}}</td>
										<td>{{$user->email}}</td>
										<td>
										@foreach($user->roles as $r)
											<button title="{{$r->description}}" type="button" class="btn btn-success btn-xs">{{$r->display_name}}</button>
										@endforeach
										</td>
										<td>
											<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
											<a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
										</td>
									</tr>							
								@endforeach
							@endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop