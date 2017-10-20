<?php

namespace Moriah\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\User;

class UsersController extends Controller
{
	
	public function __construct()
	{
		//adds the users permission middleware to all of the routes in the controller
		$this->middleware('permission:users');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$users = User::all();
		
		return view('admin.users.users_list')
		->with('users', $users);
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.users_create');
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
            'username' => 'required|string|max:255|unique:users',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
		]);

		$user = User::create([
            'name' =>  $request->input('name'),
            'username' =>  $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
		]);

		return redirect()->route('users.index')->with('success', "The user <strong>$user->name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $params = [
            'title' => 'Delete User',
            'user' => $user,
        ];

        return view('admin.users.users_delete')->with($params);	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::find($id);
		
		return view('admin.users.users_edit')
		->with('user', $user);
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
        $user= User::find($id);

        if (!$user){
            return redirect()
                ->route('users.index')
                ->with('warning', 'The user you requested for has not been found.');
        }
		$this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
		]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();
	
        return redirect()->route('users.index')->with('success', "The user <strong>$user->name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user){
            return redirect()
                ->route('users.index')
                ->with('warning', 'The user you requested for has not been found.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', "The user <strong>$user->name</strong> has successfully been archived.");
    }
}
