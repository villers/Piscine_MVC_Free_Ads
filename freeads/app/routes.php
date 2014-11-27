<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
$alphanum = '[a-zA-Z0-9]+';

//Route::when('*', 'csrf', array('post', 'put', 'patch', 'delete'));

Route::get('/', ['uses' => 'IndexController@showIndex', 'as' => 'index']);

Route::resource('utilisateur', 'UtilisateurController');
Route::get('login', ['uses' => 'UtilisateurController@getLogin', 'as' => 'login']);
Route::post('login', ['uses' => 'UtilisateurController@postLogin', 'as' => 'login.post']);
Route::get('logout', ['uses' => 'UtilisateurController@getLogout', 'as' => 'logout']);

Route::get('validate/{user_name}', ['uses' => 'UtilisateurController@getConfirm', 'as' => 'confirm'])->where('user_name', $alphanum);

Route::get('annonce/search', ['uses' => 'AnnonceController@search', 'as' => 'annonce.search']);
Route::get('annonce/all', ['uses' => 'AnnonceController@indexAll', 'as' => 'annonce.all']);
Route::resource('annonce', 'AnnonceController');

Route::group(['before' => 'auth'], function()
{
	Route::resource('message', 'MessageController');
});

View::composer('*', function($view){
	if(Auth::check()){
    	$view->with('count_message', Message::where('dest_id', '=', Auth::user()->id)->count());
    }
});