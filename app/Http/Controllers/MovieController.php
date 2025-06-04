<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::with('category')->findOrFail($id);
        return view('movie_detail', compact('movie'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('movie_form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'actors' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('images', 'public');
        }

        Movie::create($validated);

        return redirect()->back()->with('success', 'Film berhasil ditambahkan!');
    }

    // ✅ Tambahkan ini:
    public function search(Request $request)
    {
        $query = $request->input('query');

        $movies = Movie::where('title', 'like', '%' . $query . '%')
                       ->orWhere('actors', 'like', '%' . $query . '%')
                       ->orWhere('synopsis', 'like', '%' . $query . '%')
                       ->paginate(6);

        return view('search_results', compact('movies', 'query'));
    }
}
