<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}


	/**
	 * Show the contact us page
	 *
	 * @return Response
	 */
	public function contact()
	{
		return view('contact');
	}

	/**
	 * Show the about us page
	 *
	 * @return Response
	 */
	public function about()
	{
		return view('about');
	}

}
