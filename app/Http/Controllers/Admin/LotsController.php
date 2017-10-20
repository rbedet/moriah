<?php

namespace Moriah\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Lot;
use Moriah\Models\Lot_type;
use Moriah\Models\Lot_group;

class LotsController extends Controller
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
		$lots = Lot::all();
		$groups = Lot_group::all();
		
		return view('admin.lots_list.list_lots')
		->with('lots', $lots)
		->with('groups', $groups);
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$groups = Lot_group::all();
		$types = Lot_type::all();
        return view('admin.lots_list.create_lots')
		->with('lot_groups', $groups)
		->with('lot_types', $types);
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
			'block' => 'required|string|max:255',
			'lot' => 'required|string|max:255',
			'status' => 'required|string|max:255',
			'description' => 'nullable|string|max:255',
			'lot_type' => 'required|integer',
		]);
		
		$lot_group= Lot_type::find($request->input('lot_type'))->lot_group;
		
		$lot = Lot::create([
			'block' => $request->input('block'),
			'lot' => $request->input('lot'),
			'status' => $request->input('status'),
			'description' => $request->input('description'),
			'lot_type_id' => $request->input('lot_type'),
			'lot_group_id' => $lot_group->id,
		]);

		return redirect()->route('lots.index')->with('success', "The Memorial Lot <strong>Block $lot->block Lot $lot->lot</strong> has successfully been created.");
		
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$lot = Lot::find($id);
		$params = [
            'title' => 'Delete Memorial Lot Location',
            'lot' => $lot,
        ];		
        return view('admin.lots_list.delete_lots')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$lot= Lot::find($id);
		$groups = Lot_group::all();
		$types = Lot_type::all();
		
		return view('admin.lots_list.edit_lots')
		->with('lot', $lot)
		->with('lot_groups', $groups)
		->with('lot_types', $types);
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
		$lot = Lot::find($id);

        if (!$lot){
            return redirect()
                ->route('lots.index')
                ->with('warning', 'The lot you requested for has not been found.');
        }
		
		$this->validate($request, [
			'block' => 'required|string|max:255',
			'lot' => 'required|string|max:255',
			'status' => 'required|string|max:255',
			'description' => 'nullable|string|max:255',
			'lot_type' => 'required|integer',
		]);

		$lot->block = $request->input('block');
		$lot->lot = $request->input('lot');
		$lot->status = $request->input('status');
		$lot->description = $request->input('description');
		$lot->lot_type_id = $request->input('lot_type');
		$lot->save();		
		
        return redirect()->route('lots.index')->with('success', "The lot <strong>Block $lot->block Lot $lot->lot </strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$lot=Lot::find($id);
		
        if (!$lot){
            return redirect()
                ->route('lots.index')
                ->with('warning', 'The lot you requested for has not been found.');
        }

        $lot->delete();	
		
        return redirect()->route('lots.index')->with('success', "The lot <strong>Block $lot->block Lot $lot->lot </strong> has successfully been archived.");
    }
}