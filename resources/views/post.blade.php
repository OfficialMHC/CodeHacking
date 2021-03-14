@extends('layouts.blog-post')

@section('content')

    <!-- Title -->
    <h3 class="mt-4">{{ $post->title }}</h3>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><i class="fa fa-clock-o"></i> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{ $post->photo->photo_path }}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->body !!}</p>

    <hr>

    @if(Session::has('comment-message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('comment-message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has('reply-message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('reply-message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Comments Form -->
    @if(Auth::check())
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            {!! Form::open(['action' => 'App\Http\Controllers\PostCommentsController@store', 'method' => 'post']) !!}

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="form-group">
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('SUBMIT', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endif

    <!-- Single Comment -->
    @if(count($comments) > 0)
        @foreach($comments as $comment)
        <div class="media mb-4">
{{--            If You using Gravatar then use it--}}
{{--            <img class="d-flex mr-3 rounded-circle" src="{{ Auth::user()->gravatar }}" height="50" alt="">--}}
            <img class="d-flex mr-3 rounded-circle" src="{{ $comment->photo }}" height="50" alt="">
            <div class="media-body">
                <h5 class="mt-0">
                    {{ $comment->author }}
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </h5>
                {{ $comment->body }}

                @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="{{ $reply->photo }}" height="30" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">
                                    {{ $reply->author }}
                                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                                </h5>
                                {{ $reply->body }}
                            </div>
                        </div>
                        @else
                            <h4 class="text-center">no replies available</h4>
                        @endif
                    @endforeach
                @else
                    <h4 class="text-center">no replies available</h4>
                @endif

                <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-sm btn-dark mt-2">REPLY</button>

                    <div class="comment-reply">
                        {!! Form::open(['action' => 'App\Http\Controllers\CommentRepliesController@createReply', 'method' => 'post']) !!}

                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                        <div class="form-group">
                            {!! Form::textarea('body', null, ['class' => 'form-control mt-3', 'rows' => '1']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('SUBMIT', ['class' => 'btn btn-sm btn-dark']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif

@stop

@section('scripts')

    <script>
        $(document).ready(function(){
            $(".comment-reply-container .toggle-reply").click(function (){
                $(this).next().slideToggle("slow");
            });
        });
    </script>

@stop
