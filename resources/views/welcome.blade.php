@extends('layouts.app')

@section('content')

<div class="container mt-5 pt-5">
    <div class="welcome-text text-center">

        <h1 class="display-3">Contacts pour avocat !</h1>
        <p class="text-muted">Pour commancer ! Diriger vous la page des <a href="{{ route('contact.home') }}">contacts</a>.</p>
    </div>
</div>

@endsection
