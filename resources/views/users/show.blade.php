@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Users / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$user->id}}</p>
                </div>
                <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <p class="form-control-static">{{$user->user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="role_id">ROLE_ID</label>
                     <p class="form-control-static">{{$user->role_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="iexp4u_id">IEXP4U_ID</label>
                     <p class="form-control-static">{{$user->iexp4u_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="first_name">FIRST_NAME</label>
                     <p class="form-control-static">{{$user->first_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="last_name">LAST_NAME</label>
                     <p class="form-control-static">{{$user->last_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone">PHONE</label>
                     <p class="form-control-static">{{$user->phone}}</p>
                </div>
                    <div class="form-group">
                     <label for="password">PASSWORD</label>
                     <p class="form-control-static">{{$user->password}}</p>
                </div>
                    <div class="form-group">
                     <label for="uploaded_id">UPLOADED_ID</label>
                     <p class="form-control-static">{{$user->uploaded_id}}</p>
                </div>
            </form>



            <a class="btn btn-default" href="{{ route('users.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">Edit</a>
            <form action="#/$user->id" method="DELETE" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>


@endsection