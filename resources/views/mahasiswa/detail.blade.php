@extends('mahasiswa.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem">
                <div class="card-header">
                    Detail Mahasiswa
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nim : {{ $mahasiswa->nim }}</li>
                        <li class="list-group-item">Nama : {{ $mahasiswa->nama }}</li>
                        <li class="list-group-item">Kelas : {{ $mahasiswa->kelas }}</li>
                        <li class="list-group-item">Jurusan : {{ $mahasiswa->jurusan }}</li>
                    </ul>
                </div>
                <a class="btn btn-success mt-3" href="{{ route('mahasiswa.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection
