@extends('layouts.admin')




@section('content')


             {!! Form::model($setting, ['method'=>'post', 'action'=>'SettingController@store']) !!}

             <div class="form-group">
                 {!! Form::label('website_title', 'Web title:') !!}
                 {!! Form::text('website_title', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::label('website_sub_title', 'Web Sub title:') !!}
                 {!! Form::text('website_sub_title', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::label('number', 'Contact Number:') !!}
                 {!! Form::number('number', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::label('email', 'email:') !!}
                 {!! Form::text('email', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::label('address', 'Address') !!}
                 {!! Form::text('address', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::label('web_meta_tag', 'Web Meta Tag') !!}
                 {!! Form::text('web_meta_tag', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::label('web_author', 'Web author') !!}
                 {!! Form::text('web_author', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::label('web_description', 'Web description') !!}
                 {!! Form::text('web_description', null, ['class'=>'form-control']) !!}
             </div>

             <div class="form-group">
                 {!! Form::submit('Update ', ['class'=>'btn btn-primary']) !!}
             </div>


    {!! Form::close() !!}






@stop
