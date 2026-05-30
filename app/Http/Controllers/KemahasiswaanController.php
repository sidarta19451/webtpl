<?php

namespace App\Http\Controllers;

use App\Models\Kemahasiswaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KemahasiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kemahasiswaan = Kemahasiswaan::all();
        return view('kemahasiswaan.index', compact('kemahasiswaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kemahasiswaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|file|mimes:pdf',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('kemahasiswaan', 'public');
        }

        Kemahasiswaan::create([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('kemahasiswaan.index')->with('success', 'Data Kemahasiswaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kemahasiswaan $kemahasiswaan)
    {
        return view('kemahasiswaan.show', compact('kemahasiswaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kemahasiswaan $kemahasiswaan)
    {
        return view('kemahasiswaan.edit', compact('kemahasiswaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kemahasiswaan $kemahasiswaan)
    {
        $request->validate([
            'sub_kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|file|mimes:pdf',
        ]);

        $filePath = $kemahasiswaan->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('kemahasiswaan', 'public');
        }

        $kemahasiswaan->update([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('kemahasiswaan.index')->with('success', 'Data Kemahasiswaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kemahasiswaan $kemahasiswaan)
    {
        if ($kemahasiswaan->file_path) {
            Storage::disk('public')->delete($kemahasiswaan->file_path);
        }
        $kemahasiswaan->delete();
        return redirect()->route('kemahasiswaan.index')->with('success', 'Data Kemahasiswaan berhasil dihapus');
    }
}
