@extends('layouts.app')

@section('content')
<div class="container" style="margin: 0; padding: 0;">
    <h1 class="mb-4">Search Users</h1>

    <!-- Search Form -->
    <form action="{{ route('users.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search users by name or email" value="{{ old('query', $query ?? '') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Search Results -->
    @if(isset($users) && $users->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View Profile</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $users->links() }}
    @else
        <p>No users found.</p>
    @endif
</div>
@endsection
