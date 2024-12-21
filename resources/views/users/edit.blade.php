@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="is_admin">Role</label>
            <select name="is_admin" id="is_admin" class="form-control">
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>User</option>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
