@extends('layouts.app')

@section('content')

<div class="container pt-4">
    @if (!session()->has('msg'))
    <div class="text-center">
        <h1 class="display-4 py-2">Contactez nous</h1>
    </div>
    <form action="{{ route('contact.store') }}" method="POST" class="mx-5 p-5 shadow">
        @csrf
        <div class="form-group mx-5 px-5">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ @old('name') }}" placeholder="Inserer un speudo">
            <div class="invalid-feedback">
            {{ $errors->first('name') }}
            </div>
        </div>

        <div class="form-group mx-5 px-5">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ @old('email') }}" placeholder="Inserer un email">
            <div class="invalid-feedback">
            {{ $errors->first('email') }}
            </div>
        </div>

        <div class="form-group mx-5 px-5">
            <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Inserer votre message">{{ @old('message') }}</textarea>
            <div class="invalid-feedback">
            {{ $errors->first('message') }}
            </div>
        </div>

        <div class="form-group text-center pt-4">
            <a href="/" class="btn btn-light"><- Aller au home</a>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
    @endif
</div>

@endsection
