@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <header class="text-center py-16 bg-cover bg-center text-white" style="background-image: url('/images/dashboard-bg.jpg');">
        <h1 class="text-4xl font-bold drop-shadow-lg">Welcome to Calisthenics</h1>
        <p class="text-xl mt-4 drop-shadow-md">Dynamic Community Platform</p>
    </header>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature: Home -->
            <div class="bg-white bg-opacity-90 text-gray-800 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-center p-6">
                    <img src="/images/home-icon.png" alt="Home" class="h-20 mb-4">
                    <h3 class="text-xl font-bold">Home</h3>
                    <p class="mt-2 text-center text-gray-600">Find everything about calisthenics and more.</p>
                    <a href="{{ route('home') }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Go to Home</a>
                </div>
            </div>
            <!-- Feature: News -->
            <div class="bg-white bg-opacity-90 text-gray-800 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-center p-6">
                    <img src="/images/news-icon.png" alt="News" class="h-20 mb-4">
                    <h3 class="text-xl font-bold">News</h3>
                    <p class="mt-2 text-center text-gray-600">Stay updated with the latest calisthenics news.</p>
                    <a href="{{ route('news.index') }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Read News</a>
                </div>
            </div>
            <!-- Feature: FAQ -->
            <div class="bg-white bg-opacity-90 text-gray-800 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-center p-6">
                    <img src="/images/faq-icon.png" alt="FAQ" class="h-20 mb-4">
                    <h3 class="text-xl font-bold">FAQ</h3>
                    <p class="mt-2 text-center text-gray-600">Find answers to frequently asked questions.</p>
                    <a href="{{ route('faq.index') }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Visit FAQ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
