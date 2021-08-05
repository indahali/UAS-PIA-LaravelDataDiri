@extends('layouts.app')

@section('title', 'pendidikan')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Sekolah : {{ $pendidikan['sekolah'] }}</h3>
                <h3>Nama Sekolah : {{ $pendidikan['ns'] }}</h3>
                <h3>Mulai Tahun : {{ $pendidikan['mulai_tahun'] }}</h3>
                <h3>Berakhir Tahun : {{ $pendidikan['berakhir_tahun'] }}</h3>
</div>
@endsection