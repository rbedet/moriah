<?php

namespace Moriah\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Payment;
use Moriah\Models\Customer;
use Moriah\Models\Purchase_detail;

class PaymentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$payments = Payment::all();
		return view('manager.payments.list_payment')
			->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$customers = Customer::all('id','first_name', 'last_name');
      		
       return view('manager.payments.create_payment')
			->with('customers',$customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'payment_date'=> 'nullable|date',
            'AR_no'=> 'nullable|string|max:255',
            'OR_no'=> 'nullable|string|max:255',
            'notes'=> 'nullable|string|max:255',
            'interment' =>'nullable|numeric',
            'amount' =>'nullable|numeric',
            'pcf' =>'nullable|numeric',
            'vat' =>'nullable|numeric',
            'total_amount' =>'nullable|numeric',
		]);
		//$sales_id = Purchase_detail::where ('purchase_detail_id', $request->input('purchase_detail_id')) ->first();
		$payment = Payment::create($request->all());

        //return redirect()->route('sales.show',['id' => $payment->purchase_details_id])->with('success', "The payment has successfully been created.");
        return redirect()->route('payments.index')->with('success', "The payment has successfully been created.");
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$payment = Payment::find($id);
		$params = [
            'title' => 'Delete Payment',
            'payment' => $payment,
        ];		
        return view('manager.payments.delete_payment')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$payment = Payment::find($id);
        return view('manager.payments.edit_payment')
			->with('payment', $payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$payment= Payment::find($id);
		
		$this->validate($request, [
			'payment_date'=> 'required|date',
            'OR_no'=> 'nullable|string|max:255',
            'details'=> 'nullable|string|max:255',
            'interment' =>'required|numeric',
            'amount' =>'required|numeric',
            'pcf' =>'required|numeric',
            'vat' =>'required|numeric',
            'total_amount' =>'required|numeric',
		]);
				
		$payment->payment_date= $request->input('payment_date');
        $payment->OR_no= $request->input('OR_no');
        $payment->details =$request->input('details');
        $payment->fee_amount =$request->input('interment');
        $payment->amount =$request->input('amount');
        $payment->pcf =$request->input('pcf');
        $payment->vat =$request->input('vat');
        $payment->total_amount =$request->input('total_amount');
		$payment->save();
				
        return redirect()->route('customers.edit', ['id' => $payment->customer_id])->with('success', "Update Success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $payment=Payment::find($id);
		
        if (!$payment){
            return redirect()
                ->route('payments.index')
                ->with('warning', 'The lot you requested for has not been found.');
        }

        $payment->delete();	
		
        return redirect()->route('payments.index')->with('success', "The payments <strong>$payment->OR_no</strong> has successfully been archived.");

    }

    /**
     * Search customer name from storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function filter(Request $request)
    {
		$year = $request->input('year');

		$payments =  DB::table('payments')
			->whereYear('payment_date',$year)
			->get();
		
		/*
		$total_lot = 0;
		$total_pcf = 0;
		$total_vat = 0;
		$total_payment = 0;
		foreach ($payments as $payment){		
			$total_lot =+ $payment->amount;
			$total_pcf =+ $payment->pcf;
			$total_vat =+ $payment->vat;
			$total_payment =+ $payment->total_amount;
		}
		$totals=array($total_lot, $total_pcf, $total_vat, $total_payment);
		*/
		
		
		return view('manager.payments.show_payment')
			//->with('total_lot', $total_lot)
			//->with('total_pcf', $total_pcf)
			//->with('total_vat', $total_vat)
			//->with('total_payment', $total_payment)
			//->with('totals', $totals)
			->with('payments', $payments);
		
		//return redirect()->route('filter')
			//->with('payments', $payments);
		
    }
}
