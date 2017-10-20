<?php

namespace Moriah\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Deceased;
use Moriah\Models\Lot;

class DeceasedController extends Controller
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
		$deceased = Deceased::all();
		
		return view('manager.deceased.list_deceased')
		->with('deceased', $deceased);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$lots = Lot::all();
        return view('manager.deceased.create_deceased')
			->with('lots', $lots);
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
            'lot' =>'required|integer',
            'birthdate' =>'required|date',
            'deathdate' =>'required|date',
		]);
		
		$deceased = Deceased::create([
			'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'lot_id' =>$request->input('lot'),
            'birthdate' =>$request->input('birthdate'),
            'deathdate' =>$request->input('deathdate'),
		]);
		
        return redirect()->route('deceased.index')->with('success', "The deceased <strong>$deceased->first_name $deceased->last_name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$deceased = Deceased::find($id);
		$params = [
            'title' => 'Delete Person',
            'deceased' => $deceased,
        ];			
        return view('manager.deceased.delete_deceased')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$deceased = Deceased::find($id);
		
		return view('manager.deceased.edit_deceased')
		->with('deceased', $deceased);
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
		$deceased=Deceased::find($id);
		
	   if (!$deceased){
            return redirect()
                ->route('deceased.index')
                ->with('warning', 'The person you requested for has not been found.');
        }
		
		$this->validate($request, [
			'first_name'=> 'required|string|max:255',
            'middle_name'=> 'nullable|string|max:255',
            'last_name'=> 'required|string|max:255',
            'lot' =>'required|integer',
            'birthdate' =>'required|date',
            'deathdate' =>'required|date',
		]);
		
		$deceased->first_name= $request->input('first_name');
        $deceased->last_name= $request->input('last_name');
        $deceased->lot_id =$request->input('lot');
        $deceased->birthdate =$request->input('birthdate');
        $deceased->deathdate =$request->input('deathdate');
		$deceased->save();
		
        return redirect()->route('deceased.index')->with('success', "The deceased <strong>$deceased->first_name $deceased->last_name</storong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$deceased=Deceased::find($id);
		
        if (!$deceased){
            return redirect()
                ->route('deceaseds.index')
                ->with('warning', 'The person you requested for has not been found.');
        }

        $deceased->delete();
		
        return redirect()->route('deceased.index')->with('success', "The deceased <strong>$deceased->first_name $deceased->last_name</strong> has successfully been archived.");
    }
}
