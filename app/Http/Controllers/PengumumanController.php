<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman.index',compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required'

        ]);

        Pengumuman::create([
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal ?: Carbon::now()->toDateString(),
            'waktu' => $request->waktu ?: Carbon::now()->toTimeString(),
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan

        ]);
        return redirect()->route('pengumuman.index')->with('success','Data Pengumuman Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ]);

        $pengumuman->update([
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal ?: Carbon::now()->toDateString(),
            'waktu' => $request->waktu ?: Carbon::now()->toTimeString(),
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan

        ]);

        return redirect()->route('pengumuman.index')->with('success','Data Pengumuman Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->foto && Storage::disk('public')->exists($pengumuman->foto)){
            Storage::disk('public')->delete($pengumuman->foto);
        }

        // bila coding diataas tidak jalan gunakan yang dibawah

        // if($Pengumuman->foto && file_exists(storage_path('app/public/'. $Pengumuman->foto))) {
        //     unlink(storage_path('app/public/' . $Pengumuman->foto));
        // }
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')->with('success', 'Data Pengumuman berhasil dihapus');
    }
}
