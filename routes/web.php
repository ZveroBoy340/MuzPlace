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
Route::get('/search', 'MainController@search')->name('search');
Route::get('/city/{city}', 'MainController@city_cookie');

Route::get('/artists', 'MainController@artists')->name('artists');
Route::post('/artists/filter', 'MainController@artists_filter');

Route::get('/events', 'MainController@events')->name('events');
Route::post('/events/filter', 'MainController@events_filter');

Route::get('/blog', 'MainController@blog')->name('blog');
Route::get('/blog/{id}', 'MainController@blog_article')->name('article');

Route::get('/faq', 'MainController@faq')->name('faq');
Route::get('/page/{url}', 'MainController@page')->name('page');
Route::get('/artist/{id}', 'MainController@artist')->name('artist');
Route::post('/invite/{id}/', 'MainController@artist_invite');

Route::get('/event/{id}', 'MainController@event')->name('event');
Route::post('/event/{id}/{owner}/proposal/{data}/{role}', 'MainController@add_proposal');

Auth::routes(['verify' => true]);

Route::get('/lk-events', 'HomeController@index')->name('home');
Route::get('/lk-events/date/{date}', 'HomeController@date_events');

Route::get('/lk-messages', 'HomeController@messages')->name('lk-messages');
Route::get('/lk-messages/{notice_id}', 'HomeController@look_notice');
Route::get('/lk-messages/read/all', 'HomeController@read_all');
Route::get('/lk-messages/delete/{notice_id}', 'HomeController@delete_notice');
Route::get('/lk-messages/date/{first}/{last}', 'HomeController@date_notices');

Route::get('/lk-chat', 'HomeController@chat')->name('lk-chat');
Route::get('/lk-chat/{id}', 'HomeController@chat_message');
Route::post('/lk-chat/message', 'HomeController@post_message');
Route::get('/lk-chat/date/{first}/{last}/{user}', 'HomeController@date_chat');


Route::get('/lk-info', 'HomeController@info')->name('lk-info');
Route::get('/lk-reviews', 'HomeController@reviews')->name('lk-reviews');
Route::get('/add_review/{proposal_id}', 'HomeController@add_reviews');
Route::post('/add_review/{proposal_id}', 'HomeController@post_reviews');


Route::get('/lk-skills', 'HomeController@skills')->name('lk-skills');
Route::get('/create-event', 'HomeController@create')->name('create');
Route::get('/edit-event/{id}', 'HomeController@edit_event');
Route::get('/delete-event/{id}', 'HomeController@delete_event');

Route::get('/lk-event/{id}/proposal/', 'HomeController@event_proposals');
Route::get('/lk-event/{id}/users/', 'HomeController@event_users');

Route::get('/lk-event/{id}/chat/{user_id}', 'HomeController@invite_chat');

Route::get('/lk-event/{id}/accept/{proposal}', 'HomeController@accept_proposal');
Route::get('/lk-event/{id}/delete/{proposal}', 'HomeController@delete_proposal');
Route::get('/delete-proposal/{proposal}', 'HomeController@delete_proposal_user');


Route::post('/event-form', 'HomeController@create_event');
Route::post('/update-event/{id}', 'HomeController@update_event');
Route::post('/lk-info-update', 'HomeController@update_info');
Route::post('/lk-skills-update', 'HomeController@update_skills');


Route::group(['middleware' => ['auth', 'admin']], function() {

    Route::prefix('mpadmin')->group(function () {
        Route::get('/', 'AdminController@index');

        Route::prefix('users')->group(function () {
            Route::get('/', 'AdminController@users');
            Route::get('/{id}', 'AdminController@user_edit');
            Route::post('/{id}/update', 'AdminController@user_update');
            Route::get('/{id}/delete', 'AdminController@user_delete');
            Route::get('/{id}/status/{status}', 'AdminController@user_status');
        });

        Route::prefix('events')->group(function () {
            Route::get('/', 'AdminController@events');
            Route::get('/{id}', 'AdminController@events_edit');
            Route::post('/{id}/update', 'AdminController@events_update');
            Route::get('/{id}/delete', 'AdminController@events_delete');
            Route::get('/{id}/status/{status}', 'AdminController@events_status');
        });

        Route::prefix('reviews')->group(function () {
            Route::get('/', 'AdminController@reviews');
            Route::get('/{id}', 'AdminController@reviews_edit');
            Route::post('/{id}/update', 'AdminController@reviews_update');
            Route::get('/{id}/delete', 'AdminController@reviews_delete');
            Route::get('/{id}/status/{status}', 'AdminController@reviews_status');
        });

        Route::prefix('articles')->group(function () {
            Route::get('/', 'AdminController@articles');
            Route::get('/add', 'AdminController@articles_add');
            Route::post('/add', 'AdminController@articles_post');
            Route::get('/{id}', 'AdminController@articles_edit');
            Route::post('/{id}/update', 'AdminController@articles_update');
            Route::get('/{id}/delete', 'AdminController@articles_delete');
            Route::get('/{id}/status/{status}', 'AdminController@articles_status');
        });

        Route::prefix('pages')->group(function () {
            Route::get('/', 'AdminController@pages');
            Route::get('/add', 'AdminController@pages_add');
            Route::post('/add', 'AdminController@pages_post');
            Route::get('/{id}', 'AdminController@pages_edit');
            Route::post('/{id}/update', 'AdminController@pages_update');
            Route::get('/{id}/delete', 'AdminController@pages_delete');
            Route::get('/{id}/status/{status}', 'AdminController@pages_status');
        });

        Route::prefix('faq')->group(function () {
            Route::get('/', 'AdminController@faq');
            Route::get('/add', 'AdminController@faq_add');
            Route::post('/add', 'AdminController@faq_post');
            Route::get('/{id}', 'AdminController@faq_edit');
            Route::post('/{id}/update', 'AdminController@faq_update');
            Route::get('/{id}/delete', 'AdminController@faq_delete');
            Route::get('/{id}/status/{status}', 'AdminController@faq_status');
        });

        Route::prefix('skills')->group(function () {
            Route::get('/', 'AdminController@skills');
            Route::get('/add', 'AdminController@skills_add');
            Route::post('/add', 'AdminController@skills_post');
            Route::get('/{id}', 'AdminController@skills_edit');
            Route::post('/{id}/update', 'AdminController@skills_update');
            Route::get('/{id}/delete', 'AdminController@skills_delete');
        });

        Route::prefix('genres')->group(function () {
            Route::get('/add', 'AdminController@genres_add');
            Route::post('/add', 'AdminController@genres_post');
            Route::get('/{id}', 'AdminController@genres_edit');
            Route::post('/{id}/update', 'AdminController@genres_update');
            Route::get('/{id}/delete', 'AdminController@genres_delete');
        });

        Route::prefix('seo')->group(function () {
            Route::get('/', 'AdminController@seo');
            Route::get('/{id}', 'AdminController@seo_edit');
            Route::post('/{id}/update', 'AdminController@seo_update');
        });

    });

});
