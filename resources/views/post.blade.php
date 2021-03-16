@extends('layouts.blog-post')

@section('content')

    @include('includes.tiny-editor')

    <!-- Title -->
    <h5 class="mt-4">{{ $post->title }}</h5>

    <!-- Author & Date/Time -->
    <div class="row">
        <div class="col-sm-6">
            <span>
                by {{ $post->user->name }}
            </span>
        </div>
        <div class="col-sm-6">
            <span class="date-time float-sm-right"><i class="fa fa-clock-o"></i> Posted on {{ $post->created_at->diffForHumans() }}</span>
        </div>
    </div>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid" src="{{ $post->photo ? $post->photo->photo_path : $post->photoPlaceholder() }}" alt="">

    <hr>

    <!-- Post Content -->
    <div style="font-size: .95rem; text-align: justify">{!! $post->body !!}</div>

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
            <h6 class="card-header">Leave a Comment:</h6>
            <div class="card-body">
                {!! Form::open(['action' => 'App\Http\Controllers\PostCommentsController@store', 'method' => 'post']) !!}

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="form-group">
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('SUBMIT', ['class' => 'btn btn-sm btn-dark rounded-0', 'style' => 'margin-bottom: -20px']) !!}
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
                    <h6 class="mt-0">
                        {{ $comment->author }}
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </h6>
                    <span class="comment-body">
                        {{ $comment->body }}
                    </span>

                    @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="{{ $reply->photo }}" height="40" alt="">
                                    <div class="media-body">
                                        <h6 class="mt-0">
                                            {{ $reply->author }}
                                            <small>{{ $reply->created_at->diffForHumans() }}</small>
                                        </h6>
                                        <span class="reply-body">
                                            {{ $reply->body }}
                                        </span>
                                    </div>
                                </div>
                            @else
                                <h4 class="text-center">no replies available</h4>
                            @endif
                        @endforeach
                    @else

                    @endif

                    @if(Auth::check())
                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-sm btn-dark rounded-0 my-3">REPLY</button>

                        <div class="comment-reply">
                            {!! Form::open(['action' => 'App\Http\Controllers\CommentRepliesController@createReply', 'method' => 'post']) !!}

                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                            <div class="form-group">
                                {!! Form::textarea('body', null, ['class' => 'form-control mt-3']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('SUBMIT', ['class' => 'btn btn-sm btn-dark rounded-0']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @endif
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
