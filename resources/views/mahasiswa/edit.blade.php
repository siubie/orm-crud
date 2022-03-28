@extends('layouts.app')

@section('content')
<form action="{{ route('mahasiswa.update', $mahasiswa->id_mahasiswa) }}" method="post">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="number" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}">
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}">
  </div>
  <div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $mahasiswa->kelas }}">
  </div>
  <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection