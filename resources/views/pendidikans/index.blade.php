@extends('layouts.app')

@section('title', 'pendidikans')

@section('content')
<a href="/pendidikans/create" class="card-link btn-primary">Tambah pendidikans</a>
@foreach ($pendidikans as $pendidikan)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/pendidikans/{{ $pendidikan['id'] }}" class="card-title">{{ $pendidikan['sekolah'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $pendidikan['ns'] }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">{{ $pendidikan['mulai_tahun'] }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">{{ $pendidikan['berakhir_tahun'] }}</h6>
    <a href="/pendidikans/{{$pendidikan['id']}}/edit" class="card-link btn-warning">Edit pendidikan</a>
    <form action="/pendidikans/{{ $pendidikan['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete pendidikan</a>
    </form>
  </div>
</div>

@endforeach
<div>
{{ $pendidikans->links()}} 
</div>
@endsection