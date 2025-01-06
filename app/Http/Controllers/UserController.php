<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a list of all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form to edit a user's details
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update a user's details
    public function update(Request $request, User $user)
    {
        $request->validate([
            'is_admin' => 'required|boolean',
        ]);

        // Update the user's admin status
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Show the form to create a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query'); // Ophalen van de zoekterm

        // Zoeken naar gebruikers op basis van naam of e-mailadres
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('users.search', compact('users', 'query'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
