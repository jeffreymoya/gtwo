@extends('layout')

@section('content')
<div class="preview-page row margin-vertical">
    <div class="col-md-10 col-md-offset-1"> 
        <h3>Create Order</h3>
            <form action="{{ route('products.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="code">CODE</label>
                     <input type="text" name="code" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="name">NAME</label>
                     <input type="text" name="name" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <input type="text" name="description" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="image">IMAGE</label>
                     <input type="text" name="image" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="price">PRICE</label>
                     <input type="text" name="price" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="commission">COMMISSION</label>
                     <input type="text" name="commission" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="available">AVAILABLE</label>
                     <input type="text" name="available" class="form-control" value=""/>
                </div>



            <a class="btn btn-default" href="{{ route('products.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>


@endsection