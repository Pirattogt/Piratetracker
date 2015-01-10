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
//	if (DB::connection()->getDatabaseName()) {
//		echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
//	}
//
//	if (!Schema::hasTable('users')) {
//		Schema::create('users', function($table) {
//			$table->increments('id');
//		});
//	}
//	return View::make('hello');
});

//Route::get('position/{id}', array('before' => 'auth.basic', 'uses' => 'PositionsController@receivePosition'));
//Route::get('position/{id}', array('before' => 'basic.once', 'uses' => 'PositionsController@receivePosition'));

//Route::post('position', array(/*'before' => 'auth.basic',*/ 'uses' => 'PositionsController@receivePosition'));
Route::post('position', array('before' => 'auth.basic', 'uses' => 'PositionsController@receivePosition'));

Route::get('position/get', array('before' => 'auth.basic', 'uses' => 'PositionsController@getLastPosition'));
Route::get('position/get/all', array('before' => 'auth.basic', 'uses' => 'PositionsController@getAllPositions'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::filter('basic.once', function() {
	return Auth::onceBasic();
});
