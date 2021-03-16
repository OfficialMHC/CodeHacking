@extends('layouts.blog-home')

@section('content')

    @if($posts)

        @foreach($posts as $post)

            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-1 photo-col">
                            <img class="rounded-circle" src="{{ $post->user ? $post->user->photo->photo_path : "http://placehold.it/40x40" }}" alt="" width="50" height="50">
                        </div>
                        <div class="col-sm-11 user-col">
                            <span class="user-name">{{ $post->user->name }}</span>
                            <br>
                            <span class="created-at">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <img class="img-fluid"  src="{{ $post->photo ? $post->photo->photo_path : $post->photoPlaceholder() }}" alt="Card image cap">
                </div>
                <div class="card-footer">
                    <h6 class="card-title"><b>{{ $post->title }}</b></h6>

                    <p class="card-text">{!! Str::limit($post->body, 350) !!}</p>
                    <a href="{{ route('home.post', $post->slug) }}" class="btn btn-sm btn-light float-right">Read More &rarr;</a>
                </div>
            </div>

        @endforeach

    @endif

@endsection
