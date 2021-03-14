@extends('layouts.blog-home')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

    @if($posts)

        @foreach($posts as $post)

            <div class="card mb-4">
                <img class="card-img-top" src="{{ $post->photo ? $post->photo->photo_path : $post->photoPlaceholder() }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{!! Str::limit($post->body, 300) !!}</p>
                    <a href="{{ route('home.post', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $post->created_at->diffForHumans() }} by
                    <a href="#">{{ $post->user->name }}</a>
                </div>
            </div>

        @endforeach

    @endif

@endsection
