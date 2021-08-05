@extends('layouts.app')

@section('title', 'pengalamans')

@section('content')

<form action="/pengalamans/{{ $pengalaman['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Type</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="type" aria-describedby="emailHelp" value="{{ old('type') ? old('type') : $pengalaman['type'] }}">
    @error('type')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Keterangan</label>
    <input type="text" class="form-control" name="keterangan" id="emailHelp" value="{{ old('keterangan') ? old('keterangan') : $pengalaman['keterangan'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection