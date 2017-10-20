@extends('templates.admin.layout')
    <script>
	
        var lot_list = [
			@foreach ($lots as $lot)
            { value: '{{$lot->id}} - {{$lot->block}} {{$lot->lot}} - {{$lot->lot_group->name}} - {{$lot->lot_type->name}}', data: '{{$lot->id}}' },
			@endforeach
        ];

   </script>
@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Deceased <a href="{{route('deceased.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('deceased.store') }}" data-parsley-validate class="form-horizontal form-label-left">
					
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('first_name') ?: '' }}" id="first_name" name="first_name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('last_name') ?: '' }}" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('last_name'))
                                <span class="help-block">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lot' ) ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot">Lot Location <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('lot') ?: '' }}" id="lot" name="lot" class="form-control col-md-7 col-xs-12">
                                ID<input class="form-control" name="lot_id" id="lot_id" type="text">
								@if ($errors->has('lot'))
                                <span class="help-block">{{ $errors->first('lot') }}</span>
                                @endif
                            </div>
                        </div>			

                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthdate">Date of Birth <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" value="{{ Request::old('birthdate') ?: '' }}" id="birthdate" name="birthdate" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('birthdate'))
                                <span class="help-block">{{ $errors->first('birthdate') }}</span>
                                @endif
                            </div>
                        </div>			

                        <div class="form-group{{ $errors->has('deathdate') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deathdate">Date of Death <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" value="{{ Request::old('deathdate') ?: '' }}" id="deathdate" name="deathdate" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('deathdate'))
                                <span class="help-block">{{ $errors->first('deathdate') }}</span>
                                @endif
                            </div>
                        </div>
						
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Create Deceased</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop