@extends('layouts.blog-post')

  @section('content')

      <h1>{{$post->title}}</h1>

      <!-- Author -->
      <p class="lead">
          by <a href="#">{{$post->user->name}}</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

      <hr>

      <!-- Preview Image -->
      <img class="img-responsive" src="{{$post->photo->path}}" alt="">

      <hr>

      <!-- Post Content -->
{{--      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>--}}
{{--      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>--}}
{{--      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>--}}
{{--      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>--}}
{{--      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>--}}
<p>{{$post->body}}</p>
      <hr>

      <!-- Blog Comments -->

      <!-- Comments Form -->
      <div class="well">
          <h4>Leave a Comment:</h4>
      {!! Form::open(['method'=>'POST', 'action'=>'Controller@store']) !!}

           <div class="form-group">
               {!! Form::label('body', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}

           </div>

          <div class="form-group">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
          </div>


       {!! Form::close() !!}


      <hr>

      <!-- Posted Comments -->

      <!-- Comment -->
      <div class="media">
          <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
          </a>
          <div class="media-body">
              <h4 class="media-heading">Start Bootstrap
                  <small>August 25, 2014 at 9:30 PM</small>
              </h4>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
      </div>

      <!-- Comment -->
      <div class="media">
          <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
          </a>
          <div class="media-body">
              <h4 class="media-heading">Start Bootstrap
                  <small>August 25, 2014 at 9:30 PM</small>
              </h4>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              <!-- Nested Comment -->
              <div class="media">
                  <a class="pull-left" href="#">
                      <img class="media-object" src="http://placehold.it/64x64" alt="">
                  </a>
                  <div class="media-body">
                      <h4 class="media-heading">Nested Start Bootstrap
                          <small>August 25, 2014 at 9:30 PM</small>
                      </h4>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
              </div>
              <!-- End Nested Comment -->
          </div>
      </div>

      @stop