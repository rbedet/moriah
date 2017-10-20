<?php

namespace Moriah\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Customer;
use Moriah\Models\Sales_person;
use Moriah\Models\Lot;
use Moriah\Models\Lot_type;
use Moriah\Models\Purchase_detail;
use Moriah\Models\Installment;
use Moriah\Models\Payment;


class SalesController extends Controller
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
		$sales = Purchase_detail::all();
        return view('manager.sales.list_sales')
		->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all('id','first_name', 'last_name');
        $sales_people = Sales_person::all('id','first_name', 'last_name');
		//get all lots with status available
        $lots = Lot::all()
			->where('status', 'AVAILABLE');
        return view('manager.sales.create_sales')
        ->with('customers',$customers)
        ->with('sales_people',$sales_people)
        ->with('lots',$lots);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//validate inputs
		
		$this->validate($request, [
			//for purchase details
			'customer' => 'required',
			//'sales_person' => 'required',
			'lot_id' => 'required',
			'lot_price' => 'required|numeric',
			'pcf_price' => 'required|numeric',
			'vat_price' => 'required|numeric',
			'vault_fee' => 'required|numeric',
			'total_price' => 'required|numeric',
			'balance' => 'required|numeric',
			//for downpayment
			'downpayment' => 'required|numeric',
			'downpayment_date' => 'required|date',
			//for installment
			'payment_term' => 'required|numeric',			
			'interest_rate' => 'required|numeric',			
			'monthly_amortization' => 'required|numeric',			
			'start_date' => 'date|nullable',
			'end_date' => 'date|nullable',
		]);
	
		/*
		** lot computation server side
		*/
		
		/**
		//get input values
		$lot_price = $request->input('lot_price');
		$payment_term = $request->input('payment_term');
		$interest_rate = $request->input('interest_rate');
		$pcf_percent = $request->input('pcf_percent');
		$vat_percent = $request->input('vat_percent');
		$dp_percent = $request->input('dp_percent');
		$vault_fee = $request->input('vault_fee');
		//calculate pcf, vat, total price
		$pcf_price = $lot_price * ($pcf_percent/100);
		$vat_price = $lot_price * ($vat_percent/100);
		$total_price = $lot_price + $pcf_price + $vat_price+ $vault_fee;
		//get downpayment input value
		$downpayment = $request->input('downpayment');
		//if downpayment is not 0 compute downpayment 
		if ($downpayment != 0) {
			$downpayment = $total_price * ($dp_percent/100);	
		}
		//caluclate balance as difference of total lot price inclusive pcf, vat, etc and downpayment
		$balance = $total_price - $downpayment;
		//if payment term has value calculate monthly_amortization
		if ( $payment_term != 0 ) {
			$monthly_amortization = $balance * (1 + ($interest_rate/100))/$payment_term;
		}
		**/
		//create in purchase_detail table
		$purchase = Purchase_detail::create([
			'sales_number' => $request->input('sales_number'),
			'customer_id' => $request->input('customer_id'),
			'sales_person_id' => $request->input('sales_person_id'),
			'lot_id' => $request->input('lot_id'),
			'lot_price' => $request->input('lot_price'),
			'pcf_amount' => $request->input('pcf_price'),
			'vat_amount' => $request->input('vat_price'),
			'fee_amount' => $request->input('vault_fee'),
			'total_lot_price' => $request->input('total_price'),
			'downpayment' => $request->input('downpayment'),
			'downpayment_date' => $request->input('downpayment_date'),
			'balance' => $request->input('balance'),
		]);
				
		//change the status of the lot to occupied once the sale is created
		$lot_status = Lot::find($request->input('lot_id'));
		$lot_status->status = 'Occupied';
		$lot_status->save();
		
		//create in installments table
		$installment = Installment::create([
			'purchase_detail_id' => $purchase->id,
			'payment_term' => $request->input('payment_term'),
			'interest_rate' => $request->input('interest_rate'),
			'monthly_amortization' => $request->input('monthly_amortization'),
			'start_date' => $request->input('start_date'),
			'end_date' => $request->input('end_date'),
		]);		
	
		//computation of breakdown of downpayment then store in payments table
		$total_amount = $request->input('downpayment');
		$amount = $total_amount * 0.7575757576;
		$pcf = $total_amount * 0.1515151515;
		$vat = $total_amount * 0.0909090909;

		//store in downpayment in payments table
		$payment = Payment::create([
			'customer_id' => $request->input('customer_id'),
			'purchase_detail_id' => $purchase->id,
			'payment_date' => $request->input('downpayment_date'),
			'amount' => $amount,	
			'pcf' => $pcf,
			'vat' => $vat,
			'total_amount' => $request->input('downpayment'),
		]);

        return redirect()->route('sales.index')->with('success', "The sale has successfully been created. For reference the Sale Code of the transaction is <strong>$purchase->sales_number</strong>.");
		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$sale = Purchase_detail::find($id);
		$params = [
            'title' => 'Delete Sale',
            'sale' => $sale,
        ];		
        return view('manager.sales.delete_sales')->with($params);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$sale = Purchase_detail::find($id);
		$payments = $sale->payments;
		return view('manager.sales.edit_sales')
			->with('sale', $sale)
			->with('payments', $payments);

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
			
		$sale = Purchase_detail::find($id);
		$sales_person = Sales_person::find($request->input('sales_person_id'));
		//return $sales_person->id;
		//$sale->sales_person_id = $request->input('sales_person_id');
		$sale->lot_price = $request->input('lot_price');
		$sale->pcf_amount = $request->input('pcf_price');
		$sale->vat_amount = $request->input('vat_price');
		$sale->fee_amount = $request->input('vault_fee');
		$sale->total_lot_price = $request->input('total_price');
		//$sale->downpayment = $request->input('downpayment');
		//$sale->downpayment_date = $request->input('downpayment_date');
		//$sale->balance = $request->input('balance');
		$sale->save();
		
        return redirect()->route('sales.index')->with('success', "The sales has successfully been updated.");
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
    protected function search_owner(Request $request)
    {
        
        $term = Input::get('term');
        
        $results = array();
        
        $queries = DB::table('customers')
            ->where('first_name', 'LIKE', '%'.$term.'%')
            ->orWhere('middle_name', 'LIKE', '%'.$term.'%')
            ->orWhere('last_name', 'LIKE', '%'.$term.'%')
            ->orWhere('id', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
        
        if (count($queries) == 0) {
            $results[] =  'No Owner Found';
        } else {
            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'value' => $query->id, 'label' => $query->firstname.' '.$query->middlename.' '.$query->surname ];
            }
        }
        return \Response::json($results);
    }
}
