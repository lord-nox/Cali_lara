<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('publication_date', 'desc')->get(); // Retrieve all news items
        return view('news.index', compact('news')); // Return to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create'); // Return the view for creating a news item
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // Ensure the uploaded file is an image
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public'); // Save image to 'news_images'
        }

        // Save the news item
        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'publication_date' => now(),
        ]);

        return redirect()->route('news.index')->with('success', 'News item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $comments = $news->comments()->with('user')->latest()->get();
        return view('news.show', compact('news', 'comments'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
