@extends('layouts.app')

@section('content')
<table class="table">
  <tbody>
    <tr>
      <th>Nim</th>
      <th>:</th>
      <td>{{ $mahasiswa->nim }}</td>
    </tr>
    <tr>
      <th>Nama</th>
      <th>:</th>
      <td>{{ $mahasiswa->nama }}</td>
    </tr>
    <tr>
      <th>Kelas</th>
      <th>:</th>
      <td>{{ $mahasiswa->kelas }}</td>
    </tr>
    <tr>
      <th>Jurusan</th>
      <th>:</th>
      <td>{{ $mahasiswa->jurusan }}</td>
    </tr>
  </tbody>
</table>
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
@endsection