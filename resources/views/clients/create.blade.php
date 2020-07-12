@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="py-2 display-4">Create new client :</h2>
    <form action="/clients" method="post" class="mt-2" enctype="multipart/form-data">
        @include('composants.clients.inputForm')
        <a href="/clients" class="btn btn-light"> <- Go back clients</a>
        <button type="submit" class="btn btn-primary">
            Add in database
        </button>
    </form>
</div>
{{-- /.container --}}

@endsection
