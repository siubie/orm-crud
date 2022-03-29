@extends('layouts.app')

@section('content')
<a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-2">Input Mahasiswa</a>

<!-- alert -->
<div class="row mb-2">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
</div>

<table class="table table-striped table-hover">
  <thead>
    <th>No</th>
    <th>Nim</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($mahasiswa as $mhs)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $mhs->nim ?? '' }}</td>
        <td>{{ $mhs->nama ?? '' }}</td>
        <td>{{ $mhs->kelas ?? '' }}</td>
        <td>{{ $mhs->jurusan ?? '' }}</td>
        <td>
          <a href="{{ route('mahasiswa.show', $mhs->id_mahasiswa) }}" class="badge bg-primary text-decoration-none">Show</a>
          <a href="{{ route('mahasiswa.edit', $mhs->id_mahasiswa) }}" class="badge bg-warning text-decoration-none">Edit</a>
          <a href="#"
            class="badge bg-danger text-decoration-none"
            onclick="event.preventDefault(); document.getElementById('form-destroy-{{ $mhs->id_mahasiswa }}').submit()">Delete</a>
          <form action="{{ route('mahasiswa.destroy', $mhs->id_mahasiswa) }}" method="post" id="form-destroy-{{ $mhs->id_mahasiswa }}">
            @csrf
            @method('DELETE')
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <th>No</th>
    <th>Nim</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <th>Action</th>
  </tfoot>
</table>
@endsection