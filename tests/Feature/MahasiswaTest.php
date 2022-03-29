<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_bisa_lihat_halaman_daftar_mahasiswa()
    {
        //seed db
        $this->seed();
        $response = $this->get("/mahasiswa");
        $response->assertStatus(200);
        $response->assertSeeText("Nim");
        $response->assertSeeText("Nama");
        $response->assertSeeText("Kelas");
        $response->assertSeeText("Jurusan");
        $response->assertSeeText("Input Mahasiswa");
    }

    public function test_halaman_daftar_mahasiswa_kosong()
    {
        $this->seed();
        $response = $this->get("/mahasiswa");
        $response->assertStatus(200);
        $response->assertDontSeeText("Show");
        $response->assertDontSeeText("Edit");
        $response->assertDontSeeText("Delete");
    }

    public function test_halaman_daftar_mahasiswa_satu_data()
    {
        $this->seed();
        $mahasiswa = Mahasiswa::create([
            'nim' => '1234567',
            'nama' => 'alexander the what ?',
            'kelas' => 'teutonic',
            'jurusan' => 'gamers',
        ]);
        $response = $this->get("/mahasiswa");
        $response->assertStatus(200);
        $response->assertSeeText("Show");
        $response->assertSeeText("Edit");
        $response->assertSeeText("Delete");
    }

    public function test_user_bisa_buka_halaman_tambah_mahasiswa()
    {
        $this->seed();
        $response = $this->get("/mahasiswa/create");
        $response->assertStatus(200);
        $response->assertSeeText("Tambah Mahasiswa");
        $response->assertSeeText("Nim");
        $response->assertSeeText("Nama");
        $response->assertSeeText("Kelas");
        $response->assertSeeText("Jurusan");
    }

    public function test_user_bisa_tambah_mahasiswa()
    {
        $this->seed();
        $response = $this->get("/mahasiswa/create");
        $response->assertStatus(200);
        $response->assertSeeText("Tambah Mahasiswa");
        $response->assertSeeText("Nim");
        $response->assertSeeText("Nama");
        $response->assertSeeText("Kelas");
        $response->assertSeeText("Jurusan");
        $response = $this->post('mahasiswa', [
            'nim' => '1234567',
            'nama' => 'alexander the what ?',
            'kelas' => 'teutonic',
            'jurusan' => 'gamers',
        ]);
        $response->assertRedirect('/mahasiswa');
        $response = $this->get('/mahasiswa');
        $response->assertSeeText('1234567');
        $response->assertSeeText('alexander the what ?');
        $response->assertSeeText('teutonic');
        $response->assertSeeText('gamers');
    }

    public function test_user_bisa_buka_halaman_edit_mahasiswa()
    {
        $this->seed();
        $mahasiswa = Mahasiswa::create([
            'nim' => '1234567',
            'nama' => 'alexander the what ?',
            'kelas' => 'teutonic',
            'jurusan' => 'gamers',
        ]);
        $response = $this->get("/mahasiswa/{$mahasiswa->id_mahasiswa}/edit");
        $response->assertStatus(200);
    }

    public function test_user_bisa_buka_halaman_detail_mahasiswa()
    {
        $this->seed();
        $mahasiswa = Mahasiswa::create([
            'nim' => '1234567',
            'nama' => 'alexander the what ?',
            'kelas' => 'teutonic',
            'jurusan' => 'gamers',
        ]);
        $response = $this->get("/mahasiswa/{$mahasiswa->id_mahasiswa}");
        $response->assertStatus(200);
    }
}
