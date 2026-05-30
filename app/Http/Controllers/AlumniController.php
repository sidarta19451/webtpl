<?php

namespace App\Http\Controllers;

use App\Models\Alumni; // Import model Alumni untuk mengelola data alumni
use Illuminate\Http\Request; // Import Request untuk menangani input dari form
use Illuminate\Support\Facades\Storage; // Import Storage untuk mengelola file upload

/**
 * Controller untuk mengelola data Alumni Teknik Perangkat Lunak
 * Menu Alumni ini mencakup fitur:
 * - Kisah Sukses: Cerita inspiratif dari alumni yang telah sukses
 * - Tracer Studi: Pelacakan karir alumni setelah lulus, termasuk status pekerjaan, perusahaan, jabatan, dll.
 * Tampilan menu ini mirip dengan menu Dosen, dengan tabel data, form CRUD, dan detail alumni
 * Database tambahan: tbl_alumni (selain tbl_dosen, tbl_mahasiswa, dll.)
 */
class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan daftar semua alumni Teknik Perangkat Lunak
     * Menggunakan pagination untuk efisiensi tampilan data
     * Data alumni diambil dari tabel mahasiswa yang sudah lulus
     * Fitur ini memungkinkan admin melihat semua alumni dengan informasi tracer studi
     */
    public function index()
    {
        // Mengambil semua data alumni dengan pagination 10 data per halaman
        // Menggunakan scope TeknikPerangkatLunak untuk memfilter jurusan
        $alumni = Alumni::TeknikPerangkatLunak()->paginate(10);

        // Mengembalikan view index dengan data alumni
        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk menambah data alumni baru
     * Data mahasiswa akan ditampilkan untuk dipilih sebagai alumni
     */
    public function create()
    {
        // Mengambil data mahasiswa Teknik Perangkat Lunak yang sudah lulus dan belum menjadi alumni
        // untuk dipilih sebagai data dasar alumni
        $mahasiswa = \App\Models\Mahasiswa::where('jurusan', 'Teknik Perangkat Lunak')
            ->where('status', 'lulus')
            ->whereNotIn('nim', \App\Models\Alumni::pluck('nim'))
            ->get();

        // Mengembalikan view form create alumni dengan data mahasiswa
        return view('alumni.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data alumni baru ke database
     * Data diambil dari mahasiswa yang dipilih, ditambah dengan data tracer studi
     * Termasuk validasi input dan upload foto jika ada
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'mahasiswa_id' => 'required|exists:tbl_mahasiswa,id', // ID mahasiswa harus ada
            'tahun_lulus' => 'required|integer|min:2000|max:' . (date('Y') + 1), // Tahun lulus valid
            'kisah_sukses' => 'nullable|string', // Kisah sukses opsional
            'status_pekerjaan' => 'nullable|string|max:50', // Status pekerjaan opsional
            'nama_perusahaan' => 'nullable|string|max:100', // Nama perusahaan opsional
            'jabatan' => 'nullable|string|max:50', // Jabatan opsional
            'lokasi_kerja' => 'nullable|string|max:100', // Lokasi kerja opsional
            'gaji' => 'nullable|numeric|min:0', // Gaji opsional, harus angka positif
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048' // Foto opsional, max 2MB
        ]);

        // Ambil data mahasiswa berdasarkan ID yang dipilih
        $mahasiswa = \App\Models\Mahasiswa::findOrFail($request->mahasiswa_id);

        // Pastikan mahasiswa belum menjadi alumni
        if (Alumni::where('nim', $mahasiswa->nim)->exists()) {
            return redirect()->back()->withErrors(['mahasiswa_id' => 'Mahasiswa ini sudah terdaftar sebagai alumni.']);
        }

        // Inisialisasi variabel foto
        $foto = null;

        // Jika ada file foto yang diupload
        if ($request->hasFile('foto')) {
            // Simpan foto ke storage/app/public/alumni dengan nama unik
            $foto = $request->file('foto')->store('alumni', 'public');
        }

        // Simpan data alumni ke database dengan data dari mahasiswa
        Alumni::create([
            'nim' => $mahasiswa->nim,
            'nama' => $mahasiswa->nama,
            'email' => $mahasiswa->email,
            'tahun_lulus' => $request->tahun_lulus,
            'jurusan' => $mahasiswa->jurusan,
            'kisah_sukses' => $request->kisah_sukses,
            'status_pekerjaan' => $request->status_pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'jabatan' => $request->jabatan,
            'lokasi_kerja' => $request->lokasi_kerja,
            'gaji' => $request->gaji,
            'foto' => $foto,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('alumni.index')->with('success', 'Data Alumni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     * Menampilkan detail lengkap dari satu alumni
     * Termasuk kisah sukses dan data tracer studi
     */
    public function show(Alumni $alumni)
    {
        // Mengembalikan view detail alumni dengan data spesifik
        return view('alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form edit untuk mengubah data alumni
     */
    public function edit(Alumni $alumni)
    {
        // Mengembalikan view form edit dengan data alumni yang akan diubah
        return view('alumni.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data alumni yang sudah ada
     * Data NIM, Nama, Email, Jurusan tidak dapat diubah karena berasal dari data mahasiswa
     * Hanya data tracer studi yang dapat diperbarui
     */
    public function update(Request $request, Alumni $alumni)
    {
        // Validasi input - hanya untuk data tracer studi yang dapat diubah
        $request->validate([
            'tahun_lulus' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'kisah_sukses' => 'nullable|string',
            'status_pekerjaan' => 'nullable|string|max:50',
            'nama_perusahaan' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:50',
            'lokasi_kerja' => 'nullable|string|max:100',
            'gaji' => 'nullable|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil foto lama sebagai default
        $foto = $alumni->foto;

        // Jika ada foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }
            // Upload foto baru
            $foto = $request->file('foto')->store('alumni', 'public');
        }

        // Update data alumni di database - hanya field yang dapat diubah
        $alumni->update([
            'tahun_lulus' => $request->tahun_lulus,
            'kisah_sukses' => $request->kisah_sukses,
            'status_pekerjaan' => $request->status_pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'jabatan' => $request->jabatan,
            'lokasi_kerja' => $request->lokasi_kerja,
            'gaji' => $request->gaji,
            'foto' => $foto,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('alumni.index')->with('success', 'Data Alumni berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data alumni dari database
     * Termasuk penghapusan file foto terkait
     */
    public function destroy(Alumni $alumni)
    {
        // Hapus foto dari storage jika ada
        if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
            Storage::disk('public')->delete($alumni->foto);
        }

        // Hapus data alumni dari database
        $alumni->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('alumni.index')->with('success', 'Data Alumni berhasil dihapus');
    }
}
