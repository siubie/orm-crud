@extends('layouts.app')

@section('content')
<a href="{{route('mahasiswa.create')}}" class="btn btn-primary mb-2">Input Mahasiswa</a>
<table class="table table-dark table-hover">
    <thead>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $mhs)
        <tr>
            <td>{{ $loop ->iteration }}</td>
            <td>{{ $mhs -> nim ?? '' }}</td>
            <td>{{ $mhs -> nama ?? '' }}</td>
            <td>{{ $mhs -> kelas ?? ''}}</td>
            <td>{{ $mhs -> jurusan ?? ''}}</td>
            <td>
                <a href="#" class="badge bg-primary"></a>
            </td>
        </tr>
        @endforeach

  </table>
@endsection
