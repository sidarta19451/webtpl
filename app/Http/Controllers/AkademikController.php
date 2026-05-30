<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akademik = Akademik::all();
        return view('akademik.index', compact('akademik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akademik.create');
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
            $filePath = $request->file('file')->store('akademik', 'public');
        }

        Akademik::create([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('akademik.index')->with('success', 'Data Akademik berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akademik $akademik)
    {
        return view('akademik.show', compact('akademik'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akademik $akademik)
    {
        return view('akademik.edit', compact('akademik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akademik $akademik)
    {
        $request->validate([
            'sub_kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file' => 'nullable|file|mimes:pdf',
        ]);

        $filePath = $akademik->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('akademik', 'public');
        }

        $akademik->update([
            'sub_kategori' => $request->sub_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('akademik.index')->with('success', 'Data Akademik berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akademik $akademik)
    {
        if ($akademik->file_path) {
            Storage::disk('public')->delete($akademik->file_path);
        }
        $akademik->delete();
        return redirect()->route('akademik.index')->with('success', 'Data Akademik berhasil dihapus');
    }
}
