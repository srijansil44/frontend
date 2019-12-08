@extends('layouts.admin')

@section('content')
    @if(count($replies) > 0)

    <h1>Comment Replies</h1>
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
        @foreach($replies as $reply)
            <tr>
                <td>{{$reply->id}}</td>
                <td><img height="50" src="{{$reply->photo}}" alt=""></td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->email}}</td>
                <td>{{str_limit($reply->body,6)}}</td>
                {{--                <td>{{$comment->post->title}}</td>--}}


                <td><a href="{{route('home.post', $reply->comment->post->slug)}}">view post</a></td>
                <td>
                    @if($reply->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]]) !!}

                        <div class="form-group">
                            <input type="hidden" name="is_active" value= "0"  >
                            {!! Form::submit('Un-approved', ['class'=>'btn btn-warning']) !!}
                        </div>
                        {!! Form::close() !!}

                    @else

                        {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]]) !!}

                        <div class="form-group">
                            <input type="hidden" name="is_active" value= "1" >
                            {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}

                    @endif
                </td>
                <td> {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy',$reply->id]]) !!}


                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}</td>
            </tr>
        @endforeach
            @else
                <h4 class="text-center">No comment  replies</h4>
                @endif


        </tbody>
    </table>


@stop