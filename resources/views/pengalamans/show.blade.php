@extends('layouts.app')

@section('title', 'pengalaman')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Type : {{ $pengalaman['type'] }}</h3>
                <h3>keterangan : {{ $pengalaman['keterangan'] }}</h3>
    </div>
</div>
@endsection