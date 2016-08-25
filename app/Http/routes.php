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

//main
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
//Route::get('/home/{year}/{term}/{sort}', 'HomeController@index');
Route::get('/home/{year}/{term}', 'HomeController@index');
//Route::get('/home/{sort}', 'HomeController@index');

//login/registration
Route::auth();

//term
Route::get('/term', 'HomeController@selectTerm');
Route::post('/term', 'HomeController@postTerm');

//add new student
Route::get('/student', 'HomeController@newStudent');
Route::post('/student', 'HomeController@postStudent');

//add new attendance
Route::get('/entry', 'HomeController@newEntry');
Route::post('/entry', 'HomeController@postEntry');

Route::post('delete/{attID}', ['as' => 'delete', 'uses' => 'HomeController@deleteRecord']);



