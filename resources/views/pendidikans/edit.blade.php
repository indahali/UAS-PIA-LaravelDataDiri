@extends('layouts.app')

@section('title', 'pendidikans')

@section('content')

<form action="/pendidikans/{{ $pendidikan['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Sekolah</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="sekolah" aria-describedby="emailHelp" value="{{ old('sekolah') ? old('sekolah') : $pendidikan['sekolah'] }}">
    @error('sekolah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">ns</label>
    <input type="text" class="form-control" name="ns" id="exampleInputPassword1" value="{{ old('ns') ? old('ns') : $pendidikan['ns'] }}">
    @error('ns')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mulai Tahun</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="mulai_tahun" aria-describedby="emailHelp" value="{{ old('mulai_tahun') ? old('mulai_tahun') : $pendidikan['mulai_tahun'] }}">
    @error('mulai_tahun')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Berakhir Tahun</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="berakhir_tahun" aria-describedby="emailHelp" value="{{ old('berakhir_tahun') ? old('berakhir_tahun') : $pendidikan['berakhir_tahun'] }}">
    @error('berakhir_tahun')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection