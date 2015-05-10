@extends('layout')

@section('content')
    <div class="page-header">
        <h1>{{$product->name}}</h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <div class="col-md-10">
                <div class="form-group pull-left img-holder col-md-4">
                    <img src="{{ url('img/no-pic-large.png') }}"></img>
                </div>
                    <div class="form-group pull-left col-md-6">
                     <label for="description">Description</label>
                     <p class="form-control-static">{{$product->description}}</p>
                </div>
                    <div class="form-group pull-left col-md-6">
                     <label for="price">Price</label>
                     <p class="form-control-static text-danger"><strong>{{$product->price}}</strong> {{Config::get('app.currency')}}</p>
                </div>
                    <div class="form-group pull-left col-md-6">
                     <label for="available">In Stock</label>
                     <p class="form-control-static">{{$product->available}}</p>
                </div>
                <div class="form-group col-md-6">
                    <form action="{{url('cart')}}" method="POST" class="form-inline">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="prodId" value="{{$product->id}}">
                        <select class="form-control" name="quantity">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>    
                        <button class="btn btn-primary" type="submit">Add to Cart</button>
                    </form>
                </div>
            </div>
            @include('products.cart')
        </div>
    </div>


@endsection