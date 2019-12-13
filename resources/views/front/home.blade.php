{{--@extends('layouts.blog-home')--}}

{{--@section('content')--}}

{{--    <div class="container">--}}


{{--        <div class="row">--}}

{{--            <!-- Blog Entries Column -->--}}
{{--            <div class="col-md-8">--}}

{{--                <!-- First Blog Post -->--}}

{{--                @if($posts)--}}
{{--                    @foreach($posts as $post)--}}
{{--                        <h2>--}}
{{--                            <a href="#">{{$post->title}}</a>--}}
{{--                        </h2>--}}
{{--                        <p class="lead">--}}
{{--                            by {{$post->user->name}}--}}
{{--                        </p>--}}
{{--                        <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>--}}
{{--                        <hr>--}}
{{--                        <img class="img-responsive" src="{{$post->photo ? $post->photo->path :  $post->photoPlaceHolder()}}" alt="">--}}
{{--                        <hr>--}}
{{--                        <p> {!! str_limit($post->body,200)  !!} </p>--}}
{{--                        <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>--}}


{{--                        <hr>--}}
{{--                @endforeach--}}

{{--            @endif--}}



{{--            <!-- Pagination-->--}}

{{--                <div class="row">--}}

{{--                    <div class="col-sm-6 col-sm-offset-5">--}}

{{--                        {{$posts->render()}}--}}

{{--                    </div>--}}

{{--                </div>--}}



{{--            </div>--}}

{{--            <!-- Blog Sidebar  -->--}}
{{--            @include('include.front_sidebar')--}}

{{--        </div>--}}
{{--        <!-- /.row -->--}}


{{--    </div>--}}
{{--@endsection--}}


        <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <style>
        body
        {
            font-family: 'Noto Sans TC', sans-serif;

        }




    </style>

    <link rel="stylesheet" href="{{asset('css/libs.css')}}">
    <link rel="stylesheet"  href="{{asset('css/app.css')}}" >
    <!-- Custom CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">XenaTech Services</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::guest())
                    <li><a href="{{url('/login')}}">Login</a></li>
                    <li><a href="{{url('/register')}}">Register</a></li>
                @else
                    <li><a href="/admin">Admin</a></li>
                    <li><a href="/logout">Logout</a></li>
                @endif


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<!-- Page Content -->
<div class="container" id="demo">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- First Blog Post -->

            @if($posts)
                @foreach($posts as $post)
            <h2>
                <a href="#">{{$post->title}}</a>
            </h2>
            <p class="lead">
                by {{$post->user->name}}
            </p>
                    <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

            <hr>
            <img class="img-responsive" src="{{$post->photo ? $post->photo->path : $post->photoPlaceHolder()}}" alt="">
            <hr>
                <p>{!! str_limit($post->body,100)!!}</p>
            <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            @endforeach

        @endif

            <!-- Pager -->
                   <div>
                       {{$posts->render()}}
                   </div>

        </div>


        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        @if($categories)
                        <ul class="list-unstyled">
                            @foreach($categories as $category)
                            <li><a href="#">{{$category->name}}</a>
                            </li>
                                @endforeach
                        </ul>

                            @endif
                    </div>

                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->
</div>




<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>










<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
