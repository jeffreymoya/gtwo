<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;
use Redirect;
use Input;
use Auth;

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

		Cart::add($this->createItem($product, $request->input('quantity')));

		return Redirect::action('ProductController@index');
	}

	/**
	 * Checkout.
	 *
	 * @return Response
	 */
	public function checkout()
	{
		if(Auth::user()->hasDiscount()) {
			$items = Cart::getContent();
			foreach($items as $item) {
				if(empty($item->conditions)) {
					$prod = Product::find($item->id);
					Cart::remove($item->id);
					Cart::add($this->createItem($prod, $item->quantity));
				}
			}
		}
		
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

	protected function createItem(Product $product, $quantity) {

		if(Auth::check() && Auth::user()->hasDiscount() && $product->discount > 0) {
				$discount = $product->discount;
				if($discount >= 1) {
					$discount = intval($discount);
				} else {
					$discount = round($discount, 2);
				}

				$discount = $discount . '%';
				$saleCondition = new \Darryldecode\Cart\CartCondition(array(
		            'name' => $discount,
		            'type' => 'sale',
		            'target' => 'item',
		            'value' => '-' . $discount
		        )); 

		        $item = array(
		            'id' => $product->id,
		            'name' => $product->name,
		            'price' => $product->price,
		            'quantity' => $quantity,
		            'attributes' => array(),
		            'conditions' => $saleCondition
		        );
		} else {
			$item = array(
	            'id' => $product->id,
	            'name' => $product->name,
	            'price' => $product->price,
	            'quantity' => $quantity,
	            'attributes' => array()
	        );
		}

		return $item;
	}

}
