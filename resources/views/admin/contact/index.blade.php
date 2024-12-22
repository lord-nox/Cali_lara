@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Submissions') }}
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">{{ __('Submissions') }}</h3>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Message</th>
                        <th class="px-4 py-2">Response</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $submission)
                        <tr>
                            <td class="border px-4 py-2">{{ $submission->name }}</td>
                            <td class="border px-4 py-2">{{ $submission->email }}</td>
                            <td class="border px-4 py-2">{{ $submission->message }}</td>
                            <td class="border px-4 py-2">
                                {{ $submission->admin_response ?? 'No response yet' }}
                            </td>
                            <td class="border px-4 py-2">
                                <form method="POST" action="{{ route('admin.contact.respond', $submission->id) }}">
                                    @csrf
                                    <div>
                                        <textarea name="response" rows="2" class="w-full">{{ $submission->admin_response }}</textarea>
                                    </div>
                                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">
                                        {{ __('Send Response') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
