@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Users</h1>

    <!-- Create New User Button -->
    @auth
        @if(auth()->user()->is_admin)
            <div class="mb-6 text-right">
                <a href="{{ route('users.create') }}" 
                   class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600 transition duration-200">
                    Create New User
                </a>
            </div>
        @endif
    @endauth

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Admin</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4 text-sm text-gray-800 border border-gray-200">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 border border-gray-200">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 border border-gray-200">
                            <span class="{{ $user->is_admin ? 'bg-green-100 text-green-800 px-2 py-1 rounded-full' : 'bg-red-100 text-red-800 px-2 py-1 rounded-full' }}">
                                {{ $user->is_admin ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800 border border-gray-200">
                            <a href="{{ route('users.edit', $user) }}" 
                               class="text-blue-500 hover:underline">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
