@extends('templates.admin.layout')

@section('content')
    <script>
        var customer_list = [
			@foreach ($customers as $customer)
            { value: '{{$customer->id}} - {{$customer->first_name}} {{$customer->last_name}}', data: '{{$customer->id}}' },
			@endforeach
        ];
		
        var sales_people_list = [
			@foreach ($sales_people as $sales_person)
            { value: '{{$sales_person->id}} - {{$sales_person->first_name}} {{$sales_person->last_name}}', data: '{{$sales_person->id}}' },
			@endforeach
        ];

        var lot_list = [
			@foreach ($lots as $lot)
            { value: '{{$lot->id}} - {{$lot->block}} {{$lot->lot}} - {{$lot->lot_group->name}} - {{$lot->lot_type->name}}', data: '{{$lot->id}}' },
			@endforeach
        ];

   </script>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="page-title">
              <div class="title_left">
                <h3>Create Sales <a href="{{route('sales.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h3>
              </div>
            </div>
			<form method="post" action="{{ route('sales.store') }}" data-parsley-validate class="form-horizontal form-label-left">
				
				<div class="x_panel">
					<div class="x_title">
						<h2>Step 1 Basic Information</h2>
						<div class="clearfix"></div>		
					</div>
					<div class="x_content">	
						<br />
						<div class="form-group{{ $errors->has('customer') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Owner<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-12" name="customer" id="customer">
								<input class="form-control" name="customer_id" id="customer_id" type="hidden">
								@if ($errors->has('customer'))
									<span class="help-block">{{ $errors->first('customer') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('sales_person') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sales_person">Agent</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-12" name="sales_person" id="sales_person">
								<input class="form-control" name="sales_person_id" id="sales_person_id" type="hidden">
								@if ($errors->has('sales_person'))
									<span class="help-block">{{ $errors->first('sales_person') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('lot') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot">Lot<span class="required">*</span></label></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-12" name="lot" id="lot" type="text">
								ID<input class="form-control" name="lot_id" id="lot_id" type="text">
								@if ($errors->has('lot'))
									<span class="help-block">{{ $errors->first('lot') }}</span>
								@endif
							</div>
						</div>					
					</div>
				</div>
								
				<div class="x_panel">
					<div class="x_title">
						<h2>Step 2 Lot Computation</h2>
						<div class="clearfix"></div>		
					</div>
					<div class="x_content">	
						<br />
						<div class="col-md-4">					
						</div>
						<div class="col-md-4">					
					
						<div class="form-group col-md-4">
							<label for="pcf_percent">PCF %</label>
							<input type="number" class="form-control" name="pcf_percent" id="pcf_percent" value="20" onkeyup="getLotPrice();">
						</div>
						<div class="form-group col-md-4">
							<label for="vat_percent">VAT %</label>
							<input type="number" class="form-control" name="vat_percent" id="vat_percent" value="12" onkeyup="getLotPrice();">
						</div>
						</div>
						
						<div class="clearfix"></div>
						<div class="divider-dashed"></div>
						<div class="form-group{{ $errors->has('lot_price') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lot_price">Lot Price<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-1 numeric" name="lot_price" id="lot_price"  value="0" onkeyup="getLotPrice();">
								@if ($errors->has('lot_price'))
									<span class="help-block">{{ $errors->first('lot_price') }}</span>
								@endif
							</div>
						</div>						
						<div class="form-group{{ $errors->has('pcf_price') ? ' has-error' : '' }}">
							<label class="control-label col-md-4 col-sm-4 col-xs-12" for="pcf_price">PCF</label>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<input class="form-control col-md-7 col-xs-1 numeric" name="pcf_price" id="pcf_price"  value="0" readonly="1">
								@if ($errors->has('pcf_price'))
									<span class="help-block">{{ $errors->first('pcf_price') }}</span>
								@endif
							</div>
						</div>
					
						<div class="form-group{{ $errors->has('vat_price') ? ' has-error' : '' }}">
							<label class="control-label col-md-4 col-sm-4 col-xs-12" for="vat_price">VAT</label>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<input class="form-control col-md-7 col-xs-1 numeric" name="vat_price" id="vat_price"  value="0" readonly="1">
								@if ($errors->has('vat_price'))
									<span class="help-block">{{ $errors->first('vat_price') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('vault_fee') ? ' has-error' : '' }}">
							<label class="control-label col-md-4 col-sm-4 col-xs-12" for="vault_fee">Vault Fee</label>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<input class="form-control col-md-7 col-xs-1 numeric" name="vault_fee" id="vault_fee"  value="0" onkeyup="getLotPrice();">
								@if ($errors->has('vault_fee'))
									<span class="help-block">{{ $errors->first('vault_fee') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('total_price') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_price">Total Price</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-1 numeric" name="total_price" id="total_price"  value="0" readonly="1">
								@if ($errors->has('total_price'))
									<span class="help-block">{{ $errors->first('total_price') }}</span>
								@endif
							</div>
						</div>
											
					</div>
				</div>
								
				<div class="x_panel">
					<div class="x_title">
						<h2>Step 3 Downpayment</h2>
						<div class="clearfix"></div>		
					</div>
					<div class="x_content">	
						<div class="form-group">
							<label  class="control-label col-md-6 col-sm-6 col-xs-12" for="dp_percent">Downpayment %</label>
							<div class="col-md-1 col-sm-1 col-xs-12">
							<input type="number" class="form-control col-md-7 col-xs-1" name="dp_percent" id="dp_percent" value="20" onkeyup="getLotPrice();">
							</div>
						</div>
						
						<div class="clearfix"></div>
						<div class="divider-dashed"></div>
						
						<div class="form-group{{ $errors->has('downpayment') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="downpayment">Downpayment<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="type"class="form-control col-md-7 col-xs-1 numeric" name="downpayment" id="downpayment"  value="0" onkeyup="getLotPrice();">
								@if ($errors->has('downpayment'))
									<span class="help-block">{{ $errors->first('downpayment') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('downpayment_date') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="downpayment_date">Downpayment Date<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date"class="form-control col-md-7 col-xs-1" name="downpayment_date" id="downpayment_date">
								@if ($errors->has('downpayment_date'))
									<span class="help-block">{{ $errors->first('downpayment_date') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance">Balance</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-1 numeric" name="balance" id="balance" value="0" readonly="1">
								@if ($errors->has('balance'))
									<span class="help-block">{{ $errors->first('balance') }}</span>
								@endif
							</div>
						</div>					
					</div>
				</div>
								
				<div class="x_panel">
					<div class="x_title">
						<h2>Step 4 Payment Terms</h2>
						<div class="clearfix"></div>		
					</div>
					<div class="x_content">
						<div class="col-md-3">					
						</div>
						<div class="form-group col-md-3{{ $errors->has('payment_term') ? ' has-error' : '' }}">
							<label for="payment_term">Payment Term (in months)<span class="required">*</span></label>
							<input type="number" class="form-control" name="payment_term" id="payment_term" onkeyup="getLotPrice();" value="12">
							@if ($errors->has('payment_term'))
									<span class="help-block">{{ $errors->first('payment_term') }}</span>
								@endif
						</div>
						<div class="form-group col-md-3">
							<label for="interest_rate">Interest Rate % <span class="required">*</span> </label>
							<input type="number" class="form-control" name="interest_rate" id="interest_rate" onkeyup="getLotPrice();" value="0">
						</div>
						
						<div class="clearfix"></div>
						<div class="divider-dashed"></div>
						
						<div class="form-group{{ $errors->has('monthly_amortization') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="monthly_amortization">Monthly Amortization</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input class="form-control col-md-7 col-xs-1 numeric" name="monthly_amortization" id="monthly_amortization" readonly="1">
								@if ($errors->has('monthly_amortization'))
									<span class="help-block">{{ $errors->first('monthly_amortization') }}</span>
								@endif
							</div>
						</div>						
						<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date"class="form-control col-md-7 col-xs-1" name="start_date" id="start_date">
								@if ($errors->has('start_date'))
									<span class="help-block">{{ $errors->first('start_date') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_date">End Date</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date"class="form-control col-md-7 col-xs-1" name="end_date" id="end_date">
								@if ($errors->has('end_date'))
									<span class="help-block">{{ $errors->first('end_date') }}</span>
								@endif
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							<button type="submit" class="btn btn-success">Create</button>
						</div>						
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
@stop