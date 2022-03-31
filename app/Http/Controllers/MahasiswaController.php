<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
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
 $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(3);
 return view('mahasiswa.index', compact('posts'))
 ->with('i', (request()->input('page', 1) - 1) * 5);
 }
 public function create()
 {
 return view('mahasiswa.create');
 }
 public function store(Request $request)
 {

 //melakukan validasi data
 $request->validate([
 'nim' => 'required',
 'nama' => 'required',
 'kelas' => 'required',
 'jurusan' => 'required',
 'e_mail'=>'required',
 'alamat'=>'required',
 'tanggal_lahir'=>'required',
 ]);

 //fungsi eloquent untuk menambah data
 Mahasiswa::create($request->all());

//jika data berhasil ditambahkan, akan kembali ke halaman utama
 return redirect()->route('mahasiswa.index')
 ->with('success', 'Mahasiswa Berhasil Ditambahkan');
 }
 public function show(Mahasiswa $mahasiswa)
 {

 //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
//  $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();
$Mahasiswa = $mahasiswa;
 return view('mahasiswa.detail', compact('Mahasiswa'));
 }
 public function edit(Mahasiswa $mahasiswa)
 {

//menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
//  $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();
$Mahasiswa = $mahasiswa;
 return view('mahasiswa.edit', compact('Mahasiswa'));
 }
 public function update(Request $request, $Nim)
 {

//melakukan validasi data
 $request->validate([
 'nim' => 'required',
 'nama' => 'required',
 'kelas' => 'required',
 'jurusan' => 'required',
 'e_mail'=>'required',
 'alamat'=>'required',
 'tanggal_lahir'=>'required',
 ]);

//fungsi eloquent untuk mengupdate data inputan kita
Mahasiswa::where('nim',$Nim)->update();

//jika data berhasil diupdate, akan kembali ke halaman utama
 return redirect()->route('mahasiswa.index')
 ->with('success', 'Mahasiswa Berhasil Diupdate');
 }
 public function destroy( $Nim)
 {

//fungsi eloquent untuk menghapus data
$Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();
 return redirect()->route('mahasiswa.index')
 -> with('success', 'Mahasiswa Berhasil Dihapus');
 }
};
