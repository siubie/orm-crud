<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $mahasiswa = $mahasiswa = DB::table('mahasiswa')->get();
        $post = Mahasiswa::when($request->nama, function($query, $nama){
            return $query->where('nama', 'like', '%'.$nama .'%');
        })-> orderBy('id_mahasiswa','desc')->paginate(3);
        return view('mahasiswa.index',compact('mahasiswa','post'))
        ->with('i',(request()->input('page',1)-1)*3);
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
    public function store(StoreMahasiswaRequest $request)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
        // $Mahasiswa = $mahasiswa;
        // $Mahasiswa = Mahasiswa::find($mahasiswa->id_mahasiswa);
        return view('mahasiswa.detail',compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
        $Mahasiswa = DB::table('mahasiswa')->where('id_mahasiswa',$mahasiswa->id_mahasiswa)->first();
        return view('mahasiswa.edit',compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Mahasiswa::find($mahasiswa->id_mahasiswa)->update($request->all());

        return redirect()->route('mahasiswa.index')
        ->with('success','Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
        Mahasiswa::find($mahasiswa->id_mahasiswa)->delete();
        return redirect()->route('mahasiswa.index')
        ->with('success','Mahasiswa Berhasil Dihapus');
    }
}
