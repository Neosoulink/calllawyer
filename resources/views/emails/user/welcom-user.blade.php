@component('mail::message')
# Bienvenue {{ $user->name }}

Merci d'avoir créé un compte chez LaraApp !
{{ $user->email }}

@endcomponent
