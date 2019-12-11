@extends('layouts.admin')

@section('content')

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>photo</th>
            <th>Author</th>
            <th>Email</th>
            <th>body</th>
            <th>view post</th>
{{--            <th>post title</th>--}}
{{----}}
        </tr>
        </thead>
        <tbody>

        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><img height="50" src="{{$comment->photo}}" alt=""></td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{str_limit($comment->body,6)}}</td>
{{--                <td>{{$comment->post->title}}</td>--}}


                <td><a href="{{route('home.post', $comment->post->slug)}}">view post</a></td>
                <td>
                    @if($comment->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) !!}

                        <div class="form-group">
                            <input type="hidden" name="is_active" value= "0"  >
                            {!! Form::submit('Un-approved', ['class'=>'btn btn-warning']) !!}
                        </div>
                        {!! Form::close() !!}

                    @else

                        {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) !!}

                        <div class="form-group">
                            <input type="hidden" name="is_active" value= "1" >
                            {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}

                    @endif
                </td>
                <td> {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id]]) !!}


                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}</td>
            </tr>
        @endforeach


        </tbody>
    </table>


    @stop