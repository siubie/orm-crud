@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
  <thead class="text-capitalize">
    <th>no</th>
    <th>nim</th>
    <th>nama</th>
    <th>kelas</th>
    <th>jurusan</th>
  </thead>
  <tbody>
    @foreach($mahasiswa as $mhs)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $mhs->nim ?? '' }}</td>
        <td>{{ $mhs->nama ?? '' }}</td>
        <td>{{ $mhs->kelas ?? '' }}</td>
        <td>{{ $mhs->jurusan ?? '' }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection