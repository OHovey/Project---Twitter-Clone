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

Route::get('/', 'TweetsController@index');

// Tweet Routing
Route::get('/tweet/create', 'TweetsController@create');
Route::post('/tweet/store', 'TweetsController@store');
Route::get('/tweet/retweet', 'TweetsController@retweet');
Route::get('/tweet/{tweet}', 'TweetsController@show');

// Comment Routing
Route::get('/comment/store', 'CommentsController@store');

// Login and registration routes
Route::get('/login', 'SessionsController@index');
Route::get('/login/create', 'SessionsController@create');
Route::post('/login/store', 'SessionsController@store');
Route::get('/register/create', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/logout', 'sessionsController@destroy');
Route::get('/register/destroy', 'registrationController@destroy');

// user id
Route::get('/users/{user}', 'UsersController@show');
Route::get('/users/follow/{user}', 'UsersController@follow');

// livesearch routing
Route::get('/search', 'SearchController@search');

// message routing
Route::get('/messages', 'MessagesController@index');
Route::get('/messages/show/{user}', 'MessagesController@show');
Route::get('/messages/create/{user}', 'MessagesController@create');
Route::post('/messages/store', 'MessagesController@store');
Route::post('/messages/store/{user}', 'MessagesController@new_message');

// notifications routing
Route::get('/notifications', 'NotificationsController@notifications');
Route::get('/notifications/index', 'NotificationsController@index');

Auth::routes();

// Auth::get('/login', 'SessionsController@create');
// Auth::post('/login', 'SessionsController@store');


