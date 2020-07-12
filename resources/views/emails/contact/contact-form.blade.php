@component('mail::message')
# Boujours

Vous avez reçus un mail de la part de : <br>
{{$data['name']}} <small>{{$data['email']}}</small><br>

<b>Contenu</b> :<br>
{{$data['message']}}

@component('mail::button', ['url' => ''])
Consulter l'activité
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
