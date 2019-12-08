@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_photo'))
<div class="alert alert-success">{{session('deleted_photo')}}</div>
    @endif

    <h1 class="bg-info">User </h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photos</th>
            <th>User</th>
            <th>Created_at</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                @if($photo->user)
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><img height="50" src="{{$photo->path}}" alt=""></td>
                        <td><a href="{{route('admin.users.index')}}">{{$photo->user ? $photo->user->name :'user doest not exist'}}</a></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>
                        <td>    {!! Form::open(['method'=>'Delete', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete User  Photo', ['class'=>'btn btn-danger']) !!}
                            </div>


                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
        </tbody>
    </table>

{{---------------------------------------------------------------------------}}
    <h1 class="bg-info">Post </h1>

    <table class="table table-hover">
       <thead>
         <tr>
            <th>Id</th>
            <th>Photos</th>
            <th>Post</th>
            <th>Created_at</th>
          </tr>
        </thead>
        <tbody>
        @if($photos)
        @foreach($photos as $photo)
           @if($photo->post)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50" src="{{$photo->path}}" alt=""></td>
              <td><a href="{{route('admin.posts.index')}}">{{$photo->post ? $photo->post->title :'post doest not exist'}}</a></td>

            <td>{{$photo->created_at->diffForHumans()}}</td>
             <td>    {!! Form::open(['method'=>'Delete', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                 <div class="form-group">
                   {!! Form::submit('Delete Post  Photo', ['class'=>'btn btn-danger']) !!}
                 </div>


              {!! Form::close() !!}
             </td>
          </tr>
          @endif
       @endforeach
            @endif
        </tbody>
      </table>





{{--        --------------------------------------------------------------------------------------------}}
      <h1 class="bg-info" >Unused photo</h1>
    <table class="table table-hover">
        <thead>
        <th>Photos</th>


        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
               @if(!($photo->post || $photo->user))
                    <tr>
                        <td><img height="50" src="{{$photo->path}}" alt=""></td>

                        <td>    {!! Form::open(['method'=>'Delete', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete Post  Photo', ['class'=>'btn btn-danger']) !!}
                            </div>


                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endif
            @endforeach
        @endif
        </tbody>
    </table>


    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$photos->render()}}
        </div>
    </div>


    @include('include.form_errors')

@stop