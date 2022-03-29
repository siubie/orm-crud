<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            "nim" => '2041720128',
            "nama" => 'Maulana Ghofurur Rohim',
            "kelas" => 'TI-2D',
            "jurusan" => 'Teknologi Informasi',
        ]);
    }
}
