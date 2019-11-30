@extends('layouts.admin')


@section('content')

    <h1>  Posts </h1>

    <table class="table table-hover">
       <thead>
         <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>category_id</th>
            <th>photo_id</th>
            <th>title</th>
            <th>body</th>
            <th>created_at</th>
            <th>updated_at</th>
          </tr>
        </thead>

        <tbody>
        @if($posts)
            @foreach($posts as $post)
            <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category_id}}</td>
            <td> <img height="100"src="{{$post->photo ? $post->photo->path :'http://placehold.it/400x400' }}" alt=""></td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
        @endif

        </tbody>



      </table>

@stop