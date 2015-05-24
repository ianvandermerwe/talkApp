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

Route::group(['prefix' => 'categories','middleware' => ['auth']], function(){
//Categories Routes
    Route::get('/', 'BookCategoriesController@listCategories');

    Route::get('/edit/', 'BookCategoriesController@loadEditCreateCategories');
    Route::post('/edit/', 'BookCategoriesController@postEditCreateCategories');
    Route::get('/edit/{id}', 'BookCategoriesController@loadEditCreateCategories');
    Route::post('/edit/{id}', 'BookCategoriesController@postEditCreateCategories');

    Route::get('/delete/{id}', 'BookCategoriesController@loadDeleteCategories');
    Route::post('/delete/{id}', 'BookCategoriesController@postDeleteCategories');
});