@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Sales Person <a href="{{route('sales-person.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('sales-person.store') }}" data-parsley-validate class="form-horizontal form-label-left">
					
						<div class="form-group">
							<div class="row">
								<div class="col-xs-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
									<label for="first_name">First Name</label> <span class="required">*</span>
									<input class="form-control" name="first_name" id="first_name" value="{{ Request::old('first_name') ?: '' }}">
									@if ($errors->has('first_name'))
										<span class="help-block">{{ $errors->first('first_name') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('middle_name') ? ' has-error' : '' }}">
									<label for="middle_name">Middle Name</label>
									<input class="form-control" name="middle_name" id="middle_name" value="{{ Request::old('middle_name') ?: '' }}">
									@if ($errors->has('middle_name'))
										<span class="help-block">{{ $errors->first('middle_name') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('last_name') ? ' has-error' : '' }}">
									<label for="last_name">Last Name</label> <span class="required">*</span>
									<input class="form-control" name="last_name" id="last_name" value="{{ Request::old('last_name') ?: '' }}">
									@if ($errors->has('last_name'))
										<span class="help-block">{{ $errors->first('last_name') }}</span>
									@endif
								</div>
							</div>
						</div>
						<!-- /. name -->

						<div class="form-group">
							<div class="row">
								<div class="col-xs-4{{ $errors->has('house_no') ? ' has-error' : '' }}">
									<label for="house_no">House/Bldg. No.</label>
									<input class="form-control" name="house_no" id="house_no" value="{{ Request::old('house_no') ?: '' }}">
									@if ($errors->has('house_no'))
										<span class="help-block">{{ $errors->first('house_no') }}</span>
									@endif
								</div>
								<div class="col-xs-6{{ $errors->has('street') ? ' has-error' : '' }}">
									<label for="street">Street Name</label>
									<input class="form-control" name="street" id="street" value="{{ Request::old('street') ?: '' }}">
									@if ($errors->has('street'))
										<span class="help-block">{{ $errors->first('street') }}</span>
									@endif
								</div>
								<div class="col-xs-2{{ $errors->has('zipcode') ? ' has-error' : '' }}">
									<label for="zipcode">Zip Code</label>
									<input class="form-control" name="zipcode" id="zipcode" value="{{ Request::old('zipcode') ?: '' }}">
									@if ($errors->has('zipcode'))
										<span class="help-block">{{ $errors->first('zipcode') }}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4{{ $errors->has('barangay') ? ' has-error' : '' }}">
									<label for="barangay">Barangay</label>
									<input class="form-control" name="barangay" id="barangay" value="{{ Request::old('barangay') ?: '' }}"> 
									@if ($errors->has('barangay'))
										<span class="help-block">{{ $errors->first('barangay') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('municipality') ? ' has-error' : '' }}">
									<label for="municipality">City/Municipality</label>
									<input class="form-control" name="municipality" id="municipality" value="{{ Request::old('municipality') ?: '' }}">
									@if ($errors->has('municipality'))
										<span class="help-block">{{ $errors->first('municipality') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('province') ? ' has-error' : '' }}">
									<label for="province">Province</label>
									<input class="form-control" name="province" id="province" value="{{ Request::old('province') ?: '' }}">
									@if ($errors->has('province'))
										<span class="help-block">{{ $errors->first('province') }}</span>
									@endif
								</div>
							</div>
						</div>
						<!-- /. address -->
						
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Create Sales Person</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop