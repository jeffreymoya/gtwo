@extends('layout')

@section('content')
<div class="preview-page row margin-vertical">
    <div class="col-md-10 col-md-offset-1"> 
        <h3>Orders</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total ({{Config::get('app.currency')}})</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>

            @foreach($orders as $order)
            <tr>
                <td>{{$order->product->name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->created_at->toDateString()}}</td>
                <td>{{$order->status === 1 ? 'Verified' : 'Pending'}}</td>
                @if($order->status !== 1)
                    <td><a href="{{url('orders',$order->id)}}"><span class="glyphicon glyphicon-zoom-in"></span></a></td>
                @else
                    <td>&nbsp;</td>
                @endif
            </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection