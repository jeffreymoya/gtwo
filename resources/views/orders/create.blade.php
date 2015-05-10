@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Orders / Create </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('orders.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="product_id">PRODUCT_ID</label>
                     <input type="text" name="product_id" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <input type="text" name="user_id" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="address_id">ADDRESS_ID</label>
                     <input type="text" name="address_id" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="order_date">ORDER_DATE</label>
                     <input type="text" name="order_date" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="shipping_id">SHIPPING_ID</label>
                     <input type="text" name="shipping_id" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="status">STATUS</label>
                     <input type="text" name="status" class="form-control" value=""/>
                </div>



            <a class="btn btn-default" href="{{ route('orders.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>


@endsection