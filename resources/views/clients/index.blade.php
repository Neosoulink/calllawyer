@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="display-4">Nos clients</h1>
    @can('create', 'App\Client')
    <h4><a href="{{ route('clients.create') }}" class="text-dark">Go create clients -></a></h4>
    @endcan

    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Client name</th>
        <th scope="col">Status</th>
        <th scope="col">Entreprise</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp
        @foreach ($clients as $client)
        <tr>
            <th scope="row">{{ ++$i }}</th>
            <td><a href="/clients/{{ $client->id }}">{{ $client->name }}</a></td>
            <td>{{ $client->status }}</td>
            <td>{{ $client->entreprise->name }}</td>
            <td class="text-center">
                <a href="/clients/{{ $client->id }}" class="btn btn-primary">Show</a>
                <form action="/clients/{{ $client->id }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <div class="row d-flex justify-content-center">
        {{ $clients->links() }}
    </div>
</div>
{{-- /.container --}}

@endsection


