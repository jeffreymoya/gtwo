@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Products / Edit </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$product->id}}</p>
                </div>
                <div class="form-group">
                     <label for="code">CODE</label>
                     <input type="text" name="code" class="form-control" value="{{$product->code}}"/>
                </div>
                    <div class="form-group">
                     <label for="name">NAME</label>
                     <input type="text" name="name" class="form-control" value="{{$product->name}}"/>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <input type="text" name="description" class="form-control" value="{{$product->description}}"/>
                </div>
                    <div class="form-group">
                     <label for="image">IMAGE</label>
                     <input type="text" name="image" class="form-control" value="{{$product->image}}"/>
                </div>
                    <div class="form-group">
                     <label for="price">PRICE</label>
                     <input type="text" name="price" class="form-control" value="{{$product->price}}"/>
                </div>
                    <div class="form-group">
                     <label for="commission">COMMISSION</label>
                     <input type="text" name="commission" class="form-control" value="{{$product->commission}}"/>
                </div>
                    <div class="form-group">
                     <label for="available">AVAILABLE</label>
                     <input type="text" name="available" class="form-control" value="{{$product->available}}"/>
                </div>



            <a class="btn btn-default" href="{{ route('products.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection