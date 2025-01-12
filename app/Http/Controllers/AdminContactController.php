<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::latest()->get();
        return view('admin.contact.index', compact('submissions'));
    }

    public function respond(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        $submission = ContactSubmission::findOrFail($id);
        $submission->admin_response = $request->response;
        $submission->save();

        return redirect()->route('admin.contact.index')->with('success', 'Response sent successfully!');
    }
}
