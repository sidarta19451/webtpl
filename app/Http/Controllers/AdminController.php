<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        return view('admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'bagian' => 'required|string|max:50',
            'email' => 'required|email|unique:tbl_admin,email',
            'no_tlp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('admin', 'public');
        }

        Admin::create([
            'nama' => $request->nama,
            'bagian' => $request->bagian,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'foto' => $foto
        ]);

        return redirect()->route('admin.index')->with('success', 'Data Admin Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'bagian' => 'required|string|max:50',
            'email' => 'required|email|unique:tbl_admin,email,' . $admin->id . ',id',
            'no_tlp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = $admin->foto;

        if ($request->hasFile('foto')) {
            if ($admin->foto && Storage::disk('public')->exists($admin->foto)) {
                Storage::disk('public')->delete($admin->foto);
            }
            $foto = $request->file('foto')->store('admin', 'public');
        }

        $admin->update([
            'nama' => $request->nama,
            'bagian' => $request->bagian,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'foto' => $foto
        ]);
        
        return redirect()->route('admin.index')->with('success', 'Data Admin Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if ($admin->foto && Storage::disk('public')->exists($admin->foto)) {
            Storage::disk('public')->delete($admin->foto);
        }

        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Data admin berhasil dihapus');
    }
}
