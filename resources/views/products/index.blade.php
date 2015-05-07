@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Products</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CODE</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>IMAGE</th>
                        <th>PRICE</th>
                        <th>COMMISSION</th>
                        <th>AVAILABLE</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->image}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->commission}}</td>
                    <td>{{$product->available}}</td>

                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('products.show', $product->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>

            <a class="btn btn-success" href="{{ route('products.create') }}">Create</a>
        </div>
    </div>


@endsection