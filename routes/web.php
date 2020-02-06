<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


Route::get('/feedback', 'FeedbackController@index')->name('feedback');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/details/{id}', 'HomeController@details')->name('details');
    Route::get('/editor/{id}', 'TemplateController@editor')->name('editor');

    Route::get('templates', 'TemplateController@form')->name('templates');

    Route::get('templates_one', function () {
        return view('users/invitation/theme_one');
    })->name('themes');
});

