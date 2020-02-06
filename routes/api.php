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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth'], function () {
});

Route::get('/invitation/{id}', 'InvitationController@show');
Route::post('/invitation/content/{id}', 'InvitationController@setContent');
Route::post('/invitation/create', 'InvitationController@store');
Route::post('/invitation/response', 'InvitationController@response');
Route::delete('/invitation/{id}', 'InvitationController@delete');
