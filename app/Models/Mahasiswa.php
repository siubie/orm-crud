<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "Mahasiswa";
    protected $primaryKey = "id_mahasiswa";

    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'jurusan',
        // 'email',
        // 'alamat',
        // 'tanggal_lahir'
    ];
}
