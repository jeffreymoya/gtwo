<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct() {

		$this->middleware('auth');
		$this->middleware('admin', ['except' => ['referrals']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = new User();

		$user->user_id = $request->input("user_id");
        $user->role_id = $request->input("role_id");
        $user->iexp4u_id = $request->input("iexp4u_id");
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->phone = $request->input("phone");
        $user->password = $request->input("password");
        $user->uploaded_id = $request->input("uploaded_id");


		return redirect()->route('users.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user = User::findOrFail($id);

		$user->user_id = $request->input("user_id");
        $user->role_id = $request->input("role_id");
        $user->iexp4u_id = $request->input("iexp4u_id");
        $user->first_name = $request->input("first_name");
        $user->last_name = $request->input("last_name");
        $user->phone = $request->input("phone");
        $user->password = $request->input("password");
        $user->uploaded_id = $request->input("uploaded_id");

		$user->save();

		return redirect()->route('users.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return redirect()->route('users.index')->with('message', 'Item deleted successfully.');
	}

	public function referrals() {

		$referrals = Auth::user()->referrals;

		return view('users.referrals', compact('referrals'));
	}

}
