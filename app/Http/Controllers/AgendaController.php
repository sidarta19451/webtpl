<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Kegiatan;
use App\Models\Kemahasiswaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agenda = Agenda::with(['kegiatan', 'kemahasiswaan'])->get();
        return view('agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        $kemahasiswaan = Kemahasiswaan::where('sub_kategori', 'kegiatan')->get();
        return view('agenda.create', compact('kegiatan', 'kemahasiswaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'kegiatan' => 'required|string'
        ]);

        list($type, $id) = explode('-', $request->kegiatan, 2);

        $foto = null;
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('agenda', 'public');
        }

        Agenda::create([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'foto' => $foto,
            'kegiatan_id' => $type === 'kegiatan' ? $id : null,
            'kemahasiswaan_id' => $type === 'kemahasiswaan' ? $id : null,
            'kegiatan_type' => $type,
        ]);

        return redirect()->route('agenda.index')->with('success', 'Data Agenda Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        $kegiatan = Kegiatan::all();
        $kemahasiswaan = Kemahasiswaan::where('sub_kategori', 'kegiatan')->get();
        return view('agenda.edit', compact('agenda', 'kegiatan', 'kemahasiswaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'kegiatan' => 'required|string'
        ]);

        list($type, $id) = explode('-', $request->kegiatan, 2);

        $foto = $agenda->foto;

         // Delete old photo if new photo is uploaded
         if($request->hasFile('foto')){
            // Delete old photo file if it exists
            if($agenda->foto && Storage::disk('public')->exists($agenda->foto)){
                Storage::disk('public')->delete($agenda->foto);
            }
            $foto = $request->file('foto')->store('agenda', 'public');
        }

        $agenda->update([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'foto' => $foto,
            'kegiatan_id' => $type === 'kegiatan' ? $id : null,
            'kemahasiswaan_id' => $type === 'kemahasiswaan' ? $id : null,
            'kegiatan_type' => $type,
        ]);

        return redirect()->route('agenda.index')->with('success', 'Data Agenda Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        if ($agenda->foto && Storage::disk('public')->exists($agenda->foto)) {
            Storage::disk('public')->delete($agenda->foto);
        }

        $agenda->delete();
        return redirect()->route('agenda.index')->with('success', 'Data Agenda berhasil dihapus');
    }
}
