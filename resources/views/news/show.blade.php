@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid">
        <p>{{ $news->content }}</p>
        <p class="text-muted">Published on {{ $news->publication_date->format('F d, Y') }}</p>

        <hr>
        <h3>Comments</h3>
        @auth
            <form action="{{ route('comments.store', $news) }}" method="POST">
                @csrf
                <textarea name="content" class="form-control mb-2" rows="3" placeholder="Leave a comment..."></textarea>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        @else
            <p><a href="{{ route('login') }}">Log in</a> to post a comment.</p>
        @endauth

        <div class="mt-4">
            @foreach ($comments as $comment)
                <div class="mb-2">
                    <strong>{{ $comment->user->name }}</strong> <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
