@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit FAQ') }}
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <form method="POST" action="{{ route('faq.update', $faq->id) }}">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="question" :value="__('Question')" />
                    <textarea id="question" name="question" rows="2" class="block w-full mt-1">{{ old('question', $faq->question) }}</textarea>
                    <x-input-error :messages="$errors->get('question')" />
                </div>

                <div class="mt-4">
                    <x-input-label for="answer" :value="__('Answer')" />
                    <textarea id="answer" name="answer" rows="4" class="block w-full mt-1">{{ old('answer', $faq->answer) }}</textarea>
                    <x-input-error :messages="$errors->get('answer')" />
                </div>

                <div class="mt-4">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
