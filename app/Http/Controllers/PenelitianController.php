<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penelitian = Penelitian::all();
        return view('penelitian.index', compact('penelitian'));
    }

    // public function index()
    // {
    //     $dosen = Dosen::all();
    //     return view('dosen.index', compact('dosen'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();
        return view('penelitian.create', compact('dosen', 'mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255', // nidn atau nim
            'nama_anggota' => 'nullable|array',
            'nama_anggota.*' => 'nullable|string|max:255', // nidn atau nim
            'sumber_dana' => 'required|string|max:255',
            'biaya' => 'required|integer',
            'jangka_waktu' => 'required|integer',
            'luaran_utama' => 'required|string',
        ]);

        Penelitian::create([
            'judul' => $request->judul,
            'nama_ketua' => $request->nama_ketua,
            'nama_anggota' => json_encode($request->nama_anggota ?? []),
            'sumber_dana' => $request->sumber_dana,
            'biaya' => $request->biaya,
            'jangka_waktu' => $request->jangka_waktu,
            'luaran_utama' => $request->luaran_utama,
        ]);

        return redirect()->route('penelitian.index')->with('success', 'Penelitian created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('penelitian.show', compact('penelitian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penelitian = Penelitian::findOrFail($id);
        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::all();
        return view('penelitian.edit', compact('penelitian', 'dosens', 'mahasiswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255', // nidn atau nim
            'nama_anggota' => 'nullable|array',
            'nama_anggota.*' => 'nullable|string|max:255', // nidn atau nim
            'sumber_dana' => 'required|string|max:255',
            'biaya' => 'required|integer',
            'jangka_waktu' => 'required|integer',
            'luaran_utama' => 'required|string',
        ]);

        $penelitian = Penelitian::findOrFail($id);

        $penelitian->update([
            'judul' => $request->judul,
            'nama_ketua' => $request->nama_ketua,
            'nama_anggota' => json_encode($request->nama_anggota ?? []),
            'sumber_dana' => $request->sumber_dana,
            'biaya' => $request->biaya,
            'jangka_waktu' => $request->jangka_waktu,
            'luaran_utama' => $request->luaran_utama,
        ]);

        return redirect()->route('penelitian.index')->with('success', 'Penelitian updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penelitian = Penelitian::findOrFail($id);
        $penelitian->delete();
        return redirect()->route('penelitian.index')->with('success', 'Penelitian deleted successfully.');
    }
}
