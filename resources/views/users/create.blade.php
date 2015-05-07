@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Users / Create </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('users.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <input type="text" name="user_id" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="role_id">ROLE_ID</label>
                     <input type="text" name="role_id" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="iexp4u_id">IEXP4U_ID</label>
                     <input type="text" name="iexp4u_id" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="first_name">FIRST_NAME</label>
                     <input type="text" name="first_name" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="last_name">LAST_NAME</label>
                     <input type="text" name="last_name" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="phone">PHONE</label>
                     <input type="text" name="phone" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="password">PASSWORD</label>
                     <input type="text" name="password" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="uploaded_id">UPLOADED_ID</label>
                     <input type="text" name="uploaded_id" class="form-control" value=""/>
                </div>



            <a class="btn btn-default" href="{{ route('users.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>


@endsection