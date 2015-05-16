@extends('layout')

@section('content')

<div class="preview-page row margin-vertical">
	<div class="col-md-10 col-md-offset-1"> 
	<h3>Checkout</h3>
	@if(Cart::getContent()->count())
	<table class="table table-striped">
		<thead>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price ({{Config::get('app.currency')}})</th>
			<th>Sum ({{Config::get('app.currency')}})</th>
			@if(Auth::user()->hasDiscount()) <th>Discount</th> @endif
			<th>Delete</th>
		</tr>
		</thead>
		<tbody>
			@foreach(Cart::getContent() as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>{{$item->quantity}}</td>
					<td><strong>{{$item->price}}</strong></td>
					<td><strong>{{round($item->price*$item->quantity,2)}}</strong></td>
					@if(Auth::user()->hasDiscount()) 
						<td>{{$item->conditions ? $item->conditions->getName() : none }}</td> 
					@endif
					<td><a href="{{ url('cart', $item->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="purchase-info">
			<h4 class="pull-left">@if(Auth::user()->hasDiscount()) Discounted @endif Amount: <span class="text-danger">{{ round(Cart::getTotal(), 2) }} {{Config::get('app.currency')}}</span></h4>
			<div class="form-group col-md-2 pull-right">
				<form action="{{ url('orders') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" class="form-control btn-danger" value="Confirm Purchase"></form>
			</div>
		</div>
	@else
		<p class="text-danger">You're shopping cart is empty.</p>	
	@endif
	</div>
</div>

@endsection