@extends('templates.admin.layout')

@section('content')
<div class="">
	<div class="clearfix"></div>
    <div class="row">
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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
								<th colspan="3" style="text-align:right">Total:</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
                        </tfoot>
                        <tbody>

						@foreach ($payments as $payment)
							<tr>
								<td>{{$payment->id}}</td>
								<td>{{$payment->payment_date}}</td>
								<td>{{$payment->AR_no}}</td>
								<td>{{$payment->OR_no}}</td>
								<td class="numeric">{{$payment->fee_amount}}</td>
								<td class="numeric">{{$payment->amount}}</td>
								<td class="numeric">{{$payment->pcf}}</td>
								<td class="numeric">{{$payment->vat}}</td>
								<td class="numeric">{{$payment->total_amount}}</td>
								<td>@if  ($payment->customer !== null)
									{{$payment->customer->first_name}} {{$payment->customer->middle_name}} {{$payment->customer->last_name}}
								@endif</td>							
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