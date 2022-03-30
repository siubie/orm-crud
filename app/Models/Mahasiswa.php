<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //Model Eloquent

class Mahasiswa extends Model//definisi model
{
    use HasFactory;
    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'id_mahasiswa'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'jurusan',
    ];
}
