<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Contact;

class ContactController extends Controller
{

	public function home()
	{
		$users = DB::table('contacts')->get();
		return view('contact.home', ['contacts' => $users]);
	}

	public function create()
	{
		return view('contact.create');
	}

	public function store(Request $request)
	{
		$data = $request->validate([
			'nom' => 'required|string|min:3',
			'prenom' => 'required|string|string|min:3',
			'postnom' => 'required|string|string|min:3',
			'email' => 'required|email',
			'numero' => 'required|string',
			'societe' => 'required|string',
			'date_naissance' => 'required|date',
		]);

		return Contact::create($data);;
	}

	public function list()
	{
		return Contact::get();
	}

	public function update(Request $request, Contact $contact)
	{
		$data = $request->validate([
			'nom' => 'required|string|min:3',
			'prenom' => 'required|string|string|min:3',
			'postnom' => 'required|string|string|min:3',
			'email' => 'required|email',
			'numero' => 'required|regex:/^(\+243)[0-9]{9}$/g',
			'societe' => 'required|string',
			'date_naissance' => 'required|date',
		]);

		return $contact->update($data);
	}

	public function destroy(Contact $contact)
	{
		$contact->delete();
		return response(null, Response::HTTP_OK);
	}
}
