@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Products / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                     <label for="code">CODE</label>
                     <p class="form-control-static">{{$product->code}}</p>
                </div>
                    <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$product->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$product->description}}</p>
                </div>
                    <div class="form-group">
                     <label for="image">IMAGE</label>
                     <p class="form-control-static">{{$product->image}}</p>
                </div>
                    <div class="form-group">
                     <label for="price">PRICE</label>
                     <p class="form-control-static">{{$product->price}}</p>
                </div>
                    <div class="form-group">
                     <label for="commission">COMMISSION</label>
                     <p class="form-control-static">{{$product->commission}}</p>
                </div>
                    <div class="form-group">
                     <label for="available">AVAILABLE</label>
                     <p class="form-control-static">{{$product->available}}</p>
                </div>
            </form>



            <a class="btn btn-default" href="{{ route('products.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('products.edit', $product->id) }}">Edit</a>
            <form action="#/$product->id" method="DELETE" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>


@endsection