<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $berita = Berita::when($search, function($query, $search) {
            return $query->where('judul_berita', 'like', "%{$search}%");
        })
        ->orderBy("created_at", "desc");
        
        return view('berita.index', [
            'berita' => $berita,
            'search' => $search // Pass the search term to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("berita.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul_berita' => 'required|max:255',
            'isi' => 'required',
            'author' => 'required',
        ]);

        $foto = $request->file('foto');
        $fotoPath = $foto->storeAs('/images/berita/', $foto->hashName());
        
        Berita::create([
            'foto' => $foto->hashName(),
            'judul_berita' => $request->judul_berita,
            'slug' => Str::slug($request->judul_berita),
            'isi' => $request->isi,
            'author' => $request->author,
        ]);

        return redirect()->route('berita.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail(); // Use firstOrFail for better error handling
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail(); // Use firstOrFail for better error handling
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $this->validate($request, [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul_berita' => 'required|max:255',
            'isi' => 'required',
            'author' => 'required',
        ]);

        $berita = Berita::where('slug', $slug)->firstOrFail(); // Use firstOrFail for better error handling
        
        $data = [
            'judul_berita' => $request->judul_berita,
            'slug' => Str::slug($request->judul_berita),
            'isi' => $request->isi,
            'author' => $request->author,
        ];

        if ($request->hasFile('foto')) {
            // Delete the old photo if it exists
            if (Storage::exists('/images/berita/' . $berita->foto)) {
                Storage::delete('/images/berita/' . $berita->foto);
            }

            $foto = $request->file('foto');
            $fotoPath = $foto->storeAs('/images/berita/', $foto->hashName());
            $data['foto'] = $foto->hashName();
        }

        $berita->update($data); // Update the berita with new data

        return redirect()->route('berita.index')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail(); // Use firstOrFail for better error handling

        // Delete the photo if it exists
        if (Storage::exists('/images/berita/' . $berita->foto)) {
            Storage::delete('/images/ berita/' . $berita->foto);
        }

        $berita->delete(); // Delete the berita record

        return redirect()->route('berita.index')->with('success', 'Data Berhasil Dihapus');
    }
}