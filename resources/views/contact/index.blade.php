@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
<title>Dashboard</title>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Contact Form -->
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Your Name')" />
                    <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" required />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Your Email')" />
                    <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" required />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="message" :value="__('Your Message')" />
                    <textarea id="message" name="message" rows="4" class="block mt-1 w-full" required></textarea>
                    <x-input-error :messages="$errors->get('message')" />
                </div>

                <div class="mt-4">
                    <x-primary-button>{{ __('Send') }}</x-primary-button>
                </div>
            </form>

            <!-- Admin Response -->
            @if ($latestSubmission && $latestSubmission->admin_response)
                <div class="mt-6 p-4 border rounded bg-gray-100">
                    <h3 class="font-semibold text-lg">{{ __('Admin Response') }}</h3>
                    <p class="mt-2">{{ $latestSubmission->admin_response }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
