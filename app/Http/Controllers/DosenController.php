<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{


    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:tbl_dosen,nidn',
            'nama' => 'required',
            'email' => 'required|unique:tbl_dosen,email',
            'jurusan' => 'required',
            'jabatan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_google_scholar' => 'nullable|url',
            'link_sinta' => 'nullable|url',
            'link_scopus' => 'nullable|url',
            'link_penelitian' => 'nullable|array',
            'link_penelitian.*' => 'nullable|url'

        ]);

        $foto = null;
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('dosen', 'public');
        }
        
        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'foto' => $foto,
            'link_google_scholar' => $request->link_google_scholar,
            'link_sinta' => $request->link_sinta,
            'link_scopus' => $request->link_scopus,
            'link_penelitian' => $request->link_penelitian,
        ]);
        return redirect()->route('dosen.index')->with('success','Data Dosen Berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nidn' => 'required|unique:tbl_dosen,nidn,' . $dosen->id . ',id',
            'nama' => 'required',
            'email' => 'required|unique:tbl_dosen,email,' . $dosen->id . ',id',
            'jurusan' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_google_scholar' => 'nullable|url',
            'link_sinta' => 'nullable|url',
            'link_scopus' => 'nullable|url',
            'link_penelitian' => 'nullable|array',
            'link_penelitian.*' => 'nullable|url'
        ]);

        $foto = $dosen->foto;

        // Delete old photo if new photo is uploaded
        if($request->hasFile('foto')){
            // Delete old photo file if it exists
            if($dosen->foto && Storage::disk('public')->exists($dosen->foto)){
                Storage::disk('public')->delete($dosen->foto);
            }
            $foto = $request->file('foto')->store('dosen', 'public');
        }

        $dosen->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'jabatan' => $request->jabatan,
            'foto' => $foto,
            'link_google_scholar' => $request->link_google_scholar,
            'link_sinta' => $request->link_sinta,
            'link_scopus' => $request->link_scopus,
            'link_penelitian' => $request->link_penelitian,
        ]);

        return redirect()->route('dosen.index')->with('success','Data Dosen Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)){
            Storage::disk('public')->delete($dosen->foto);
        }

        // bila coding diataas tidak jalan gunakan yang dibawah

        // if($dosen->foto && file_exists(storage_path('app/public/'. $dosen->foto))) {
        //     unlink(storage_path('app/public/' . $dosen->foto));
        // }
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
