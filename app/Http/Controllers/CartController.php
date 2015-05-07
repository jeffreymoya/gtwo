<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
use Redirect;
use Input;

use Illuminate\Http\Request;

class CartController extends Controller {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$product = Product::findOrFail($request->input('prodId'));

		Cart::add($product->id, $product->name, $product->price, $request->input('quantity'), array());

		return Redirect::action('ProductController@index');
	}

	/**
	 * Checkout.
	 *
	 * @return Response
	 */
	public function checkout()
	{
		return view('products.checkout');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cart::remove($id);

		return Redirect::back();
	}

}
