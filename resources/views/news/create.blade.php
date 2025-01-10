@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Add News Item</h1>

        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Field -->
            <div class="mb-5">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title') }}" 
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" 
                    placeholder="Enter news title" 
                    required>
                @error('title')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Content Field -->
            <div class="mb-5">
                <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                <textarea 
                    id="content" 
                    name="content" 
                    rows="5" 
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300" 
                    placeholder="Write the content here..." 
                    required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Field -->
            <div class="mb-5">
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                @error('image')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring focus:ring-blue-300">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection