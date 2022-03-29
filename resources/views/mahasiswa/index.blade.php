@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-4">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        <div class=" mt-4 mb-2">
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
        </div>
    </div>
    <div class="col-lg-10">
        <form class="form-inline mt-4 mb-2 " action="" method="get">
            <input class="form-control" type="text" placeholder="Nama" name="nama" aria-label="nama" style="width: 92%">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered text-center">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($post as $mhs)
    <tr >

        <td>{{ $mhs ->nim }}</td>
        <td>{{ $mhs ->nama }}</td>
        <td>{{ $mhs ->kelas }}</td>
        <td>{{ $mhs ->jurusan }}</td>

        <td>
        <form action="{{ route('mahasiswa.destroy',$mhs->id_mahasiswa) }}" method="POST">

            <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->id_mahasiswa) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->id_mahasiswa) }}">Edit</a>
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
{{$post->links()}}
@endsection
