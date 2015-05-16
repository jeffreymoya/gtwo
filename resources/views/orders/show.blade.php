@extends('layout')

@section('content')

    <div class="preview-page row margin-vertical">
        <div class="col-md-10 col-md-offset-1">
            <h3>Order # {{$order->id}}</h3>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{url('orders/upload')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                     <label for="product_id">Product Name:</label>
                     <span class="form-control-static">{{$order->product->name}}</span>
                </div>
                    <div class="form-group">
                     <label for="user_id">Quantity:</label>
                     <span class="form-control-static">{{$order->quantity}}</span>
                </div>
                    <div class="form-group">
                     <label for="address_id">Order Date:</label>
                     <span class="form-control-static">{{$order->created_at->toDateString()}}</span>
                     </div>
                <div class="form-group thin-border">
                     @if(!empty($order->payment->deposit_slip_image))
                        <label for="order_date">Deposit Slip</label>
                        <p class="form-control-static"><img class="deposit-slip" src="{{ url('images/deposits',$order->payment->deposit_slip_image) }}"></p>
                
                     @else
                        <label for="order_date">Upload Deposit Slip</label>
                        <span><input type="file" class="form-control-static" accept="image/*" name="deposit_slip"></span>
                     @endif
                     <input type="hidden" name="orderId" value="{{$order->id}}"/> 
                    @if(empty($order->payment->deposit_slip_image))
                        <button class="btn btn-danger" type="submit">Upload</button>
                    @endif
                </div>
            </form>

        </div>
    </div>


@endsection