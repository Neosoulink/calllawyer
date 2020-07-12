<?php

namespace App\Http\Controllers;

use App\Client;
use App\Entreprise;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('entreprise')->paginate(15);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Client::class);

        $entreprises = Entreprise::all();
        $client = New Client;
        return view('clients.create', compact('entreprises', 'client') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::create( $this->validator($request) );

        $this->storeImage($client);

        return back()->with('msg', 'Le client à été créé avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $entreprises = Entreprise::all();
        return view('clients.edit', compact('client', 'entreprises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($this->validator($request));

        $this->storeImage($client);

        return redirect('clients/'.$client->id)->with('msg', 'Le client à été mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('clients')->with('msg', 'Le client à été supprimé avec succès');
    }

    private function validator(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required|integer',
            'entreprise_id' => 'required|integer',
            'image' => 'sometimes|image|max:5000'
        ]);
    }

    private function storeImage(Client $client )
    {
       if (request('image')) {
           $client->update([
               'image' => request('image')->store('avatars', 'public'),
           ]);
       }
    }
}
