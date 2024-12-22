<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request, $faqId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Answer::create([
            'content' => $request->content,
            'faq_id' => $faqId,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Answer added successfully.');
    }
}
