@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
        <!-- News Title -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $news->title }}</h1>

        <!-- News Image -->
        <img src="{{ asset('storage/' . $news->image) }}" 
             alt="{{ $news->title }}" 
             class="w-full h-64 object-cover rounded-lg mb-6">

        <!-- News Content -->
        <p class="text-gray-700 text-lg leading-relaxed mb-4">{{ $news->content }}</p>
        <p class="text-gray-500 text-sm mb-6">Published on {{ $news->publication_date->format('F d, Y') }}</p>

        <!-- Comments Section -->
        <hr class="my-6">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Comments</h3>

        @auth
            <!-- Add Comment Form -->
            <form action="{{ route('comments.store', $news) }}" method="POST" class="mb-6">
                @csrf
                <textarea name="content" 
                          class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-3" 
                          rows="3" 
                          placeholder="Leave a comment..."></textarea>
                <button type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-200">
                    Post Comment
                </button>
            </form>
        @else
            <p class="text-gray-600">
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a> to post a comment.
            </p>
        @endauth

        <!-- Display Comments -->
        <div class="space-y-4">
            @foreach ($comments as $comment)
                <div class="border-b pb-4">
                    <strong class="text-gray-800">{{ $comment->user->name }}</strong> 
                    <span class="text-gray-500 text-sm">• {{ $comment->created_at->diffForHumans() }}</span>
                    <p class="text-gray-700 mt-2">{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
