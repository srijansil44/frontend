@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_photo'))
<div class="alert alert-success">{{session('deleted_photo')}}</div>
    @endif


    <h1 class="bg-info"> Media </h1>
        @if($photos)
            <form action="delete/media" method="POST" class="form-inline">

                {{csrf_field()}}
                {{method_field('delete')}}
                <div class="form-group">
                    <select name="checkBoxArray" id="" class="form-control">
                        <option value=""> Delete</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-danger">
                </div>

        <table class="table table-hover">
        <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
            <th>Photos</th>
            <th>Created_at</th>
        </tr>
        </thead>
        <tbody>
            @foreach($photos as $photo)
                    <tr>
                        <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>
                        <td><img height="50" src="{{$photo->path}}" alt=""></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>
{{--                        <td>--}}
{{--                             <div class="form-group">--}}
{{--                                 <input type="submit" name="delete_single[{{$photo->id}}]" value="Delete" class="btn btn-danger">--}}
{{--                             </div>--}}
{{--                        </td>--}}
                    </tr>
            @endforeach
        @endif
        </tbody>
    </table>
            </form>


    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$photos->render()}}
        </div>
    </div>



    @include('include.form_errors')

@stop

@section('scripts')
    <script>

        $(document).ready(function () {
            $('#options').click(function () {
                if (this.checked) {
                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    });
                } else {
                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
    </script>
    @stop