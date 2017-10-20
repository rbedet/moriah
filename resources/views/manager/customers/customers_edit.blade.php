@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Customer <a href="{{route('customers.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('customers.update', ['id' => $customer->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
						
					
						<div class="form-group">
							<div class="row">
								<div class="col-xs-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
									<label for="first_name">First Name</label> <span class="required">*</span>
									<input class="form-control" name="first_name" id="first_name" value="{{$customer->first_name}}">
									@if ($errors->has('first_name'))
										<span class="help-block">{{ $errors->first('first_name') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('middle_name') ? ' has-error' : '' }}">
									<label for="middle_name">Middle Name<span class="required">*</span></label>
									<input class="form-control" name="middle_name" id="middle_name" value="{{$customer->middle_name}}">
									@if ($errors->has('middle_name'))
										<span class="help-block">{{ $errors->first('middle_name') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('last_name') ? ' has-error' : '' }}">
									<label for="last_name">Last Name</label> <span class="required">*</span>
									<input class="form-control" name="last_name" id="last_name" value="{{$customer->last_name}}">
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
									<input class="form-control" name="house_no" id="house_no" value="{{$customer->house_no}}">
									@if ($errors->has('house_no'))
										<span class="help-block">{{ $errors->first('house_no') }}</span>
									@endif
								</div>
								<div class="col-xs-6{{ $errors->has('street') ? ' has-error' : '' }}">
									<label for="street">Street Name</label>
									<input class="form-control" name="street" id="street" value="{{$customer->street}}">
									@if ($errors->has('street'))
										<span class="help-block">{{ $errors->first('street') }}</span>
									@endif
								</div>
								<div class="col-xs-2{{ $errors->has('zipcode') ? ' has-error' : '' }}">
									<label for="zipcode">Zip Code</label>
									<input class="form-control" name="zipcode" id="zipcode" value="{{$customer->zipcode}}">
									@if ($errors->has('zipcode'))
										<span class="help-block">{{ $errors->first('zipcode') }}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4{{ $errors->has('barangay') ? ' has-error' : '' }}">
									<label for="barangay">Barangay</label>
									<input class="form-control" name="barangay" id="barangay" value="{{$customer->barangay}}"> 
									@if ($errors->has('barangay'))
										<span class="help-block">{{ $errors->first('barangay') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('municipality') ? ' has-error' : '' }}">
									<label for="municipality">City/Municipality</label>
									<input class="form-control" name="municipality" id="municipality" value="{{$customer->municipality}}">
									@if ($errors->has('municipality'))
										<span class="help-block">{{ $errors->first('municipality') }}</span>
									@endif
								</div>
								<div class="col-xs-4{{ $errors->has('province') ? ' has-error' : '' }}">
									<label for="province">Province</label>
									<input class="form-control" name="province" id="province" value="{{$customer->province}}">
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
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Save Customer Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<!--- end --->
		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Payments <a href="{{route('payments.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
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
								<th>Interment</th>
								<th>Lot</th>
                                <th>PCF</th>
                                <th>VAT</th>
                                <th>Payment</th>
                                <th>Paid By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th colspan="4" style="text-align:right">Total:</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
                        </tfoot>
                        <tbody>

						@foreach ($customer->payments as $payment)
							<tr>
								<td>{{$payment->id}}</td>
								<td>{{$payment->payment_date}}</td>
								<td>{{$payment->AR_no}}</td>
								<td>{{$payment->OR_no}}</td>
								<td class="numeric">{{$payment->interment}}</td>
								<td class="numeric">{{$payment->amount}}</td>
								<td class="numeric">{{$payment->pcf}}</td>
								<td class="numeric">{{$payment->vat}}</td>
								<td class="numeric">{{$payment->total_amount}}</td>
								<td>{{$payment->customer->first_name}} {{$payment->customer->middle_name}} {{$payment->customer->last_name}}</td>
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
		
		<!--end-->
    </div>
</div>
@stop