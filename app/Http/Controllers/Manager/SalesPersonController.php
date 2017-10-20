<?php

namespace Moriah\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Sales_person;

class SalesPersonController extends Controller
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
        return view('manager.sales_person.create_sales_person');
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
            'house_no' =>'nullable|string|max:255',
            'street' =>'nullable|string|max:255',
            'zipcode' =>'nullable|string|max:255',
            'barangay' =>'nullable|string|max:255',
            'municipality' =>'nullable|string|max:255',
            'province' =>'nullable|string|max:255',
		]);

		$sales_person = Sales_person::create($request->all());		
		
        return redirect()->route('sales-person.index')->with('success', "The sales person <strong>$sales_person->first_name $sales_person->last_name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$sales_person = Sales_person::find($id);
		$params = [
            'title' => 'Delete Sales Person',
            'sales_person' => $sales_person,
        ];	
		
        return view('manager.sales_person.delete_sales_person')->with($params);
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
