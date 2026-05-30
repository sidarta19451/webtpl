<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Ambil semua data penelitian
        $penelitian = Penelitian::all()->map(function ($item) {

        // $item->judul = $item->judul ?? 'Judul tidak tersedia';
        // Tambahkan URL foto jika ada
        $item->nama_ketua_formatted = $item->nama_ketua ?? 'Nama ketua tidak tersedia';

        // Pastikan atribut kegiatan_display tersedia
        $item->anggota_formatted = $item->nama_anggota ?? 'Anggota tidak tersedia';

        // Pastikan atribut lain juga tersedia
        $item->anggota_formatted = $item->nama_anggota ?? 'Anggota tidak tersedia';
        // $item->sumber_dana = $item->sumber_dana ?? 'Sumber dana tidak tersedia';
        // $item->biaya = $item->biaya ?? 0;
        // $item->luaran_utama = $item->luaran_utama ?? 'Luaran utama tidak tersedia';

        return $item;
        
    });
        return response()->json($penelitian);
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
    public function show(Penelitian $penelitian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penelitian $penelitian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
