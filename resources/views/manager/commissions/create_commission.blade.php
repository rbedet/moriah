@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
		<!--Owner Information -->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Owner Information</h2>
					<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
								<label for="first_name">First Name</label> <span class="required">*</span>
								<input class="form-control" name="first_name" id="first_name" value="{{$sale->customer->first_name}}" readonly>
								@if ($errors->has('first_name'))
									<span class="help-block">{{ $errors->first('first_name') }}</span>
								@endif
							</div>
							<div class="col-xs-4{{ $errors->has('middle_name') ? ' has-error' : '' }}">
								<label for="middle_name">Middle Name<span class="required">*</span></label>
								<input class="form-control" name="middle_name" id="middle_name" value="{{$sale->customer->middle_name}}" readonly>
								@if ($errors->has('middle_name'))
									<span class="help-block">{{ $errors->first('middle_name') }}</span>
								@endif
							</div>
							<div class="col-xs-4{{ $errors->has('last_name') ? ' has-error' : '' }}">
								<label for="last_name">Last Name</label> <span class="required">*</span>
								<input class="form-control" name="last_name" id="last_name" value="{{$sale->customer->last_name}}" readonly>
								@if ($errors->has('last_name'))
									<span class="help-block">{{ $errors->first('last_name') }}</span>
								@endif
							</div>
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label" for="lot_type">Address</label>
						<input type="text" value="" id="lot" name="lot_type" class="form-control" readonly>
					</div>					
                </div>
            </div>
        </div>
		
		<!--Lot Information -->
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
                <div class="x_title">
                    <h2>Lot Information</h2>
					<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
				<div class="x_content">
					<div class="form-group col-md-6">
						<div class="row col-md-12">
							<label class="control-label" for="block">Block</label>
							<input type="text" value="{{$sale->lot_info->block}}" id="block" name="block" class="form-control" readonly> 
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="row col-md-12">
							<label class="control-label" for="lot">Lot</label>
							<input type="text" value="{{$sale->lot_info->lot}}" id="lot" name="lot" class="form-control" readonly> 
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="control-label" for="lot_type">Lot Type</label>
						<input type="text" value="{{$type->lot_group->name}} - {{$type->name}}" id="lot" name="lot_type" class="form-control" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Row -->
	<div class="row">
		<!--lot computation-->
        <div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Lot Computation</h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>						
					<div class="clearfix"></div>		
				</div>
				<div class="x_content">	
					<br />					
					<div class="form-group">
						<label class="control-label" for="">Lot Price</label>
						<input type="text" value="{{$sale->lot_price}}" id="" name="" class="form-control numeric" readonly>
					</div>					
					<div class="form-group">
						<label class="control-label" for="">PCF</label>
						<input type="text" value="{{$sale->pcf_amount}}" id="" name="" class="form-control numeric" readonly>
					</div>					
					<div class="form-group">
						<label class="control-label" for="">VAT</label>
						<input type="text" value="{{$sale->vat_amount}}" id="" name="" class="form-control numeric" readonly>
					</div>					
					<div class="form-group">
						<label class="control-label" for="">Vault Fee</label>
						<input type="text" value="{{$sale->fee_amount}}" id="" name="" class="form-control numeric" readonly>
					</div>					
					<div class="form-group">
						<label class="control-label" for="">Total Lot Price</label>
						<input type="text" value="{{$sale->total_lot_price}}" id="" name="" class="form-control numeric" readonly>
					</div>
				</div>
			</div>
		</div>
		<!--End Computation -->
		<!-- Commission Info -->
		 <div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Sales Commission
					@if ($sale->commission == null)
					<form method="post" action="{{ route('commissions.store') }}" data-parsley-validate class="form-horizontal form-label-left">
						<input type="hidden" name="sales_person_id" value="{{$sale->sales_person_id}}">
						<input type="hidden" name="purchase_detail_id" value="{{$sale->id}}">
						<input type="hidden" name="sales" value="{{$sale->lot_price}}">
						<input type="hidden" name="commission_percentage" value="5">
						<input type="hidden" name="_token" value="{{ Session::token() }}">
						<button type="submit" class="btn btn-success btn-xs">Create</button>
					</form>
					@endif
					</h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>						
					<div class="clearfix"></div>		
				</div>
				<div class="x_content">	
				<br />@if ($sale->commission != null)
					<div class="form-group">
						<label class="control-label" for="">Commission Percentage</label>
						<input type="text" value="{{$sale->commission->commission_percentage}}%" id="" name="" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label class="control-label" for="">Commission Earned</label>
						<input type="text" value="{{$sale->commission->earned_commission}}" id="" name="" class="form-control numeric" readonly>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@stop