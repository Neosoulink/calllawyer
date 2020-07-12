@extends('layouts.app')

@section('content')

<div class="container">

    @if ($client->image)
    <div class="content-avatar d-inline-block align-text-bottom shadow-sm mr-md-2">
        <img src="{{ asset('storage/' . $client->image) }}" alt="Client-avatar"  class="img-thumbnail" style="height:80px">
    </div> 
    @endif
    <h1 class="display-4 d-inline-block">
        {{ $client->name }}
        <small class="h4">
            <a class="text-muted" href="/clients/{{ $client->id }}/edit">Editer</a> |
            <form action="/clients/{{ $client->id }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-muted border-0 bg-transparent linked m-0 p-0">Supprimer</button>
            </form>
        </small>
    </h1>
    <hr>
    <ul class="list-group list-group-flush h4">
       <li class="list-group-item shadow-sm mb-3 text-dark"><span class="text-muted">Email:</span> {{ $client->email }}</li>
       <li class="list-group-item shadow-sm mb-3 text-dark"><span class="text-muted">Entreprise:</span> {{ $client->entreprise->name }}</li>
       <li class="list-group-item shadow-sm mb-3 text-dark"><span class="text-muted">Status:</span> {{ $client->status }}</li>
    </ul>

    <a href="/clients" class="btn btn-light mt-4"> <- Show all clients</a>

</div>
{{-- /.container --}}

@endsection


