<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Support\Facades\DB;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
 $mahasiswa = $mahasiswa = DB::table('mahasiswa')->get(); // Mengambil semua isi tabel
 $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);
 return view('mahasiswa.index', compact('mahasiswa'));
 with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('mahasiswa.create');
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $mahasiswa = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        $store =  Mahasiswa::create($mahasiswa);
        

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
         
        $Mahasiswa = Mahasiswa::where('nim',$Nim)->first(); 
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::where('nim',$Nim)->first(); 
        return view('mahasiswa.edit', compact('Mahasiswa'));
    }
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $validasi = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
       
        Mahasiswa::where('nim',$Nim)->update($validasi);


        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy( $Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::where('nim',$Nim)->delete();
        return redirect()->route('mahasiswa.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
};