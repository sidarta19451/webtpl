<?php

namespace App\Http\Controllers;

use App\Models\Pkm;
use Illuminate\Http\Request;

class PkmController extends Controller
{
    public function index()
    {
        $pkms = Pkm::all();
        return view('pkm.index', compact('pkms'));
    }

    public function create()
    {
        return view('pkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_pkm' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255',
            'nama_anggota' => 'nullable|array',
            'nama_anggota.*' => 'nullable|string|max:255',
            'mitra' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'sumber_dana' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
            'luaran_wajib' => 'required|string',
            'dokumentasi' => 'nullable|url',
        ]);

        Pkm::create([
            'judul_pkm' => $request->judul_pkm,
            'nama_ketua' => $request->nama_ketua,
            'anggota' => json_encode($request->nama_anggota ?? []),
            'mitra' => $request->mitra,
            'lokasi' => $request->lokasi,
            'sumber_dana' => $request->sumber_dana,
            'biaya' => $request->biaya,
            'luaran_wajib' => $request->luaran_wajib,
            'dokumentasi' => $request->dokumentasi,
        ]);

        return redirect()->route('pkm.index')->with('success', 'Data PKM berhasil ditambahkan');
    }

    public function show(Pkm $pkm)
    {
        return view('pkm.show', compact('pkm'));
    }

    public function edit(Pkm $pkm)
    {
        return view('pkm.edit', compact('pkm'));
    }

    public function update(Request $request, Pkm $pkm)
    {
        $request->validate([
            'judul_pkm' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255',
            'nama_anggota' => 'nullable|array',
            'nama_anggota.*' => 'nullable|string|max:255',
            'mitra' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'sumber_dana' => 'required|string|max:255',
            'biaya' => 'required|integer|min:0',
            'luaran_wajib' => 'required|string',
            'dokumentasi' => 'nullable|url',
        ]);

        $pkm->update([
            'judul_pkm' => $request->judul_pkm,
            'nama_ketua' => $request->nama_ketua,
            'anggota' => json_encode($request->nama_anggota ?? []),
            'mitra' => $request->mitra,
            'lokasi' => $request->lokasi,
            'sumber_dana' => $request->sumber_dana,
            'biaya' => $request->biaya,
            'luaran_wajib' => $request->luaran_wajib,
            'dokumentasi' => $request->dokumentasi,
        ]);

        return redirect()->route('pkm.index')->with('success', 'Data PKM berhasil diperbarui');
    }

    public function destroy(Pkm $pkm)
    {
        $pkm->delete();
        return redirect()->route('pkm.index')->with('success', 'Data PKM berhasil dihapus');
    }
}
