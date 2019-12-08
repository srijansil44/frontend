@extends('layouts.admin')


@section('content')


    @if(Session::has('deleted_post'))
        <div class="alert alert-success">{{session('deleted_post')}} </div>
    @endif

    @if(Session::has('cannot_updated'))
        <div class="alert alert-success">{{session('cannot_updated') }} </div>
    @endif

    @if(Session::has('cannot_delete'))
        <div class="alert alert-success">{{session('cannot_delete') }} </div>
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
            <th>Post link</th>
            <th>Comment</th>
            <th>Create_at</th>
            <th>Updated_at</th>
          </tr>
        </thead>

        <tbody>
        @if($posts)
            @foreach($posts as $post)
            <tr>
               <td>{{$post->id}}</td>
                <td><img height="100"src="{{$post->photo ? $post->photo->path :'http://placehold.it/400x400' }}" alt=""></td>
               <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
               <td>{{$post->category? $post->category->name: 'Uncategorized'}} </td>
               <td>{{$post->title}}</td>
                <td>{{str_limit($post->body,6)}}</td>
                <td><a href="{{route('home.post', $post->slug)}}">View post</a></td>
                <td><a href="{{route('admin.comments.show', $post->id)}}">view comments</a></td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                 <td>{{$post->updated_at->diffForHumans()}}</td>

          </tr>
            @endforeach
        @endif

        </tbody>



      </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
             {{$posts->render()}}
        </div>
    </div>

    @include('include.form_errors')

@stop