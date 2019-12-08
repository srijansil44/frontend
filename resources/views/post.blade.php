@extends('layouts.blog-post')

  @section('content')

      <h1>{{$post->title}}</h1>

      <!-- Author -->
      <p id="hello" class="lead">
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

          @if(Auth::check())
              <div class="well">
                  <h4>Leave a comment</h4>
                  {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                  <input type="hidden"  name='post_id' value={{$post->id}} >
                  <div class="form-group">
                      {!! Form::label('body', 'Body:') !!}
                      {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}

                  </div>

                  <div class="form-group">
                      {!! Form::submit('Comment', ['class'=>'btn btn-primary' ]) !!}
                  </div>


                  {!! Form::close() !!}
              </div>
          @endif


      <hr>

      <!-- Posted Comments -->
@if(count($comments)  > 0 )
      <!-- Comment -->
           @foreach($comments as $comment)
                   <div class="media">
                    <a class="pull-left" href="#">
                     <img class="media-object " height="64" width="64" src="{{$comment->photo}}" alt="">
                    </a>
              <div class="media-body">
                 <h4 class="media-heading">{{$comment->author}}
                  <small>{{$comment->created_at->diffForHumans()}}</small>
                 </h4>
                  <p> {{$comment->body}} </p>
                  {{--reply button for the comment --}}


                  <div class="comment-reply-conatiner">
                      <button class="toggle-reply btn btn-primary pull-right">reply</button>
                      <div class="comment-reply ">

                          {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                          <input type="hidden" name="comment_id" value="{{$comment->id}}">
                          <div class="form-group">
                              {!! Form::label('body', 'body:') !!}
                              {!! Form::textarea('body', null, ['class'=>'form-control' , 'rows'=>2]) !!}

                          </div>

                          <div class="form-group">
                              {!! Form::submit('reply', ['class'=>'btn btn-primary']) !!}
                          </div>
                          {!! Form::close() !!}
                      </div>

                  </div>



{{--   If the comment has replies --}}
                @if(count($comment->replies) > 0)
                  @foreach($comment->replies as $reply )
                      @if($reply->is_active == 1 )

                          <!-- Nested Comment -->

                              <div id="nested-comment"  class=" media">
                                   <a class="pull-left" href="#">
                                         <img class="media-object"  height="64" width="64" src="{{$reply->photo}}" alt="">
                                   </a>
                                     <div class="media-body">
                                          <h4 class="media-heading">{{$reply->author}}
                                             <small>{{$reply->created_at->diffForHumans()}}</small>
                                              </h4>
                                          <p>{{$reply->body}}</p>
                                     </div>
{{--reply button for the comment --}}
                              <div class="comment-reply-conatiner">
                                  <button class="toggle-reply btn btn-primary pull-right">reply</button>
                                     <div class="comment-reply col-sm-6">

                           {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                               <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <div class="form-group">
                                  {!! Form::label('body', 'body:') !!}
                                  {!! Form::textarea('body', null, ['class'=>'form-control' , 'rows'=>2]) !!}

                                  </div>

                               <div class="form-group">
                                   {!! Form::submit('reply', ['class'=>'btn btn-primary']) !!}
                               </div>
                           {!! Form::close() !!}
                                     </div>

                            </div>
                 <!-- End Nested Comment -->
                               </div>
                          @endif

                  @endforeach
                    @endif
              </div>
                   </div>
      @endforeach
@endif






  @stop


@section('scripts')



    <script>

        $('.comment-reply-conatiner .toggle-reply').click(function () {
            $(this).next().slideToggle('slow');

        });
    </script>


    @stop