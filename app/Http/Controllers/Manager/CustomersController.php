<?php

namespace Moriah\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Customer;

class CustomersController extends Controller
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
		$customers = Customer::all();
		
		return view('manager.customers.customers_list')
		->with('customers', $customers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.customers.customers_create');
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
			'first_name'=> 'required|string|max:255',
            'middle_name'=> 'nullable|string|max:255',
            'last_name'=> 'required|string|max:255',
            'email' =>'nullable|email|max:255',
            'house_no' =>'nullable|string|max:255',
            'street' =>'nullable|string|max:255',
            'zipcode' =>'nullable|string|max:255',
            'barangay' =>'nullable|string|max:255',
            'municipality' =>'nullable|string|max:255',
            'province' =>'nullable|string|max:255',
            'gender' =>'nullable|string|max:255',
            'telephone' =>'nullable|string|max:255',
            'mobile' =>'nullable|string|max:255',
            'birthdate' =>'nullable|date',
		]);
		/*
		$customer = Customer::create([
			'block' => $request->input('block'),
			'lot' => $request->input('lot'),
			'status' => $request->input('status'),
			'description' => $request->input('description'),
			'lot_type_id' => $request->input('lot_type'),
		]);
		*/
		$customer = Customer::create($request->all());
		
        return redirect()->route('customers.index')->with('success', "The customers <strong>$customer->first_name $customer->last_name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$customer = Customer::find($id);
		$params = [
            'title' => 'Delete Customer',
            'customer' => $customer,
        ];		
        return view('manager.customers.customers_delete')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$customer = Customer::find($id);
		
		return view('manager.customers.customers_edit')
		->with('customer', $customer);
		
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
		$customer= Customer::find($id);
		
		$this->validate($request, [
			'first_name'=> 'required|string|max:255',
            'middle_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'email' =>'nullable|email|max:255',
            'house_no' =>'nullable|string|max:255',
            'street' =>'nullable|string|max:255',
            'zipcode' =>'nullable|string|max:255',
            'barangay' =>'nullable|string|max:255',
            'municipality' =>'nullable|string|max:255',
            'province' =>'nullable|string|max:255',
            'gender' =>'nullable|string|max:255',
            'telephone' =>'nullable|string|max:255',
            'mobile' =>'nullable|string|max:255',
            'birthdate' =>'nullable|date',
		]);

		$customer->update($request-> all());
				
        return redirect()->route('customers.index')->with('success', "The customers <strong>$customer->first_name $customer->last_name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$customer=Customer::find($id);
		
        if (!$customer){
            return redirect()
                ->route('customers.index')
                ->with('warning', 'The lot you requested for has not been found.');
        }

        $customer->delete();	
		
        return redirect()->route('customers.index')->with('success', "The customers <strong>$customer->first_name $customer->last_name</strong> has successfully been archived.");
    }
}
