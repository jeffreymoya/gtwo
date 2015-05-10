<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use Cart;
use Auth;
use App\Payment;
use App\Product;
use Redirect;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller {

	public function __construct() {

		$this->middleware('auth');
		$this->middleware('admin', ['except' => ['index','store', 'show', 'upload']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->isAdmin()) {
			$orders = Order::where('status','=','0')->orderBy('created_at','desc')->get();
			$view = 'orders.index';
		} else {
			$orders = Order::where('user_id','=',Auth::user()->id)->get();
			$view = 'orders.order';
		}

		return view($view, compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('orders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$items = Cart::getContent();

		foreach($items as $item) {
			$order = new Order();
			$payment = Payment::create(['type'=>'deposit']);
			$product = Product::find($item->id);

			$order->product_id = $item->id;
	        $order->user_id = Auth::user()->id;
	        $order->payment_id = $payment->id;
	        $order->address_id = Auth::user()->address_id;
	        $order->quantity = $item->quantity;

	        $total = $item->quantity*$item->price;
	        $order->amount = $total;
	        if(Auth::user()->hasDiscount()) {
	        	$order->discount = $total - $item->conditions->getCalculatedValue($total);
	        } else {
	        	$order->commission = ($total * $product->commission)/100;
	        }
	        $order->save();
		}

		Cart::clear();
		
		return redirect()->route('orders.index')->with('message', 'Order created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);

		return view('orders.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::findOrFail($id);

		return view('orders.edit', compact('order'));
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
		$order = Order::findOrFail($id);

		$order->product_id = $request->input("product_id");
        $order->user_id = $request->input("user_id");
        $order->address_id = $request->input("address_id");
        $order->order_date = $request->input("order_date");
        $order->shipping_id = $request->input("shipping_id");
        $order->status = $request->input("status");

		$order->save();

		return redirect()->route('orders.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$order = Order::findOrFail($id);
		$order->delete();

		return redirect()->route('orders.index')->with('message', 'Item deleted successfully.');
	}

	public function upload(Request $request) {

	    $v = Validator::make($request->all(), [
	        'deposit_slip' => 'required',
	    ]);

	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors());
	    }

		$file = $request->file('deposit_slip');
		$oid = $request->input('orderId');
		$filename = $oid . '.' . $file->getClientOriginalExtension() ;
		$dir = base_path() . env('DEPOSIT_SLIP_UPLOAD_PATH');

		$file->move($dir, $filename);
		$payment = Order::find($oid)->payment;
		$payment->deposit_slip_image = $filename;
		$payment->save();

		return Redirect::to('orders');
	}

	public function verify(Request $request) {
		$order = Order::findOrFail($request->input('orderId'));
		$order->status = 1;
		$order->save();

		return Redirect::to('orders')->with('message', 'Order was verified.');
	}

}
