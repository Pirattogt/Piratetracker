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

Route::get('/', function() {
});

Route::match(['post', 'put'], 'position', array('before' => 'auth.basic', 'uses' => 'PositionsController@receivePosition'));

Route::get('position/get', array('before' => 'auth.basic', 'uses' => 'PositionsController@getLastPosition'));
Route::get('position/get/all', array('before' => 'auth.basic', 'uses' => 'PositionsController@getAllPositions'));

Route::get('users/get', array('before' => 'auth.basic', 'uses' => 'UsersController@getUserInfo'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::filter('basic.once', function() {
	return Auth::onceBasic();
});
