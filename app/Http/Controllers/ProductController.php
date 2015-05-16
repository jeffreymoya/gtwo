<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller {


	public function __construct() {

		$this->middleware('auth', ['except' => ['index', 'show']]);
		$this->middleware('admin', ['except' => ['index', 'show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::all();

		if(Auth::check() && Auth::user()->isAdmin()) {

			return view('products.index', compact('products'));
		} 

		$latest = Product::orderBy('created_at','desc')->take(10)->get();

		$sections = [];
		$tmp = [];
		$i = 1;
		foreach ($products as $product) {
			$tmp[] = $product;
			if(($i % 4) === 0) {
				$sections[] = $tmp;
				$tmp = [];
			}
			$i++;
		}

		return view('products.store', compact('sections', 'latest'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$product = new Product();

		$product->code = $request->input("code");
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->image = $request->input("image");
        $product->price = $request->input("price");
        $product->commission = $request->input("commission");
        $product->available = $request->input("available");

		$product->save();

		return redirect()->route('products.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);

		if(Auth::check() && Auth::user()->isAdmin()) {
			return view('products.show', compact('product'));
		}

		$popular = Product::take(3)->get();

		return view('products.product', compact('product', 'popular'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);

		return view('products.edit', compact('product'));
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
		$product = Product::findOrFail($id);

		$product->code = $request->input("code");
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->image = $request->input("image");
        $product->price = $request->input("price");
        $product->commission = $request->input("commission");
        $product->available = $request->input("available");

		$product->save();

		return redirect()->route('products.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		$product->delete();

		return redirect()->route('products.index')->with('message', 'Item deleted successfully.');
	}

	/**
	 * Save orders
	 *
	 * @param  int  $id
	 * @return Response
	 */

}
