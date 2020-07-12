<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','welcome');
Route::view('a-propos', 'a-propos')->middleware('test');


// Clients
Route::resource('clients', 'ClientController');

// Contacts
Route::get('contactez-nous', 'ContactController@create')->name('contact.create');
Route::post('contactez-nous', 'ContactController@store')->name('contact.store');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
