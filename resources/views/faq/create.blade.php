@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ask a Question') }}
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('faq.store') }}">
                @csrf

                <!-- Question -->
                <div>
                    <x-input-label for="question" :value="__('Question')" />
                    <x-text-input id="question" name="question" type="text" class="block mt-1 w-full" required />
                    <x-input-error :messages="$errors->get('question')" />
                </div>

                <!-- Category Dropdown -->
                <div class="mt-4">
                    <x-input-label for="category_id" :value="__('Category')" />
                    <select id="category_id" name="category_id" class="block mt-1 w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" />
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <x-primary-button>{{ __('Submit Question') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
