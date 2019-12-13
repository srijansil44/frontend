@extends('layouts.admin')


@section('content')
@include('include.tiny-editor')
    <h1> Edit Posts</h1>

    <div class="row">

        <div class="col-sm-3">

            <img class="img-responsive" src="{{$post->photo?$post->photo->path:'http://placehold.it/400x400'}}" alt="">
              
        </div>
        
        <div class="col-sm-9">
        
        {!! Form::model($post, ['method'=>'patch', 'action'=>['AdminPostsController@update',$post->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id',  $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Post photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description:') !!}
            {{--            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}--}}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}


     {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id]]) !!}

         <div class="form-group">
           {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
         </div>
    {!! Form::close() !!}
        </div>

    </div>


    <div class="row">
        @include('include.form_errors')
    </div>

@stop