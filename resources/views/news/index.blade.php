@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">News</h1>
        @auth
            @if (auth()->user()->is_admin)
                <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Add News Item</a>
            @endif
        @endauth

        @foreach ($news as $item)
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->content }}</p>
                    <p class="text-muted">{{ $item->publication_date->format('F d, Y') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
