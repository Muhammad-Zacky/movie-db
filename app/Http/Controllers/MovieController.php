<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class MovieController extends Controller
{
    public function index() {
        $movies = Movie::latest()->paginate(6);
        return view('homepage', compact('movies'));
    }
    public function show($id)
    {
        $movie = Movie::with('category')->findOrFail($id);
        return view('movie_detail', compact('movie'));
    }
    public function create() {
        $categories = Category::all();
        return view('movie_form', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validasi data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'synopsis' => 'nullable|string',
        'category_id' => 'required|string',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'actors' => 'nullable|string',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Generate slug otomatis
    $validated['slug'] = Str::slug($validated['title']);

    // Simpan cover image jika ada
    if ($request->hasFile('cover_image')) {
        $validated['cover_image'] = $request->file('cover_image')->store('images', 'public');
    }

    // Simpan data ke database
    Movie::create($validated);

    // Redirect kembali dengan pesan sukses
   return redirect()->back()->with('success', 'Film berhasil ditambahkan!');
  }   

  public function list()
    {
        $movies = Movie::paginate(10);
        return view('list_movie', compact('movies'));
    }
    
    public function edit($id)
    {
        $movies = Movie::findorfail($id);
        return view('edit_movie', compact('movies'));
    }

    public function update(Request $request, $id)
    {
        $movies = Movie::findorfail($id);
        $movies->update([
            'title' => $request->title,
            'synopsis' => $request->synopsis,
            'year' => $request->year,
            'category_id' => $request->category_id,
            'actors' => $request->actors,
        ]);
        return redirect('/list')->with('success', 'berhasil mengupdate data movie');
    }

    public function destroy($id)
    {
        $data = Movie::findorfail($id);
        $data->delete();
        return redirect()->back()->with('success', 'data berhasil di hapus');
    }

}
