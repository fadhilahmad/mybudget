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

Route::get('/home', 'HomeController@index')->name('home');

//Route::patch('budjet','BudjetController@update');

Route::resource('budjet','BudjetController');

Route::post('update','BudjetController@update');

Route::post('delete','BudjetController@destroy');

Route::post('filter','BudjetController@filter');
