@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Users</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USER_ID</th>
                        <th>ROLE_ID</th>
                        <th>IEXP4U_ID</th>
                        <th>FIRST_NAME</th>
                        <th>LAST_NAME</th>
                        <th>PHONE</th>
                        <th>PASSWORD</th>
                        <th>UPLOADED_ID</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->role_id}}</td>
                    <td>{{$user->iexp4u_id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->uploaded_id}}</td>

                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('users.show', $user->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>

            <a class="btn btn-success" href="{{ route('users.create') }}">Create</a>
        </div>
    </div>


@endsection