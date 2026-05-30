<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index',compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:tbl_mahasiswa,nim',
            'nama' => 'required',
            'email' => 'required|unique:tbl_mahasiswa,email',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'status' => 'required|in:belum,lulus',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $foto = null;
            if($request->hasFile('foto')){
                $foto = $request->file('foto')->store('mahasiswa', 'public');
            }

            Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'email' => $request->email,
                'jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
                'status' => $request->status,
                'foto' => $foto
            ]);
            return redirect()->route('mahasiswa.index')->with('success','Data Mahasiswa Berhasil ditambahkan');


    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:tbl_mahasiswa,nim,'. $mahasiswa->id . ',id',
            'nama' => 'required',
            'email' => 'required|unique:tbl_mahasiswa,email,'. $mahasiswa->id . ',id',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'status' => 'required|in:belum,lulus',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = $mahasiswa->foto;
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('mahasiswa', 'public');
        }

       $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'status' => $request->status,
            'foto' => $foto,
        ]);
        return redirect()->route('mahasiswa.index')->with('success','Data Mahasiswa Berhasil diperbarui');
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Mahasiswa $mahasiswa)
    {
        $mahasiswa->status = $mahasiswa->status === 'lulus' ? 'belum' : 'lulus';
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')->with('success', 'Status mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto && Storage::disk('public')->exists($mahasiswa->foto)){
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        // bila coding diataas tidak jalan gunakan yang dibawah

        // if($dosen->foto && file_exists(storage_path('app/public/'. $dosen->foto))) {
        //     unlink(storage_path('app/public/' . $dosen->foto));
        // }
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
