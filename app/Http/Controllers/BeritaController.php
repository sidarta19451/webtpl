<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        return view('Berita.index',compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $admin = Admin::all();
        return view('Berita.create', compact('mahasiswa', 'dosen', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'penulis' => 'required',
            'tanggal' => 'required'
            

        ]);

        $foto = null;
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $foto,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal ?: Carbon::now()->toDateString()
            
        ]);
        return redirect()->route('berita.index')->with('success','Data Berita Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('Berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $admin = Admin::all();
        return view('berita.edit', compact('berita', 'mahasiswa', 'dosen', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'penulis' => 'required',
            'tanggal' => 'nullable|date'
        ]);

        $foto = $berita->foto;

        // Delete old photo if new photo is uploaded
        if($request->hasFile('foto')){
            // Delete old photo file if it exists
            if($berita->foto && Storage::disk('public')->exists($berita->foto)){
                Storage::disk('public')->delete($berita->foto);
            }
            $foto = $request->file('foto')->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $foto,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal ?: Carbon::now()->toDateString(),
           
        ]);

        return redirect()->route('berita.index')->with('success','Data Berita Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if ($berita->foto && Storage::disk('public')->exists($berita->foto)){
            Storage::disk('public')->delete($berita->foto);
        }

        // bila coding diataas tidak jalan gunakan yang dibawah

        // if($berita->foto && file_exists(storage_path('app/public/'. $berita->foto))) {
        //     unlink(storage_path('app/public/' . $berita->foto));
        // }
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Data Berita berhasil dihapus');
    }
}
