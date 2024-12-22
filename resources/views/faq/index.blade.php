@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQs') }}
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- "Ask a Question" Button for Authenticated Users -->
        @auth
            <div class="flex justify-end mb-4">
                <a href="{{ route('faq.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                    {{ __('Ask a Question') }}
                </a>
            </div>
        @endauth

        <!-- FAQ Categories and Questions -->
        @foreach ($categories as $category)
            <div class="bg-white shadow sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-xl font-bold">{{ $category->name }}</h3>
                    <ul>
                        @foreach ($category->faqs as $faq)
                            <li class="mt-4">
                                <h4 class="font-semibold">{{ $faq->question }}</h4>
                                <p>{{ $faq->answer ?? 'No answer yet.' }}</p>

                                <!-- Form to Answer the Question -->
                                @auth
                                    <form method="POST" action="{{ route('answer.store', $faq->id) }}" class="mt-4">
                                        @csrf
                                        <div>
                                            <x-input-label for="answer" :value="__('Your Answer')" />
                                            <textarea id="answer" name="answer" rows="2" class="block w-full mt-1"></textarea>
                                            <x-input-error :messages="$errors->get('answer')" />
                                        </div>
                                        <div class="mt-4">
                                            <x-primary-button>{{ __('Submit Answer') }}</x-primary-button>
                                        </div>
                                    </form>
                                @endauth

                                <!-- Admin Actions -->
                                @if(auth()->user() && auth()->user()->is_admin)
                                    <div class="flex items-center mt-4">
                                        <a href="{{ route('faq.edit', $faq->id) }}" class="text-blue-500 hover:underline mr-4">Edit</a>
                                        <form method="POST" action="{{ route('faq.destroy', $faq->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button class="bg-red-500 hover:bg-red-700">{{ __('Delete') }}</x-primary-button>
                                        </form>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
