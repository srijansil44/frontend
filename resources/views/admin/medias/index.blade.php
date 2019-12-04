@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_photo'))
<div class="alert alert-success">{{session('deleted_photo')}}</div>
    @endif

    <h1>Media</h1>

        <table class="table table-hover">
           <thead>
             <tr>
                <th>Id</th>
                <th>Photos</th>
                <th>created_at</th>
              </tr>
           </thead>
            <tbody>
            @if($photos)
                @foreach($photos as $photo)
              <tr>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->path}}" alt=""></td>
                <td>{{$photo->created_at->diffForHumans()}}</td>
                  <td>
                       {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                           <div class="form-group">
                             {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
                           </div>
                      {!! Form::close() !!}
                  </td>
              </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    @include('include.form_errors')

@stop