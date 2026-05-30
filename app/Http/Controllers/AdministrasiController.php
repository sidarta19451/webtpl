<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrasi = Administrasi::all();
        return view('administrasi.index', compact('administrasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrasi.create');
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
            $filePath = $request->file('file')->store('administrasi', 'public');
        }

        Administrasi::create([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('administrasi.index')->with('success', 'Data Administrasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrasi $administrasi)
    {
        return view('administrasi.show', compact('administrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrasi $administrasi)
    {
        return view('administrasi.edit', compact('administrasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrasi $administrasi)
    {
        $request->validate([
            'sub_kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|file|mimes:pdf',
        ]);

        $filePath = $administrasi->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('administrasi', 'public');
        }

        $administrasi->update([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('administrasi.index')->with('success', 'Data Administrasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrasi $administrasi)
    {
        if ($administrasi->file_path) {
            Storage::disk('public')->delete($administrasi->file_path);
        }
        $administrasi->delete();
        return redirect()->route('administrasi.index')->with('success', 'Data Administrasi berhasil dihapus');
    }
}
