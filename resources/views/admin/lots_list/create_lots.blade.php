@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Lot <a href="{{route('lots.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('lots.store') }}" data-parsley-validate class="form-horizontal form-label-left">
					
						<div class="form-group{{ $errors->has('lot_type') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot_type">Select Lot Type<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="select2_group form-control" id="lot_type" name="lot_type">
									@foreach ($lot_groups as $group)
										<optgroup label="{{$group->name}}">
										@foreach ($lot_types as $type)
											@if ($type->lot_group_id == $group->id)
											 <option value="{{$type->id}}">{{$type->name}}</option>
											@endif
										@endforeach
										</optgroup>
									@endforeach
								</select>
								@if ($errors->has('lot_type'))
                                <span class="help-block">{{ $errors->first('lot_type') }}</span>
                                @endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('block') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="block">Block<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="block" name="block" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('block'))
                                <span class="help-block">{{ $errors->first('block') }}</span>
                                @endif
							</div>
						</div>
								
						<div class="form-group{{ $errors->has('lot') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="lot_type">Lot<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="lot" name="lot" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('lot'))
                                <span class="help-block">{{ $errors->first('lot') }}</span>
                                @endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Select Lot Type<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="select2_group form-control" id="status" name="status">
									<option value="Available">Available</option>
									<option value="Occupied">Occupied</option>
									<option value="Reserved">Reserved</option>
								</select>
								@if ($errors->has('status'))
                                <span class="help-block">{{ $errors->first('status') }}</span>
                                @endif
							</div>
						</div>
						

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lot Description
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('description') ?: '' }}" id="description" name="description" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('description'))
                                <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Create Lot</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop