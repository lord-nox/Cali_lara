<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Save the submission to the database
        ContactSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'userMessage' => $request->message, // Renamed variable to avoid conflict
        ];

        // Send email to admin
        Mail::send('emails.contact', $data, function ($mail) use ($data) {
            $mail->to('lars.paridaens@student.ehb.be') // Replace with admin's email
                ->subject('Contact Form Submission');
        });

        return redirect()->route('contact.index')->with('success', 'Your message has been sent successfully!');
    }
}
