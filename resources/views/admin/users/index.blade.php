@extends('layouts.admin')

@section('content')

    @if(Session::has('created_user'))
        <div class="alert alert-success">{{session('created_user')}}</div>
    @endif
    @if(Session::has('updated_user'))
        <div class="alert alert-success">{{session('updated_user')}}</div>
    @endif
    @if(Session::has('deleted_user'))
        <div class="alert alert-success">{{session('deleted_user')}}</div>
    @endif


    <h1>Users</h1>
<table class="table table-hover">
   <thead>
     <tr>
        <th>Id</th>
        <th>User Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
      </tr>
    </thead>


    <tbody>

    @if($users)
        @foreach($users as $user)

      <tr>
        <td>{{$user->id}}</td>
        <td><img height="80" src="{{$user->photo ? $user->photo->path : 'https://via.placeholder.com/300.png/09f/fff'}}"  alt=""></td>
        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a> </td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>

        @endforeach
    @endif

    </tbody>


  </table>


@include('include.form_errors')
@stop


