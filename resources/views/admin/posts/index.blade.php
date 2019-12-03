@extends('layouts.admin')


@section('content')


    @if(Session::has('deleted_post'))
        <p class="bg-success">{{session('deleted_post')}} </p>
    @endif

    @if(Session::has('cannot_updated'))
        <h3 class="bg-info">{{session('cannot_updated') }} </h3>
    @endif

    @if(Session::has('cannot_delete'))
        <h3 class="bg-info display-4">{{session('cannot_delete') }} </h3>
    @endif


    <h1>  Posts </h1>
    <table class="table table-hover">
       <thead>
         <tr>
            <th>Id</th>
            <th>Images</th>
            <th>Owner</th>
            <th>Category</th>
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
            <td><img height="100"src="{{$post->photo ? $post->photo->path :'http://placehold.it/400x400' }}" alt=""></td>
            <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category->name}} </td>
            <td>{{$post->title}}</td>
            <td>{{str_limit($post->body,6)}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
        @endif

        </tbody>



      </table>

@stop