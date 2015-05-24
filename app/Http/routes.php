<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Categories Routes
Route::get('/categories', 'BookCategoriesController@listCategories');

Route::get('/categories/edit/', 'BookCategoriesController@loadEditCreateCategories');
Route::post('/categories/edit/', 'BookCategoriesController@postEditCreateCategories');
Route::get('/categories/edit/{id}', 'BookCategoriesController@loadEditCreateCategories');
Route::post('/categories/edit/{id}', 'BookCategoriesController@postEditCreateCategories');

Route::get('/categories/delete/{id}', 'BookCategoriesController@loadDeleteCategories');
Route::post('/categories/delete/{id}', 'BookCategoriesController@postDeleteCategories');