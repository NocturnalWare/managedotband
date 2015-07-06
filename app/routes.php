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

Route::get('/', array('as' => 'landing', 'uses' => 'SalesManagersController@index'));

Route::get('products/sort/{category}', array('as' => 'productsort', 'uses' => 'ProductsController@sortindex'));

Route::post('objectStorage', array('as' => 'objectStorage', 'uses' => 'ProductsController@objectStorage'));
Route::post('commerce', array('as' => 'commerceDirector', 'uses' => 'SalesManagersController@commerceDirector'));
Route::get('commerce', array('as' => 'commerceDirector', 'uses' => 'SalesManagersController@commerceDirector'));
Route::get('overmind/{director}', array('as' => 'overmind', 'uses' => 'OverlordsController@overlord'));
Route::post('overmind/{director}', array('as' => 'overmind', 'uses' => 'OverlordsController@overlord'));
Route::resource('products', 'ProductsController');
	Route::resource('overlord', 'OverlordsController');
Route::resource('carts', 'CartsController');
Route::group(array('before' => 'auth.basic'), function(){
});