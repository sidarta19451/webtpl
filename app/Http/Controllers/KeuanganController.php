<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangan = Keuangan::all();
        return view('keuangan.index', compact('keuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keuangan.create');
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
            $filePath = $request->file('file')->store('keuangan', 'public');
        }

        Keuangan::create([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('keuangan.index')->with('success', 'Data Keuangan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        return view('keuangan.show', compact('keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        return view('keuangan.edit', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'sub_kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|file|mimes:pdf',
        ]);

        $filePath = $keuangan->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('keuangan', 'public');
        }

        $keuangan->update([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('keuangan.index')->with('success', 'Data Keuangan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        if ($keuangan->file_path) {
            Storage::disk('public')->delete($keuangan->file_path);
        }
        $keuangan->delete();
        return redirect()->route('keuangan.index')->with('success', 'Data Keuangan berhasil dihapus');
    }
}
