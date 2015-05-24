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
Route::group(['prefix' => 'categories','middleware' => ['auth']], function(){
    Route::get('/', 'BookCategoriesController@listCategories');

    Route::get('/edit/', 'BookCategoriesController@loadEditCreateCategories');
    Route::post('/edit/', 'BookCategoriesController@postEditCreateCategories');
    Route::get('/edit/{id}', 'BookCategoriesController@loadEditCreateCategories');
    Route::post('/edit/{id}', 'BookCategoriesController@postEditCreateCategories');

    Route::get('/delete/{id}', 'BookCategoriesController@loadDeleteCategories');
    Route::post('/delete/{id}', 'BookCategoriesController@postDeleteCategories');
});

//Books Routes
Route::group(['prefix' => 'book','middleware' => ['auth']], function(){
    Route::get('/', 'BooksController@listBooks');

    Route::get('/edit/', 'BooksController@loadEditCreateBooks');
    Route::post('/edit/', 'BooksController@postEditCreateBooks');
    Route::get('/edit/{id}', 'BooksController@loadEditCreateBooks');
    Route::post('/edit/{id}', 'BooksController@postEditCreateBooks');

    Route::get('/delete/{id}', 'BooksController@loadDeleteBooks');
    Route::post('/delete/{id}', 'BooksController@postDeleteBooks');
});