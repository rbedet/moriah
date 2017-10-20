@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Memorial Lot Type <a href="{{route('lot-types.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('lot-types.update', ['id' => $type->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
						<div class="form-group{{ $errors->has('lot_type_name') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot_type_name">Lot Type Name <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="{{$type->name}}" id="lot_type_name" name="lot_type_name" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('lot_type_name'))
                                <span class="help-block">{{ $errors->first('lot_type_name') }}</span>
                                @endif
							</div>
						</div>
															
						<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="{{$type->description}}" id="description" name="description" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('description'))
								<span class="help-block">{{ $errors->first('description') }} </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('lot_group') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot_group">Lot Group <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="lot_group" name="lot_group">
									<option value="">Choose Option</option>
									@foreach ($groups as $group)
										<option value="{{$group->id}}" @if ($type->lot_group_id == $group->id) selected @endif>{{$group->name}}</option>
									@endforeach
								</select>
                                
                                @if ($errors->has('lot_group'))
                                <span class="help-block">{{ $errors->first('lot_group') }}</span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group has-feedback{{ $errors->has('lot_price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot_price">Lot Price </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$type->price}}" id="lot_price" name="lot_price" class="form-control col-md-7 col-xs-12"><span class="form-control-feedback right" aria-hidden="true">Php</span>
                                @if ($errors->has('lot_price'))
                                <span class="help-block">{{ $errors->first('lot_price') }}</span>
                                @endif
                            </div>
                        </div>								
						
						<div class="form-group{{ $errors->has('pcf') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="pcf">PCF Percent </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="{{$type->pcf_percent}}" id="pcf" name="pcf" class="form-control col-md-7 col-xs-12">
								<span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>
								@if ($errors->has('pcf'))
								<span class="help-block">{{ $errors->first('pcf') }} </span>
								@endif	
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="vat">VAT Percent </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="{{$type->vat_percent}}" id="vat" name="vat" class="form-control col-md-7 col-xs-12">
								<span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>
								@if ($errors->has('vat'))
								<span class="help-block">{{ $errors->first('vat') }} </span>
								@endif	
							</div>
						</div>
						

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Save Lot Type Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop