@extends('layouts.blog-post')


@section('content')

	<br><br>

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="image">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>


    @if(Session::has('comment_message'))

        {{session('comment_message')}}

    @endif
    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->

        <div class="well">
            <h4>Leave a Comment:</h4>

            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

            	<input type="hidden" name="post_id" value="{{$post->id}}">

            	<div class="form-group">
            		{!! Form::label('body', 'Body:') !!}
            		{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
            	</div>

            	<div class="form-group">
            		{!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
            	</div>

            {!! Form::close() !!}
        </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    @if(count($comments) > 0)

        @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    <p>{{$comment->body}}</p>

                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-warning pull-right">Reply</button>

                        <div class="comment-reply col-sm-10"> 
                            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                <div class="form-group">
                                    {!! Form::label('body', 'Tile:') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=> 2]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class'=>'btn btn-info']) !!}
                                </div>

                            {!! Form::close() !!}
                        </div>                                 
                    </div>

                    @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)

                                <!-- Nested Comment -->
                                <div id="nested-comment" class="media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>


                                <!-- End Nested Comment -->
                            </div>


                            @endif
                        @endforeach
                    @endif

                </div> <!-- media body clas -->
            </div> <!-- end of media -->
        @endforeach

    @endif

@endsection



@section('scripts')
    <script type="text/javascript">

        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });

    </script>
@endsection