<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::with('kegiatan')->latest()->get();
        return view('galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        return view('galeri.create', compact('kegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kegiatan_id' => 'required|exists:tbl_kegiatan,id',
            'file' => 'required|file|mimes:png,jpg,jpeg,mp4',
            'tipe' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);
        
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('galeri', 'public');
        }
        Galeri::create($validated);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $galeri = Galeri::with('kegiatan')->findOrFail($id);
        return view('galeri.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $kegiatan = Kegiatan::all();
        return view('galeri.edit', compact('galeri', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kegiatan_id' => 'required|exists:tbl_kegiatan,id',
            'file' => 'nullable|file|mimes:png,jpg,jpeg,mp4',
            'tipe' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $galeri = Galeri::findOrFail($id);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('galeri', 'public');
        } else {
            $validated['file'] = $galeri->file;
        }

        $galeri->update($validated);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }
}
