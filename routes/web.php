<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@index')->name('index');
Route::get('/artists', 'MainController@artists')->name('artists');
Route::get('/events', 'MainController@events')->name('events');
Route::get('/blog', 'MainController@blog')->name('blog');
Route::get('/about', 'MainController@about')->name('about');

Route::get('/artist/{id}', 'MainController@artist');

Auth::routes(['verify' => true]);

Route::get('/lk-events', 'HomeController@index')->name('home');
Route::get('/lk-messages', 'HomeController@messages')->name('lk-messages');
Route::get('/lk-chat', 'HomeController@chat')->name('lk-chat');
Route::get('/lk-info', 'HomeController@info')->name('lk-info');
Route::get('/lk-reviews', 'HomeController@reviews')->name('lk-reviews');
Route::get('/lk-skills', 'HomeController@skills')->name('lk-skills');
Route::get('/create', 'HomeController@create')->name('create');

Route::post('/lk-info-update', 'HomeController@update_info');
Route::post('/lk-skills-update', 'HomeController@update_skills');
