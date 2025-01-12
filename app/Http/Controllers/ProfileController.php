<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
    
            $filePath = $file->store('profile_pictures', 'public');
    
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
    
            $user->update(['profile_picture' => $filePath]);
        }
    
        if ($request->has('birthday')) {
            $user->update(['birthday' => $request->input('birthday')]);
        }
    
        if ($request->has('about_me')) {
            $user->update(['about_me' => $request->input('about_me')]);
        }
    
        if ($request->has(['name', 'email'])) {
            $user->update($request->only(['name', 'email']));
        }
    
        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
    }
    

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
