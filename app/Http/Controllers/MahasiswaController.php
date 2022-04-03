<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

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
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->paginate(3);
        return view('mahasiswa.index', compact('mahasiswa'))
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
            'email'     => 'required',
            'alamat'    => 'required',
            'tgl_lahir' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->
        with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($mahasiswa)
    {
        $Mahasiswa = Mahasiswa::where('nim',$mahasiswa)->first();
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $mahasiswa = DB::table('mahasiswa')->where('nama', 'like', '%'.$search.'%')->paginate(3);
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($mahasiswa)
    {
        $Mahasiswa = Mahasiswa::where('nim', $mahasiswa)->first();
        return view('mahasiswa.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        $request->validate([
            'nim'       => 'required',
            'nama'      => 'required',
            'kelas'     => 'required',
            'jurusan'   => 'required',
            'email'     => 'required',
            'alamat'    => 'required',
            'tgl_lahir' => 'required',
        ]);

        Mahasiswa::where('nim', $Nim)->update($request->validate([
            'nim'       => 'required',
            'nama'      => 'required',
            'kelas'     => 'required',
            'jurusan'   => 'required',
            'email'     => 'required',
            'alamat'    => 'required',
            'tgl_lahir' => 'required',
        ]));

        return redirect()->route('mahasiswa.index')->
        with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        $Mahasiswa = Mahasiswa::where('nim', $Nim)->first()->delete();
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
};
