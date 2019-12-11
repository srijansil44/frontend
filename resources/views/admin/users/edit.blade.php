@extends('layouts.admin')

@section('content')

    <h1>Edit A User</h1>

{{--    <img class=" img-circle"  src="{{$user->photo->path}}" alt="">--}}
    <div class="row">
      <div class="col-sm-3 ">

        <img src="{{$user->photo ? $user->photo->path : 'https://via.placeholder.com/300.png/09f/fff'}}" class="img-responsive img-rounded" alt="">

      </div>

     <div class="col-sm-9">
    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id] ,'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id',  $role, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password',  ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'User image:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>


{{--   updating the users--}}
    <div class="form-group">
        {!! Form::submit('Update User', ['class'=>'btn btn-info  col-sm-6'] )!!}

    </div>

         {!! Form::close() !!}

         {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}

         <div class="form-group">
{{--Deleting the users--}}
             {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6'] ) !!}

         </div>

        {!! Form::close() !!}









     </div>
    </div>

     <div class="row">
    @include('include.form_errors')
     </div>


@stop