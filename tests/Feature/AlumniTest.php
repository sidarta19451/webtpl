<?php

namespace Tests\Feature;

use App\Models\Alumni;
use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlumniTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can see alumni items.
     */
    public function testUserCanSeeItems(): void
    {
        // Create test data
        $mahasiswa = Mahasiswa::create([
            'nim' => '123456789',
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'jurusan' => 'Teknik Perangkat Lunak',
        ]);

        $alumni = Alumni::create([
            'nim' => $mahasiswa->nim,
            'nama' => $mahasiswa->nama,
            'email' => $mahasiswa->email,
            'tahun_lulus' => 2023,
            'jurusan' => $mahasiswa->jurusan,
            'status_pekerjaan' => 'Bekerja',
            'nama_perusahaan' => 'PT Example',
            'jabatan' => 'Software Developer',
        ]);

        // Test the response
        $response = $this->get('/alumni');

        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertSee('2023');
        $response->assertSee('Bekerja');
        $response->assertSee('PT Example');
        $response->assertSee('Software Developer');
    }
}
