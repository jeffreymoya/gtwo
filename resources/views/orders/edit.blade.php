@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Order # {{$order->id}}</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{url('orders/verify')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                     <label for="product_id">User</label>
                     <p class="form-control-static">{{$order->user->user_id}}</p>
                </div>
                <div class="form-group">
                     <label for="product_id">Product Name</label>
                     <p class="form-control-static">{{$order->product->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="user_id">Quantity</label>
                     <p class="form-control-static">{{$order->quantity}}</p>
                </div>
                    <div class="form-group">
                     <label for="address_id">Order Date</label>
                     <p class="form-control-static">{{$order->created_at->toDateString()}}</p>
                    <div class="form-group">
                     @if(!empty($order->payment->deposit_slip_image))
                        <label for="order_date">Deposit Slip</label>
                        <p class="form-control-static">
                        <a target="_" href="{{ url('images/deposits',$order->payment->deposit_slip_image) }}">
                        <img class="deposit-slip" src="{{ url('images/deposits',$order->payment->deposit_slip_image) }}"></a>
                        </p>
                </div>
                     @else
                        <p class="text-danger"><strong>Deposit slip is not yet uploaded.</strong></p>
                     @endif
                </div>
                <input type="hidden" name="orderId" value="{{$order->id}}"/> 
                @if(!empty($order->payment->deposit_slip_image))
                    <button class="btn btn-danger" type="submit">Verify Purchase</button>
                @endif
            </form>

        </div>
    </div>


@endsection