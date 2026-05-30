<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('Project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'nullable|unique:tbl_project,nim',
            'nidn' => 'nullable|unique:tbl_project,nidn',
            'jurusan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal' => 'required|date',
            'link' => 'nullable|url',
        ]);

        $foto = null;
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('project', 'public');
        }
        Project::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'nidn' => $request->nidn,
            'jurusan' => $request->jurusan,
            'foto' => $foto,
            'tanggal' => $request->tanggal,
            'link' => $request->link,
        ]);
        return redirect()->route('project.index')->with('success','Data Project Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('Project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('Project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'nullable|unique:tbl_project,nim,' . $project->id . ',id',
            'nidn' => 'nullable|unique:tbl_project,nidn,' . $project->id . ',id',
            'jurusan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal' => 'required|date',
            'link' => 'nullable|url'
        ]);

        $foto = $project->foto;

        // Delete old photo if new photo is uploaded
        if($request->hasFile('foto')){
            // Delete old photo file if it exists
            if($project->foto && Storage::disk('public')->exists($project->foto)){
                Storage::disk('public')->delete($project->foto);
            }
            $foto = $request->file('foto')->store('project', 'public');
        }

        $project->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'nidn' => $request->nidn,
            'jurusan' => $request->jurusan,
            'foto' => $foto,
            'tanggal' => $request->tanggal,
            'link' => $request->link,
        ]);

        return redirect()->route('project.index')->with('success','Data Project Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->foto && Storage::disk('public')->exists($project->foto)){
            Storage::disk('public')->delete($project->foto);
        }

        $project->delete();
        return redirect()->route('project.index')->with('success', 'Data project berhasil dihapus');
    }
}
