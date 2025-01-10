@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">News</h1>

        <!-- Add News Button for Admin -->
        @auth
            @if (auth()->user()->is_admin)
                <div class="mb-6 text-center">
                    <a href="{{ route('news.create') }}" 
                       class="inline-block bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-200">
                        Add News Item
                    </a>
                </div>
            @endif
        @endauth

        <!-- News Items -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($news as $item)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- News Image -->
                    <img 
                        src="{{ asset('storage/' . $item->image) }}" 
                        alt="{{ $item->title }}" 
                        class="w-full h-48 object-cover">

                    <!-- News Content -->
                    <div class="p-6">
                        <h5 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h5>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->content, 100, '...') }}</p>
                        <p class="text-gray-500 text-xs mb-4">{{ $item->publication_date->format('F d, Y') }}</p>

                        <!-- View Details Button -->
                        <a href="{{ route('news.show', $item) }}" 
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-200">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
