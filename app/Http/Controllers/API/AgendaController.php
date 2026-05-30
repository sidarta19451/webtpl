<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;


class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil semua data agenda
    $agenda = Agenda::all()->map(function ($item) {
        // Tambahkan URL foto jika ada
        $item->foto_url = $item->foto ? url('storage/' . $item->foto) : null;

        // Pastikan atribut kegiatan_display tersedia
        $item->kegiatan_display = $item->kegiatan ?? 'Kegiatan tidak tersedia';

        // Pastikan atribut lain juga tersedia
        $item->kegiatan_display = $item->kegiatan ?? 'Nama kegiatan tidak tersedia';
        $item->deskripsi = $item->deskripsi ?? 'Deskripsi tidak tersedia';

        return $item;
    });

    // Kembalikan data agenda sebagai JSON
    return response()->json($agenda);
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
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
