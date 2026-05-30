<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kemahasiswaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KemahasiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kemahasiswaan = Kemahasiswaan::all()->map(function($asset) {
            $asset->file_url = $asset->file_path ? asset('storage/' . $asset->file_path) : null;
            return $asset;
            });
            return response()->json($kemahasiswaan);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
