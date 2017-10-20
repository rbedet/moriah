@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Customer <a href="{{route('deceased.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('deceased.update', ['id' => $deceased->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
					
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$deceased->first_name }}" id="first_name" name="first_name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ $deceased->last_name}}" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('last_name'))
                                <span class="help-block">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lot' ) ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot">Lot Location <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ $deceased->lot_id}}" id="lot" name="lot" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('lot'))
                                <span class="help-block">{{ $errors->first('lot') }}</span>
                                @endif
                            </div>
                        </div>			

                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthdate">Date of Birth <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" value="{{ $deceased->birthdate}}" id="birthdate" name="birthdate" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('birthdate'))
                                <span class="help-block">{{ $errors->first('birthdate') }}</span>
                                @endif
                            </div>
                        </div>			

                        <div class="form-group{{ $errors->has('deathdate') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deathdate">Date of Death <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" value="{{ $deceased->deathdate}}" id="deathdate" name="deathdate" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('deathdate'))
                                <span class="help-block">{{ $errors->first('deathdate') }}</span>
                                @endif
                            </div>
                        </div>
						
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Save Customer Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop