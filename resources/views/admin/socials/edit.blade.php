@extends('layouts.admin')




@section('content')


    <form action="{{route('socials.update',$social->id)}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="patch" />

        <div class="form-group">
            <label for="name">Social Name </label>
            <input type="text" class="form-control"  name="name" value="{{$social->name}}">

        </div>


        <div class="form-group">
            <label for="icon">Social Icon</label>
            <input type="text"  class="form-control" name="icon" value="{{$social->icon}}">
            <div>
                <code class="bg-danger">For Fontawesome code visit : http://fontawesome.io/icons/</code>
            </div>
        </div>

        <div class="form-group">
            <label for="link"> Social link</label>
            <input type="text" class="form-control" name="link" value="{{$social->link}}">

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary ">Update Social</button>
        </div>


    </form>

    @include('include.form_errors')
@stop