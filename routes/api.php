<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_contacts', 'ContactController@list');
Route::post('/add_contact', 'ContactController@store');
Route::put('/update_contact/{contact}', 'ContactController@update');
Route::delete('/delete_contact/{contact}', 'ContactController@destroy');
