@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <label for="is_admin">Role</label>
            <select name="is_admin" id="is_admin" class="form-control">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
