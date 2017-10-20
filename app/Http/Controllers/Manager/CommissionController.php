<?php

namespace Moriah\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Sales_person;
use Moriah\Models\Sales_commission;
use Moriah\Models\Purchase_detail;
use Moriah\Models\Lot_type;

class CommissionController extends Controller
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
		$sales_person = Sales_person::all();
		
		return view('manager.sales_person.list_sales_person')
		->with('sales_people', $sales_person);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.commission.create_commission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		/*
		$this->validate($request, [
			'first_name'=> 'required|string|max:255',
            'middle_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'house_no' =>'nullable|string|max:255',
            'street' =>'nullable|string|max:255',
            'zipcode' =>'nullable|string|max:255',
            'barangay' =>'nullable|string|max:255',
            'municipality' =>'nullable|string|max:255',
            'province' =>'nullable|string|max:255',
		]);
		*/
		$id = $request->input('purchase_detail_id');
		$sales = $request->input('sales');
		$commission_percentage = $request->input('commission_percentage');
		
		$earned_commission = $sales * $commission_percentage;
		
		$commission = Sales_commission::create([
			'commission_percentage' => $commission_percentage,
			'sales' => $sales,
			'earned_commission' => $earned_commission,
			'sales_person_id' => $request->input('sales_person_id'),
			'purchase_detail_id' => $request->input('purchase_detail_id'),
		]);	
        return redirect()->route('commissions.show', ['id' => $id])->with('success', "Success");
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
		$type_id = $sale->lot_info->lot_type_id;
		$lot_type = Lot_type::find($type_id);	
		
        return view('manager.commissions.create_commission')
			->with('type', $lot_type)
			->with('sale', $sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$sales_person = Sales_person::find($id);
		$sales = Sales_person::find($id)->sales;
		
		return view('manager.sales_person.edit_sales_person')
		->with('sales', $sales)
		->with('sales_person', $sales_person);
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
		$sales_person = Sales_person::find($id);
       
	   if (!$sales_person){
            return redirect()
                ->route('sales-person.index')
                ->with('warning', 'The sales person you requested for has not been found.');
        }
		
		$this->validate($request, [
			'first_name'=> 'required|string|max:255',
            'middle_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'house_no' =>'nullable|string|max:255',
            'street' =>'nullable|string|max:255',
            'zipcode' =>'nullable|string|max:255',
            'barangay' =>'nullable|string|max:255',
            'municipality' =>'nullable|string|max:255',
            'province' =>'nullable|string|max:255',
		]);
		
		$sales_person->update($request-> all());
        return redirect()->route('sales-person.index')->with('success', "The sales person <strong>$sales_person->first_name $sales_person->last_name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$sales_person=Sales_person::find($id);
		
        if (!$sales_person){
            return redirect()
                ->route('sales_persons.index')
                ->with('warning', 'The sales person you requested for has not been found.');
        }

        $sales_person->delete();
		
         return redirect()->route('sales-person.index')->with('success', "The sales person <strong>$sales_person->first_name $sales_person->last_name</strong> has successfully been archived.");
    }
	
}
