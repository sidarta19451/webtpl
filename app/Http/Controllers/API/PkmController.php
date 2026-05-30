<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pkm;
use Illuminate\Http\Request;

class PkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pkm
        $pkm = Pkm::all()->map(function ($item) {

            // $item->judul = $item->judul ?? 'Judul tidak tersedia';
            // Tambahkan URL foto jika ada
            $item->nama_ketua = $item->nama_ketua_formatted ?? 'Nama ketua tidak tersedia';
    
            // Pastikan atribut kegiatan_display tersedia
            $item->anggota = $item->anggota_formatted ?? 'Anggota tidak tersedia';
    
            // Pastikan atribut lain juga tersedia
            // $item->sumber_dana = $item->sumber_dana ?? 'Sumber dana tidak tersedia';
            // $item->biaya = $item->biaya ?? 0;
            // $item->luaran_utama = $item->luaran_utama ?? 'Luaran utama tidak tersedia';
    
            return $item;
            
        });
            return response()->json($pkm);
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
    public function show(Pkm $pkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pkm $pkm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   
}
