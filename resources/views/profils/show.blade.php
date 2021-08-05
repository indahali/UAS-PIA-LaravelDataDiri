@extends('layouts.app')

@section('title', 'profil')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Nama profil : {{ $profil['nama'] }}</h3>
                <h3>Email profil : {{ $profil['jk'] }}</h3>
                <h3>Email profil : {{ $profil['ttl'] }}</h3>
                <h3>Email profil : {{ $profil['agama'] }}</h3>
                <h3>Alamat profil : {{ $profil['alamat'] }}</h3>
    </div>
</div>
@endsection