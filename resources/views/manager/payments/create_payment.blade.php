@extends('templates.admin.layout')

@section('content')
    <script>
        var customer_list = [
			@foreach ($customers as $customer)
            { value: '{{$customer->id}} - {{$customer->first_name}} {{$customer->last_name}}', data: '{{$customer->id}}' },
			@endforeach
        ];
   </script>
   
<div class="">
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
						<div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="payment_date">Payment Date<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date" value="" id="payment_date" name="payment_date" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('payment_date'))
                                <span class="help-block">{{ $errors->first('payment_date') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('AR_no') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="AR_no">AR No.<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="AR_no" name="AR_no" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('AR_no'))
                                <span class="help-block">{{ $errors->first('AR_no') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('OR_no') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="OR_no">OR No.<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="OR_no" name="OR_no" class="form-control col-md-7 col-xs-12">
								@if ($errors->has('OR_no'))
                                <span class="help-block">{{ $errors->first('OR_no') }}</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('fee_amount') ? ' has-error' : '' }}">
							<label class="control-label col-md-3 col-sm-3 col-sm-12" for="fee_amount">Interment</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="" id="fee_amount" name="fee_amount" class="form-control col-md-7 col-xs-12 numeric">
								@if ($errors->has('fee_amount'))
                                <span class="help-block">{{ $errors->first('fee_amount') }}</span>
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
</div>
@stop