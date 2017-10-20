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
						<input type="text" value="{{$sale->customer->municipality}} {{$sale->customer->province}}" id="lot" name="lot_type" class="form-control" readonly>
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
						<input type="text" value="{{$sale->lot_info->lot_group->name}} -{{$sale->lot_info->lot_type->name}}" id="lot" name="lot_type" class="form-control" readonly>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<!--- end row -->
	<!--- Purchase Information -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Purchase Information</h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form method="post" action="{{ route('sales.update', ['id' => $sale->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
			
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-3">Lot Price</label>
							<div class="col-md-9">
								<input value="{{$sale->lot_price}}" class="form-control numeric" name="lot_price" id="lot_price">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">PCF</label>
							<div class="col-md-8">
								<input value="{{$sale->pcf_amount}}" class="form-control numeric" name="pcf_price" id="pcf_price">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">VAT</label>
							<div class="col-md-8">
								<input value="{{$sale->vat_amount}}" class="form-control numeric" name="vat_price" id="vat_price">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Vault Fee</label>
							<div class="col-md-8">
								<input value="{{$sale->fee_amount}}" class="form-control numeric" name="vault_fee" id="vault_fee">
							</div>
						</div>
						<div class="divider-dashed"></div>
						<div class="form-group">
							<label class="control-label col-md-3">Total Lot Price</label>
							<div class="col-md-9">
								<input value="{{$sale->total_lot_price}}" class="form-control numeric" name="total_price" id="total_price">
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							<input name="_method" type="hidden" value="PUT">
							<button type="submit" class="btn btn-success">Update</button>
						</div>	
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Payment Term Information -->
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Payment Term Information</h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					@if ($sale->installment !== null)
					{{$sale->installment->id}}
					<form method="post" action="{{ route('installments.update', ['id' => $sale->installment->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
			
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-4">Payment Term</label>
							<div class="col-md-6">
								<input value="{{$sale->installment->payment_term}}" class="form-control" name="payment_term" id="payment_term">Months
							</div>
						</div></br>
						<div class="form-group">
							<label class="control-label col-md-4">Interest Rate</label>
							<div class="col-md-6">
								<input value="{{$sale->installment->interest_rate}}" class="form-control" name="interest_rate" id="interest_rate" >Percent
							</div>
						</div></br>
						<div class="form-group">
							<label class="control-label col-md-4">Monthly Amortization</label>
							<div class="col-md-6">
								<input value="{{$sale->installment->monthly_amortization}}" class="form-control numeric" name="monthly_amortization" id="monthly_amortization">
							</div>
						</div></br>
						<div class="form-group">
							<label class="control-label col-md-4">Start Date - End Date</label>
							<div class="col-md-6">
								<input value="{{$sale->installment->start_date}} - {{$sale->installment->end_date}}" class="form-control" readonly>
							</div>
						</div><br/>
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							<input name="_method" type="hidden" value="PUT">
							<button type="submit" class="btn btn-success">Update</button>
						</div>	
					</div>
					</form>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Create Payment</h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
                    <form method="post" action="{{ route('payments.store') }}" data-parsley-validate class="form-horizontal form-label-left">
						<input type="text" name="customer_id" id="customer_id" value="{{$sale->customer_id}}" hidden>
						<input type="text" name="purchase_detail_id" id="customer_id" value="{{$sale->id}}" hidden>
					
						<div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="payment_date">Payment Date</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date" value="" id="payment_date" name="payment_date" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('payment_date'))
                                <span class="help-block">{{ $errors->first('payment_date') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('AR_no') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="AR_no">AR No.</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="AR_no" name="AR_no" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('AR_no'))
                                <span class="help-block">{{ $errors->first('AR_no') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('OR_no') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="OR_no">OR No.</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="OR_no" name="OR_no" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('OR_no'))
                                <span class="help-block">{{ $errors->first('OR_no') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="amount">Amount</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="amount" name="amount" class="form-control col-md-7 col-xs-12 numeric">
								@if ($errors->has('amount'))
                                <span class="help-block">{{ $errors->first('amount') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('pcf') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="pcf">PCF</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="pcf" name="pcf" class="form-control col-md-7 col-xs-12 numeric">
								@if ($errors->has('pcf'))
                                <span class="help-block">{{ $errors->first('pcf') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="vat">VAT</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="vat" name="vat" class="form-control col-md-7 col-xs-12 numeric">
								@if ($errors->has('vat'))
                                <span class="help-block">{{ $errors->first('vat') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('total_amount') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="total_amount">Total Amount Paid:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="total_amount" name="total_amount" class="form-control col-md-7 col-xs-12 numeric" onkeyup="payment_breakdown();">
								@if ($errors->has('total_amount'))
                                <span class="help-block">{{ $errors->first('total_amount') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="details">Note/s:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="details" name="details" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('details'))
                                <span class="help-block">{{ $errors->first('details') }}</span>
                                @endif
							</div>
						</div>
						
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                        </div>
					</form>
				
				</div>
			</div>
		</div>
	</div>
	<!-- Payments -->
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Payment List</h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="payments" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
								<th>Date</th>
								<th>AR No.</th>
								<th>OR No.</th>
								<th>Fee</th>
								<th>Lot</th>
                                <th>PCF</th>
                                <th>VAT</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th colspan="3" style="text-align:right">Total:</th>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
                            </tr>
                        </tfoot>
                        <tbody>

						@foreach ($payments as $payment)
							<tr>
								<td>{{$payment->id}}</td>
								<td>{{$payment->payment_date}}</td>
								<td>{{$payment->AR_no}}</td>
								<td>{{$payment->OR_no}}</td>
								<td class="numeric">{{$payment->fee_amount}}}}</td>
								<td class="numeric">{{$payment->amount}}</td>
								<td class="numeric">{{$payment->pcf}}</td>
								<td class="numeric">{{$payment->vat}}</td>
								<td class="numeric">{{$payment->total_amount}}</td>
								<td>
									<a href="{{ route('payments.edit', ['id' => $payment->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
									<a href="{{ route('payments.show', ['id' => $payment->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>                 
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