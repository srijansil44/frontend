@extends('layouts.admin')


@include('include.tiny-editor')

@section('content')


    {!! Form::model($about,['method'=>'post', 'action'=>'AboutUsController@store']) !!}

    <div class="form-group">
        {!! Form::label('about_us', 'About-Us') !!}
        {!! Form::textarea('about_us', null, ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('terms_conditions', 'Term Condition ') !!}
        {{--            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}--}}
        {!! Form::textarea('terms_conditions', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update ', ['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

    @include('include.form_errors')

@stop