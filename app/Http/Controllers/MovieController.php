<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'genre_id' => 'required|exists:genres,id',
            'photo' => 'required|image|max:5120',
            'title' => 'required|max:30',
            'description' => 'required|max:50',
            'publish_date' => 'required|date|before_or_equal:today',
        ]);

        $path = $request->file('photo')->store('movies', 'public');
        Movie::create(array_merge($validated, ['photo' => $path]));

        return redirect('/')->with('success', 'Film berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        // Hapus file gambar jika ada
        if ($movie->photo) {
            \Storage::disk('public')->delete($movie->photo);
        }

        $movie->delete();

        return redirect('/')->with('success', 'Film berhasil dihapus');
    }
}
