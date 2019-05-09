@extends('layouts.blog-post')


@section('content')


  <h1>Post</h1>

  <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{ $post->user->name }} </a>
        </p>

        <hr>

        <!-- Date/Time -->
       
        <p><span class="glyphicon glyphicon-time"></span>{{ $post->created_at->diffForHumans() }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{ $post->photo->file }}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $post->body }}</p>
    
        <hr>

        @if(Session::has('comment_message'))

            {{session('comment_message') }}
        
        @endif

        <!-- Blog Comments -->

@if(Auth::check())

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>


            {!! Form::open(['method' => 'post', 'action' => 'PostCommentsController@store']) !!}

               <input type="hidden" name="post_id" value="{{$post->id}}">

               <div class="form-group">
                   {!! Form::label('body', 'Body:') !!}
                   {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
               </div>

               <div class="form-group">
                   {!! Form::submit('Create a comment', ['class' => 'btn btn-primary']) !!}
               </div>

               {!! Form::close() !!}

         {{--    <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> --}}
        </div>
@endif

        <hr>

        <!-- Posted Comments -->

    @if(count($comments) > 0)

        @foreach($comments as $comment)
    
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" height="50" src="{{$comment->photo }}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans() }}</small>
                    </h4>
                    <p>{{$comment->body}}</p>

     
            @if(count($comment->replies) < 0))

                @foreach($comment->replies as $replie)

                 @if($replie->is_active == 1)

                    <!-- Nested Comment -->
                    <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" height="50" src="{{$replie->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $replie->author }}
                                    <small>{{ $replie->created_at->diffForHumans() }}</small>
                                </h4>
                                <p>{{$replie->body }}</p>
                            </div>

                            
                 <div class="comment-reply-container">

                        <button class="toogle-reply btn btn-primary pull-right">Reply</button>

                        <div class="comment-reply"> 

                                {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReplay']) !!}
                                   
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}"> {{-- Moramo ovo prosljediti kontroleru inace Column 'comment_id' cannot be null --}} 
                                        <div class="form-group">
                                            {!! Form::label('body', 'Leave a comment:') !!}
                                            {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 2]) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Reply', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                            {!! Form::close() !!}
                        </div>
                                    <!-- End Nested Comment -->
                        
                </div>
            </div>
            @else 

               <h1 class="text-center">No Replies</h1>

                    @endif
                @endforeach
                   
            @endif
                </div>
            </div>
        @endforeach
    @endif
   

@stop


{{-- @section('scripts')

<script>

    $(".comment-reply-container .toggle-reply").click(function() {

        $(this).next().slideToggle("slow");
    });



</script>
@stop --}}