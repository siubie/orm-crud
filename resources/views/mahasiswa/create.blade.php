@extends('mahasiswa.layout')
@section('content')
<div class="container mt-5">
<div class="row justify-content-center align-items-center">
<div class="card" style="width: 24rem;">
<div class="card-header">Tambah Mahasiswa
</div>
<div class="card-body">
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
@csrf
<div class="form-group">
<label for="Nim">Nim</label>
<input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim" >
</div>
<div class="form-group">
<label for="Nama">Nama</label>
<input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" >
</div>
<div class="form-group">
<label for="Kelas">Kelas</label>
<input type="text" name="kelas" class="form-control" id="kelas" aria-describedby="kelas" >
</div>
<div class="form-group">
<label for="Jurusan">Jurusan</label>
<input type="text" name="jurusan" class="form-control" id="jurusan" aria-describedby="jurusan" >
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection
