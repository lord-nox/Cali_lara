@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>About Me:</strong> {{ $user->about_me ?? 'No details provided.' }}</p>
    <p><strong>Birthday:</strong> {{ $user->birthday ?? 'Not specified.' }}</p>
</div>
@endsection