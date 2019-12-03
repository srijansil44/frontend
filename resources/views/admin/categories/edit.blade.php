@extends('layouts.admin')

@section('content')

    <h1>Edit A User</h1>


        <div class="col-sm-6">

     {!! Form::model($category,['method'=>'Patch', 'action'=>['AdminCategoriesController@update',$category->id]]) !!}

          <div class="form-group">
              {!! Form::label('name', 'Name:') !!}
               {!! Form::text('name', null, ['class'=>'form-control']) !!}

          </div>
           <div class="form-group">
            {!! Form::hidden('id',null,['class'=>'form-control']) !!}
           </div>

            <div class="form-group">
           {!! Form::submit('Update  Category', ['class'=>'btn btn-primary col-sm-6']) !!}
         </div>


      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

          <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}
          </div>


       {!! Form::close() !!}


        </div>
    @include('include.form_errors')
    @endsection

