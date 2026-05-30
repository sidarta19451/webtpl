<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profil_prodi;
use Illuminate\Http\Request;


class ProfilProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil_prodi = Profil_prodi::all()->map(function($item) {
        $item->logo_url = $item->logo ? url('storage/' . $item->logo) : null;
        return $item;
        });
        return response()->json($profil_prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil_prodi $profil_prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil_prodi $profil_prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil_prodi $profil_prodi)
    {
        //
    }
}
