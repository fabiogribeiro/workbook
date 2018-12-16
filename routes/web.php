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


/**
 * 
 * Internal routes meant for administration
 * 
*/
Route::prefix('internal')->middleware('can:access-internal')->group(function() {
    Route::get('/subjects/new', 'SubjectsController@new');
    Route::get('/subjects/show/{subject}', 'SubjectsController@show')->name('subjects.show');
    Route::post('/subjects/create', 'SubjectsController@create')->name('subjects.create');

    Route::get('/challenges/new', 'ChallengesController@new');
    Route::post('/challenges/create', 'ChallengesController@create')->name('challenges.create');

    Route::get('/passportclients', function() {
        return view('clientmanager');
    });
});

Route::get('/dashboard', 'SubjectsController@index')->name('dashboard');
Route::get('/{domain}/{subject}', 'ChallengesController@index')->name('challenges.index');
Route::get('/{domain}/{subject}/{challenge}', 'ChallengesController@show')->name('challenges.show');
