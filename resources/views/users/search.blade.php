@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Search Users</h1>

    <!-- Search Form -->
    <form action="{{ route('users.search') }}" method="GET" class="flex justify-center mb-8">
        <div class="flex items-center w-full max-w-xl">
            <input 
                type="text" 
                name="query" 
                class="flex-1 p-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring focus:ring-blue-300" 
                placeholder="Search users by name or email" 
                value="{{ old('query', $query ?? '') }}">
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-6 py-3 rounded-r-lg hover:bg-blue-600 transition">
                Search
            </button>
        </div>
    </form>

    <!-- Search Results -->
    @if(isset($users) && $users->count() > 0)
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">Name</th>
                        <th class="px-4 py-2 border border-gray-300">Email</th>
                        <th class="px-4 py-2 border border-gray-300 text-center">Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300">{{ $user->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">
                                <a 
                                    href="{{ route('users.show', $user->id) }}" 
                                    class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition">
                                    View Profile
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center text-gray-500 mt-6">No users found.</p>
    @endif
</div>
@endsection
