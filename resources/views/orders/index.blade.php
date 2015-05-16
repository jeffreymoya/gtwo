@extends('layout')

@section('content')
<div class="preview-page row margin-vertical">
    <div class="col-md-10 col-md-offset-1">
        <h3>Approve Purchases</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Deposit Slip</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($orders as $order)
                <tr>
                    <td>{{$order->user->user_id}}</td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{ empty($order->payment->deposit_slip_image) ? 'No' : 'Yes' }}</td>
                    <td class="text-right">
                        <a class="btn btn-warning " href="{{ route('orders.edit', $order->id) }}">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection