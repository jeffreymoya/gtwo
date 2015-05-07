@extends('layout')

@section('content')
<div class="page-header">
    <h1>Checkout</h1>
</div>
<div class="col-md-12">
	@if(Cart::getContent()->count())
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Delete</th>
		</tr>
		</thead>
		<tbody>
			@foreach(Cart::getContent() as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>{{$item->quantity}}</td>
					<td>{{$item->price}} USD</td>
					<td><a href="{{ url('cart', $item->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="row purchase-info">
			<h4>Total Purchase: <span class="text-danger">{{Cart::getTotal()}} USD</span></h4>
			<h4>Total Purchase: <span class="text-danger">{{Cart::getTotal()}} USD</span></h4>
			<div class="form-group col-md-2">
				<form action="{{ url('cart/checkout') }}"><input type="button" class="form-control btn-danger" value="Confirm Purchase"></form>
			</div>
		</div>
	@else
		<p class="text-danger">You're shopping cart is empty.</p>	
	@endif
</div>

@endsection