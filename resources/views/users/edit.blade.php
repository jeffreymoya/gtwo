@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Users / Edit </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$user->id}}</p>
                </div>
                <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <input type="text" name="user_id" class="form-control" value="{{$user->user_id}}"/>
                </div>
                    <div class="form-group">
                     <label for="role_id">ROLE_ID</label>
                     <input type="text" name="role_id" class="form-control" value="{{$user->role_id}}"/>
                </div>
                    <div class="form-group">
                     <label for="iexp4u_id">IEXP4U_ID</label>
                     <input type="text" name="iexp4u_id" class="form-control" value="{{$user->iexp4u_id}}"/>
                </div>
                    <div class="form-group">
                     <label for="first_name">FIRST_NAME</label>
                     <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}"/>
                </div>
                    <div class="form-group">
                     <label for="last_name">LAST_NAME</label>
                     <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}"/>
                </div>
                    <div class="form-group">
                     <label for="phone">PHONE</label>
                     <input type="text" name="phone" class="form-control" value="{{$user->phone}}"/>
                </div>
                    <div class="form-group">
                     <label for="password">PASSWORD</label>
                     <input type="text" name="password" class="form-control" value="{{$user->password}}"/>
                </div>
                    <div class="form-group">
                     <label for="uploaded_id">UPLOADED_ID</label>
                     <input type="text" name="uploaded_id" class="form-control" value="{{$user->uploaded_id}}"/>
                </div>



            <a class="btn btn-default" href="{{ route('users.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection