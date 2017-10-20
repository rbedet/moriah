@extends('templates.admin.layout')

@section('content')
<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Update Payment</h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form method="post" action="{{ route('payments.update', ['id' => $payment->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
						<div class="col-md-6">
						  <p class="lead">{{$payment->customer->first_name}} {{$payment->customer->middle_name}} {{$payment->customer->last_name}}</p>

						  <div class="divider-dashed"></div>
							<div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="payment_date">Payment Date<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="date" value="{{$payment->payment_date}}" id="payment_date" name="payment_date" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('payment_date'))
									<span class="help-block">{{ $errors->first('payment_date') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('AR_no') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="AR_no">AR No.<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->AR_no}}" id="AR_no" name="AR_no" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('AR_no'))
									<span class="help-block">{{ $errors->first('AR_no') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('OR_no') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="OR_no">OR No.<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->OR_no}}" id="OR_no" name="OR_no" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('OR_no'))
									<span class="help-block">{{ $errors->first('OR_no') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="details">Note/s:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->details}}" id="details" name="details" class="form-control col-md-7 col-xs-12">
									@if ($errors->has('details'))
									<span class="help-block">{{ $errors->first('details') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-md-offset-3"><h2>Payment Details</h2><br/></div><br/>
							<div class="form-group{{ $errors->has('interment') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="interment">Interment</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->fee_amount}}" id="interment" name="interment" class="form-control col-md-7 col-xs-12 numeric">
									@if ($errors->has('interment'))
									<span class="help-block">{{ $errors->first('interment') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="amount">Amount<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->amount}}" id="amount" name="amount" class="form-control col-md-7 col-xs-12 numeric">
									@if ($errors->has('amount'))
									<span class="help-block">{{ $errors->first('amount') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('pcf') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="pcf">PCF<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->pcf}}" id="pcf" name="pcf" class="form-control col-md-7 col-xs-12 numeric">
									@if ($errors->has('pcf'))
									<span class="help-block">{{ $errors->first('pcf') }}</span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="vat">VAT<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->vat}}" id="vat" name="vat" class="form-control col-md-7 col-xs-12 numeric">
									@if ($errors->has('vat'))
									<span class="help-block">{{ $errors->first('vat') }}</span>
									@endif
								</div>
							</div><br/>
							<div class="divider-dashed"></div><br/>
							<div class="form-group{{ $errors->has('total_amount') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-sm-12" for="total_amount">Total Amount Paid:<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$payment->total_amount}}" id="total_amount" name="total_amount" class="form-control col-md-7 col-xs-12 numeric" onkeyup="payment_breakdown();">
									@if ($errors->has('total_amount'))
									<span class="help-block">{{ $errors->first('total_amount') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-12 col-md-12 col-xs-12">							
							<div class="clearfix"></div>
							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
									<input type="hidden" name="_token" value="{{ Session::token() }}">
									<input name="_method" type="hidden" value="PUT">	
									<button type="submit" class="btn btn-success">Update</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop