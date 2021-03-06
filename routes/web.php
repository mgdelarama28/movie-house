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

Route::get('/movies', 'MovieController@index')->name('movies.index');
Route::get('/movies/{id}', 'MovieController@show')->name('movies.show');

Route::get('/tv_shows', 'TvShowController@index')->name('tv_shows.index');
Route::get('/tv_shows/{id}', 'TvShowController@show')->name('tv_shows.show');

Route::get('/actors', 'ActorController@index')->name('actors.index');
Route::get('/actors/{id}', 'ActorController@show')->name('actors.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
