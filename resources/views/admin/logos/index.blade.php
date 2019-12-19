@extends('layouts.admin')


@section('content')
    <div class="row">

{!! Form::model($logo, ['method'=>'post', 'action'=>'LogoController@store','files'=>true]) !!}
    <div class="form-group">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="{{asset('images/'.$logo->site_logo)}}" alt="...">
            <div class="caption">
                <h3>Site Logo</h3>
                <span class="text-danger bg-danger">Logo Must be Type of PNG</span>
                <input type="hidden" name="site_favicon" value="{{$logo->site_favicon}}">

                <div class="form-group">
                    {!! Form::file('site_logo', null, ['class'=>'form-control ']) !!}
                </div>
           <p>  <button type="submit" class="btn btn-info"> Change </button></p>
            </div>
        </div>
    </div>

        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{asset('images/'.$logo->site_favicon)}}" alt="...">

                <div class="caption">
                    <h3>Site Favicon</h3>
                    <span class="text-danger bg-danger">Favicon Must be Type of PNG</span>
                    <input type="hidden" name="site_logo" value="{{$logo->site_logo}}">

                    <div class="form-group">
                        {!! Form::file('site_favicon', null, ['class'=>'form-control btn-primary']) !!}
                    </div>
                    <p>  <button type="submit" class="btn btn-info"> Change </button></p>
                </div>
            </div>
        </div>
    </div>



{!! Form::close() !!}
    </div>
    @include('include.form_errors')

    @stop