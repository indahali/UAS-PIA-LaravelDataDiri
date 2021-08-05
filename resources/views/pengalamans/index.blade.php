@extends('layouts.app')

@section('title', 'pengalamans')

@section('content')
<a href="/pengalamans/create" class="card-link btn-primary">Tambah List Harga</a>
@foreach ($pengalamans as $pengalaman)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/pengalamans/{{ $pengalaman['id'] }}" class="card-title">{{ $pengalaman['type'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $pengalaman['keterangan'] }}</h6>
    <a href="/pengalamans/{{$pengalaman['id']}}/edit" class="card-link btn-warning">Edit List pengalaman</a>
    <form action="/pengalamans/{{ $pengalaman['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete List pengalaman</a>
    </form>
  </div>
</div>

@endforeach
<div>
{{ $pengalamans->links()}} 
</div>
@endsection