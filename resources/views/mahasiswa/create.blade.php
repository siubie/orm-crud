@extends('layouts.app')

@section('content')
<h5>Tambah Mahasiswa</h5>
<form action="{{ route('mahasiswa.store') }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="nim" class="form-label">Nim</label>
    <input type="number" class="form-control" id="nim" name="nim">
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama">
  </div>
  <div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <input type="text" class="form-control" id="kelas" name="kelas">
  </div>
  <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <input type="text" class="form-control" id="jurusan" name="jurusan">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection