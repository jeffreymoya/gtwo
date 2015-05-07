@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Products</h1>
    </div>


    <div class="row">
        <div class="col-md-12 pull-left">
            @foreach($products as $product)
                <div class="col-md-2">
                    <a href="{{ url('products', $product->id) }}"><img src="{{ url('img/no-pic-large.png') }}" class="img-thumbnail"/></a>
                    <p class="text-center"><strong>{{ $product->name }}</strong></p>
                </div>
            @endforeach
            @include('products.cart')
        </div>
    </div>


@endsection