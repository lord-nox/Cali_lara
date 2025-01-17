<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the latest submission for the logged-in user (if authenticated)
        $latestSubmission = null;

        if (auth()->check()) {
            $latestSubmission = ContactSubmission::where('email', auth()->user()->email)
                ->latest()
                ->first();
        }

        return view('contact.index', compact('latestSubmission'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        ContactSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'userMessage' => $request->message,
        ];

        Mail::send('emails.contact', $data, function ($mail) use ($data) {
            $mail->to('lars.paridaens@student.ehb.be')
                ->subject('Contact Form Submission');
        });

        return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully!');
    }
}
