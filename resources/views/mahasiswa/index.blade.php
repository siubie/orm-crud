@extends('layouts.app')

@section('content')
<table class="table table-dark table-hover">
    <thead>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $mhs)
        <tr>
            <td>{{ $loop ->iteration }}</td>
            <td>{{ $mhs -> nim ?? '' }}</td>
            <td>{{ $mhs -> nama ?? '' }}</td>
            <td>{{ $mhs -> kelas ?? ''}}</td>
            <td>{{ $mhs -> jurusan ?? ''}}</td>
        </tr>
        @endforeach

  </table>
@endsection
