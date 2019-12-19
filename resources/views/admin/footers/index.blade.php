@extends('layouts.admin')


@include('include.tiny-editor')

@section('content')


    {!! Form::model($footer,['method'=>'post', 'action'=>'FooterController@store']) !!}

        {!! Form::label('footer_text', 'Footer text') !!}
        {{--            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}--}}
    {!! Form::textarea('footer_text', null, ['class'=>'form-control ','rows'=>3 ]) !!}



    <div class="form-group">
        {!! Form::label('copyright_text', 'Copyright text') !!}
        {{--            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}--}}
        {!! Form::textarea('copyright_text', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update ', ['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

    @include('include.form_errors')
@stop