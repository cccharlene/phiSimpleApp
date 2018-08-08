<?php

use Illuminate\Http\Request;

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

/*
  Template
*/
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*
  Contact routes
*/
Route::get('contacts/get', 'ContactsController@get');
Route::post('contacts/add', 'ContactsController@add');
Route::post('contacts/edit', 'ContactsController@edit');
Route::post('contacts/delete', 'ContactsController@delete');
