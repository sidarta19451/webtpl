<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kurikulum = Kurikulum::all(); 
        return view('kurikulum.index', compact('kurikulum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'semester' => 'required',
            'sks' => 'required',
            'deskripsi' => 'required',

        ]);

        Kurikulum::create([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'semester' => $request->semester,
            'sks' => $request->sks,
            'deskripsi' => $request->deskripsi,
            
        ]);
        return redirect()->route('kurikulum.index')->with('success','Data Kurikulum Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kurikulum $kurikulum)
    {
        return view('Kurikulum.show', compact('kurikulum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kurikulum $kurikulum)
    {
        return view('Kurikulum.edit', compact('kurikulum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'semester' => 'required',
            'sks' => 'required',
            'deskripsi' => 'required'
        ]);

        $kurikulum->update([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'semester' => $request->semester,
            'sks' => $request->sks,
            'deskripsi' => $request->deskripsi,
           
        ]);

        return redirect()->route('kurikulum.index')->with('success','Data Kurikulum Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return redirect()->route('kurikulum.index')->with('success', 'Data Kurikulum berhasil dihapus');
    }
}
