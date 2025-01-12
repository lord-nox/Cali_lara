<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categories = Category::with('faqs')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('faq.create', compact('categories'));
    }

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
    public function storeAnswer(Request $request, Faq $faq)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $faq->answers()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('faq.index')->with('success', 'Answer submitted successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('faq.edit', compact('faq', 'categories'));
    }

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

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
