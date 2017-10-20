@extends('templates.admin.layout')

@section('content')
<div class="">
	<div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Payments</h2>
					<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<form method="post" action="{{ route('filter') }}" data-parsley-validate class="form-horizontal form-label-left">
						<div class="form-group has-feedback{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="year">Year</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('year') ?: '' }}" id="year" name="year" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('year'))
                                <span class="help-block">{{ $errors->first('year') }}</span>
                                @endif
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
					<div class="col-xs-6">
					  <p class="lead">Summary</p>
					  <div class="table-responsive">
						<table class="table">
						  <tbody>
							<tr>
							  <th>Lot</th>
							  <td>{{$payments}}</td>
							</tr>
							<tr>
							  <th>PCF</th>
							  <td class="numeric"></td>
							</tr>
							<tr>
							  <th>VAT</th>
							  <td class="numeric"></td>
							</tr>
							<tr>
							  <th>Total Payment:</th>
							  <td class="numeric"></td>
							</tr>
						  </tbody>
						</table>
					  </div>
					</div>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
								<th>ID</th>
								<th>Date</th>
								<th>OR No.</th>
								<th>Lot</th>
                                <th>PCF</th>
                                <th>VAT</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th>ID</th>
								<th>Date</th>
								<th>OR No.</th>
								<th>Lot</th>
                                <th>PCF</th>
                                <th>VAT</th>
                                <th>Payment</th>
                            </tr>
                        </tfoot>
                        <tbody>

						@foreach ($payments as $payment)
							<tr>
								<td>{{$payment->id}}</td>
								<td>{{$payment->payment_date}}</td>
								<td>{{$payment->OR_no}}</td>
								<td class="numeric">{{$payment->amount}}</td>
								<td class="numeric">{{$payment->pcf}}</td>
								<td class="numeric">{{$payment->vat}}</td>
								<td class="numeric">{{$payment->total_amount}}</td>
								
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