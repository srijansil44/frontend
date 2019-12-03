@extends('layouts.admin')


@section('content')
    <h1 >Categories </h1>


    @if(Session::has('deleted_category'))
        <div class="alert alert-success">{{session('deleted_category') }} </div>
    @endif




    <div class="row">
       <div class=" col-sm-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

                 <div class="form-group">
                     {!! Form::label('name', 'Name:') !!}
                      {!! Form::text('name', null, ['class'=>'form-control' ]) !!}

                 </div>

                <div class="form-group">
                  {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
                </div>


             {!! Form::close() !!}

       </div>




       <div class="col-sm-6">
       <table class="table table-hover">
         <thead>
         <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created_At</th>
{{--            <th>Updated_At</th>--}}
          </tr>
         </thead>
          <tbody>
           @if($categories)
            @foreach($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
            <td>{{$category->created_at->diffForHumans()}}</td>
{{--            <td>{{$category->updated_at->diffForHumans()}}</td>--}}
          </tr>
          @endforeach
               @endif

          </tbody>
        </table>
       </div>

   </div>

    @include('include.form_errors')


@endsection



