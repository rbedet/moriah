@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Home Page</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
