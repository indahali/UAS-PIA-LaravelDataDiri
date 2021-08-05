@extends('layouts.app')

@section('title', 'contacts')

@section('content')
<a href="/contacts/create" class="card-link btn-primary">Tambah contacts</a>
@foreach ($contacts as $contact)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/contacts/{{ $contact['id'] }}" class="card-title">{{ $contact['no_tlp'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{ $contact['email'] }}</h6>
    <a href="/contacts/{{$contact['id']}}/edit" class="card-link btn-warning">Edit contact</a>
    <form action="/contacts/{{ $contact['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete contact</a>
    </form>
  </div>
</div>

@endforeach
<div>
{{ $contacts->links()}} 
</div>
@endsection