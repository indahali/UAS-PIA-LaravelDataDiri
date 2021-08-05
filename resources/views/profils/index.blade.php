@extends('layouts.app')

@section('title', 'profils')

@section('content')
<a href="/profils/create" class="card-link btn-primary">Tambah transaksi</a>
@foreach ($profils as $profil)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/profils/{{ $profil['id'] }}" class="card-title">{{ $profil['namai'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $profil['jk'] }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">{{ $profil['ttl'] }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">{{ $profil['agama'] }}</h6>
    <p class="card-text">{{ $profil['alamat'] }}</p>

    <a href="/profils/{{$profil['id']}}/edit" class="card-link btn-warning">Edit Profil</a>
<form action="/profils/{{ $profil['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete Profil</a>
    </form>
  </div>
</div>

@endforeach

<div>
{{ $profils->links()}} 
</div>
@endsection