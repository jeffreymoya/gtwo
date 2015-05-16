@section('cart')
<h3>Shopping Cart</h3>
<div class="box">
      
	  @if(Cart::getContent()->count())
		  <ul>
		  	  @foreach(Cart::getContent() as $item)	
			  <li>
			  	<span>{{$item->name}}&nbsp;&nbsp;x&nbsp;&nbsp;{{$item->quantity}}</span>
			  </li>
			  @endforeach
		  </ul>
		  <div class="add-cart">                              
	        <h4><a href="{{ url('cart/checkout')}}">Checkout</a></h4>
	      </div>
	   @else
			<ul><li>Your shopping cart is empty.</li></ul>	
	   @endif
	 
	 <div class="clear"></div>    
</div>
</div>

@show