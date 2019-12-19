@extends('layouts.admin')


@section('content')
    <form action="{{route('socials.create')}}", method="post">
        @csrf
        <input type="hidden" name="_method" value="get">
        <button alt="edit" type="submit" class="btn btn-success"><i class="fas fa-plus-square"></i> </button>
    </form>


    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Icon</th>
            <th>link</th>
        </tr>
        </thead>


        @if($socials)
            <tbody>
            @foreach($socials as $social)
                <tr>
                    <td>{{$social->name}}</td>
                    <td > <span>{!! $social->icon !!}</span></td>
                    <td>{{$social->link}}</td>
                    <td>
                        <form action="{{route('socials.edit',$social->id)}}"  method="post">
                            @csrf
                            <input type="hidden" name="_method" value="get" >
                            <div class="form-group">
                                <button type="submit" class="btn btn-info "><i class="  fas fa-edit"></i></button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('socials.destroy',$social->id)}}", method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger "><i class="  far fa-trash-alt"></i></button>
                            </div>
                        </form>

                    </td>
            @endforeach
            </tbody>
        @endif
    </table>



@stop