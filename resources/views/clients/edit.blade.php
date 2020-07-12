@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="py-2 display-4">Edit: {{ $client->name }}</h2>
    <form action="{{ route('clients.update', ['client' => $client->id]) }}" method="post" class="mt-2" enctype="multipart/form-data">
        @method('PATCH')
        @include('composants.clients.inputForm')
        <a href="{{ route('clients.show', ['client' => $client->id]) }}" class="btn btn-light"> <- Go back {{ $client->name }}</a>
        <button type="submit" class="btn btn-primary">
            Sauvegarder les informations
        </button>
    </form>
</div>
{{-- /.container --}}

@endsection
