@extends('layouts.app')

@section('title', 'contact')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Nomor Telepon : {{ $contact['no_tlp'] }}</h3>
                <h3>Email : {{ $contact['email'] }}</h3>
    </div>
</div>
@endsection