@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $user->name }}</h1>
        
        <div class="space-y-4">
            <p class="text-lg text-gray-600">
                <strong class="text-gray-800">Email:</strong> 
                <span class="text-gray-700">{{ $user->email }}</span>
            </p>
            <p class="text-lg text-gray-600">
                <strong class="text-gray-800">About Me:</strong> 
                <span class="text-gray-700">{{ $user->about_me ?? 'No details provided.' }}</span>
            </p>
            <p class="text-lg text-gray-600">
                <strong class="text-gray-800">Birthday:</strong> 
                <span class="text-gray-700">{{ $user->birthday ?? 'Not specified.' }}</span>
            </p>
        </div>
    </div>
</div>
@endsection
