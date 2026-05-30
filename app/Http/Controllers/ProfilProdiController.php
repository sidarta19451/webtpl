<?php

namespace App\Http\Controllers;

use App\Models\Profil_prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilProdiController extends Controller
{
    public function index()
    {
        $profil_prodi = Profil_prodi::all();
        return view('ProfilProdi.index', compact('profil_prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ProfilProdi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|unique:tbl_profil_prodi,nama_prodi',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'deskripsi' => 'nullable',
            'akreditasi' => 'nullable',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kontak_email' => 'nullable|email',
            'kontak_telepon' => 'nullable',
            'alamat' => 'nullable'
        ]);

        $logo = null;
        if($request->hasFile('logo')){
            $logo = $request->file('logo')->store('profil_prodi', 'public');
        }
        Profil_prodi::create([
            'nama_prodi' => $request->nama_prodi,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'deskripsi' => $request->deskripsi,
            'akreditasi' => $request->akreditasi,
            'logo' => $logo,
            'kontak_email' => $request->kontak_email,
            'kontak_telepon' => $request->kontak_telepon,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('profil_prodi.index')->with('success','Data Profil Prodi Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil_prodi $profil_prodi)
    {
        return view('ProfilProdi.show', compact('profil_prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil_prodi $profil_prodi)
    {
        return view('ProfilProdi.edit', compact('profil_prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil_prodi $profil_prodi)
    {
        $request->validate([
            'nama_prodi' => 'required|unique:tbl_profil_prodi,nama_prodi,' . $profil_prodi->id . ',id',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'deskripsi' => 'nullable',
            'akreditasi' => 'nullable',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kontak_email' => 'nullable|email',
            'kontak_telepon' => 'nullable',
            'alamat' => 'nullable'
        ]);

        $logo = $profil_prodi->logo;

        // Delete old logo if new logo is uploaded
        if($request->hasFile('logo')){
            // Delete old logo file if it exists
            if($profil_prodi->logo && Storage::disk('public')->exists($profil_prodi->logo)){
                Storage::disk('public')->delete($profil_prodi->logo);
            }
            $logo = $request->file('logo')->store('profil_prodi', 'public');
        }

        $profil_prodi->update([
            'nama_prodi' => $request->nama_prodi,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'deskripsi' => $request->deskripsi,
            'akreditasi' => $request->akreditasi,
            'logo' => $logo,
            'kontak_email' => $request->kontak_email,
            'kontak_telepon' => $request->kontak_telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('profil_prodi.index')->with('success','Data Profil Prodi Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil_prodi $profil_prodi)
    {
        if ($profil_prodi->logo && Storage::disk('public')->exists($profil_prodi->logo)){
            Storage::disk('public')->delete($profil_prodi->logo);
        }

        $profil_prodi->delete();
        return redirect()->route('profil_prodi.index')->with('success', 'Data Profil Prodi berhasil dihapus');
    }
}
