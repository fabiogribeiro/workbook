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
Route::get('/{domain}', function($domain) {
    return ['domain' => $domain];
});
Route::get('/{domain}/{subject}', function($domain, $subject) {
    return ['domain' => $domain, 'subject' => $subject];
});
Route::get('/{domain}/{subject}/{challenge}', function($domain, $subject, $challenge) {
    return ['domain' => $domain, 'subject' => $subject, 'challenge' => $challenge];
});
