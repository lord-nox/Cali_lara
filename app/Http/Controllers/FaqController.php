<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a list of FAQs grouped by category.
     */
    public function index()
    {
        $categories = Category::with('faqs')->get();
        return view('faq.index', compact('categories'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        $categories = Category::all();
        return view('faq.create', compact('categories'));
    }

    /**
     * Store a newly created FAQ in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Faq::create([
            'question' => $request->question,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('faq.index')->with('success', 'Question added successfully.');
    }

    /**
     * Show the form for editing an existing FAQ.
     */
    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('faq.edit', compact('faq', 'categories'));
    }

    /**
     * Update an existing FAQ.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq->update($request->only(['question', 'answer', 'category_id']));

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Delete an existing FAQ.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
