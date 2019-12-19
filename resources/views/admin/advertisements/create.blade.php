@extends('layouts.admin')


@section('content')




       {!! Form::open(['method'=>'POST', 'action'=>'AdminAdvertisementsController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('ad_size', 'Advertisement Size:') !!}
                {!!  Form::select('ad_size', ['1' => '340X340', '2' => '728X90'], null, ['class'=>'form-control', 'placeholder' => 'Pick a size...'])  !!}

            </div>


       <div class="form-group">
           {!! Form::label('ad_title', ' Advertisement Title:') !!}
           {!! Form::text('ad_title', null, ['class'=>'form-control']) !!}
       </div>





       <div class="form-group">
           {!! Form::label('ad_linka', ' Advertisement link:') !!}
           {!! Form::text('ad_link', null, ['class'=>'form-control']) !!}
       </div>


       <div class="form-group">
           {!! Form::label('ad_image', ' Advertisement Title:') !!}
           {!! Form::file('ad_image', null, ['class'=>'form-control']) !!}
       </div>

       <div class="form-group">
           {!! Form::label('is_active', 'Status:') !!}
           {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], null, ['class'=>'form-control']) !!}
       </div>





       <div class="form-group">

             {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}

           </div>


        {!! Form::close() !!}




@include('include.form_errors')
@stop