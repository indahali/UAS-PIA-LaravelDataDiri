@extends('layouts.app')

@section('title', 'contacts')

@section('content')

<form action="/contacts/{{ $contact['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nomor Telepon</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="no_tlp" aria-describedby="emailHelp" value="{{ old('no_tlp') ? old('no_tlp') : $contact['no_tlp'] }}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" id="emailHelp" value="{{ old('email') ? old('email') : $contact['email'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection