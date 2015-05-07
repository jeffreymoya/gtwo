@section('cart')
<div class="col-md-2 pull-right shopping-cart">
	<h4>Shopping Cart</h4>
	<hr/>
	@if(Cart::getContent()->count())
	<table class="table table-striped">
		<thead><tr><th>Product</th><th>#</th><th>&nbsp;</th></tr></thead>
		<tbody>
			@foreach(Cart::getContent() as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>{{$item->quantity}}</td>
					<td><a href="{{ url('cart', $item->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
		<div class="form-group">
		<form action="{{ url('cart/checkout') }}">
		<input type="submit" class="form-control btn-danger" value="Checkout"></form>
		</div>
	@else
		<p class="text-danger">You're shopping cart is empty.</p>	
	@endif
</div>

@show