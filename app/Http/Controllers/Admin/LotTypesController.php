<?php

namespace Moriah\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Lot_type;
use Moriah\Models\Lot_group;

class LotTypesController extends Controller
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
		$lot_types = Lot_type::all();
		
		return view('admin.lot_types.list_lot_types')
		->with('lot_types', $lot_types);
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$groups = Lot_group::all();
		
        return view('admin.lot_types.create_lot_types')
		->with('groups', $groups);
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
			'name' => 'required|string|max:255|unique:lot_groups',
			'description' => 'nullable|string|max:255',
			'lot_group' => 'required|integer|max:10',
			'lot_price' => 'nullable|numeric',
			'pcf' => 'nullable|numeric|max:100',
			'vat' => 'nullable|numeric|max:100',
		]);

		$type = Lot_type::create([
			'name' => $request->input('name'),
			'description' => $request->input('description'),
			'lot_group_id' => $request->input('lot_group'),
			'price' => $request->input('lot_price'),
			'pcf_percent' => $request->input('pcf'),
			'vat_percent' => $request->input('vat'),
		]);

		return redirect()->route('lot-types.index')->with('success', "The Memorial Lot Type <strong>$type->name</strong> has successfully been created.");
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$type = Lot_type::find($id);
		$params = [
            'title' => 'Delete Memorial Lot Type',
            'type' => $type,
        ];

        return view('admin.lot_types.delete_lot_types')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$type = Lot_type::find($id);
		$groups = Lot_group::all();
		
		return view('admin.lot_types.edit_lot_types')
		->with('type', $type)
		->with('groups', $groups);
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
		$type = Lot_type::find($id);

        if (!$type){
            return redirect()
                ->route('lot-typess.index')
                ->with('warning', 'The lot type you requested for has not been found.');
        }
		
		
		$this->validate($request, [
			'lot_type_name' => 'required|string|max:255',
			'description' => 'nullable|string|max:255',
			'lot_group' => 'required|integer|max:10',
			'lot_price' => 'nullable|numeric',
			'pcf' => 'nullable|numeric|max:100',
			'vat' => 'nullable|numeric|max:100',
		]);

		$type->name = $request->input('lot_type_name');
		$type->description = $request->input('description');
		$type->lot_group_id = $request->input('lot_group');
		$type->price = $request->input('lot_price');
		$type->pcf_percent = $request->input('pcf');
		$type->vat_percent = $request->input('vat');
		$type->save();
		
         return redirect()->route('lot-types.index')->with('success', "The lot type <strong>$type->name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$type=Lot_type::find($id);
		
        if (!$type){
            return redirect()
                ->route('lot-types.index')
                ->with('warning', 'The lot type you requested for has not been found.');
        }

        $type->delete();		
        return redirect()->route('lot-types.index')->with('success', "The lot type <strong>$type->name</strong> has successfully been archived.");
    }
}
