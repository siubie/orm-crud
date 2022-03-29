<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Http\Concerns\InteractsWithInput;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $mahasiswa = Mahasiswa::orderBy('id_mahasiswa', 'desc')->paginate(3);
        // return view('mahasiswa.index', compact('mahasiswa'));
        $mahasiswa = $mahasiswa = DB::table('mahasiswa')->get();//Mengambil semua isi tabel
        $posts = Mahasiswa::orderBy('nim','desc')->paginate(6);
        return view('mahasiswa.index', compact('mahasiswa'))->
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' =>'required',
            'nama' =>'required',
            'kelas' =>'required',
            'jurusan' =>'required',
        ]);
        //fungsi eloquent untuk menambah data
        //$mahasiswa = Mahasiswa::create($request->all());
        Mahasiswa::create($request->all());
        //$mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success','Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Mahasiswa
        $Mahasiswa = Mahasiswa::find($nim);
        //$Mahasiswa=$mahasiswa;
        return view('mahasiswa.detail',compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan nama Mahasiswa untuk diedit
        $Mahasiswa = DB::table('mahasiswa')->where('nim',$nim)->first();;
       // $Mahasiswa=$mahasiswa;
        return view('mahasiswa.edit',compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::find($nim)->update($request->all());
        //Mahasiswa::where('nim','$nim')->update();
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success','Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        //Mahasiswa::find($nim)->delete();
        $Mahasiswa=DB::table('mahasiswa')->where('nim',$nim)->first();
        return redirect()->route('mahasiswa.index')
        ->with('success','Mahasiswa Berhasil Dihapus');
    }
}
