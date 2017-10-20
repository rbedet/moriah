<?php

namespace Moriah\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Lot_group;

class LotGroupsController extends Controller
{

	public function __construct()
	{
		//adds create permission middleware to the routes create and store only
		$this->middleware('permission:create', ['only' => ['create', 'store']]);    
		//adds edit permission middleware to routes edit and update
		$this->middleware('permission:edit', ['only' => ['edit', 'update']]);
		//add delete permission middleware to routes show and delete
		$this->middleware('permission:delete', ['only' => ['show', 'delete']]);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$lot_groups = Lot_group::all();
		
		return view('admin.lot_groups.list_lot_groups')
		->with('lot_groups', $lot_groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lot_groups.create_lot_groups');
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
			'name' => 'required|string|max:255',
			'description' => 'nullable|string|max:255',
		]);

		$group = Lot_group::create([
			'name' => $request->input('name'),
			'description' => $request->input('description'),
		]);

		return redirect()->route('lot-groups.index')->with('success', "The Memorial Lot Group <strong>$group->name</strong> has successfully been created.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$group = Lot_group::find($id);

        $params = [
            'title' => 'Delete Memorial Lot Group',
            'group' => $group,
        ];

        return view('admin.lot_groups.delete_lot_groups')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$group = Lot_group::find($id);
		
		return view('admin.lot_groups.edit_lot_groups')
		->with('group', $group);
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
		$group=Lot_group::find($id);
		
        if (!$group){
            return redirect()
                ->route('lot-groups.index')
                ->with('warning', 'The lot group you requested for has not been found.');
        }
		
		$this->validate($request, [
			'group_name' => 'required|string|max:255',
			'description' => 'nullable|string|max:255',
		]);
		
		$group->name = $request->input('group_name');
		$group->description = $request->input('description');
		$group->save();
		
        return redirect()->route('lot-groups.index')->with('success', "The Memorial Lot Group <strong>$group->name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$group=Lot_group::find($id);
		
        if (!$group){
            return redirect()
                ->route('lot-groups.index')
                ->with('warning', 'The lot group you requested for has not been found.');
        }

        $group->delete();
		
        return redirect()->route('lot-groups.index')->with('success', "The groups name <strong>$group->name</strong> has successfully been archived.");
    }
}
