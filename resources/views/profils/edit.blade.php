@extends('layouts.app')

@section('title', 'profils')

@section('content')

<form action="/profils/{{ $profil['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') ? old('nama') : $profil['nama'] }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Jenis Kelamin</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jk" aria-describedby="emailHelp" value="{{ old('jk') ? old('jk') : $profil['jk'] }}">
    @error('jk')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
    <input type="text" class="form-control" name="ttl" id="emailHelp" value="{{ old('ttl') ? old('ttl') : $profil['ttl'] }}">
    @error('ttl')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Agama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="agama" aria-describedby="emailHelp" value="{{ old('agama') ? old('agama') : $profil['agama'] }}">
    @error('agama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') ? old('alamat') : $profil['alamat'] }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection