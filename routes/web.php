<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 |--------------------------------------------------------
 |                Thread Controller Routes
 |--------------------------------------------------------
 */
Route::get('threads', 'ThreadController@index');
Route::get('threads/create', 'ThreadController@create');
Route::post('threads', 'ThreadController@store');
Route::get('threads/{channel}', 'ThreadController@index');
Route::get('threads/{channel}/{thread}', 'ThreadController@show');
Route::delete('threads/{channel}/{thread}', 'ThreadController@destroy');
/*
 |--------------------------------------------------------
 |                Replies Controller Routes
 |--------------------------------------------------------
 */
Route::delete('/replies/{reply}', 'RepliesController@destroy');
Route::patch('/replies/{reply}', 'RepliesController@update');
Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
/*
 |--------------------------------------------------------
 |                Favorites Controller Routes
 |--------------------------------------------------------
 */
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');
/*
 |--------------------------------------------------------
 |                Profiles Controller Routes
 |--------------------------------------------------------
 */
Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
/*
 |--------------------------------------------------------
 |           UserNotifications Controller Routes
 |--------------------------------------------------------
 */
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');
Route::get('/profiles/{user}/notifications', 'UserNotificationsController@index');
/*
 |--------------------------------------------------------
 |          ThreadSubscriptions Controller Routes
 |--------------------------------------------------------
 */
Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');
/*
 |--------------------------------------------------------
 |            UsersController Controller Routes
 |--------------------------------------------------------
 */
Route::get('api/users', 'Api\UsersController@index');
/*
 |--------------------------------------------------------
 |         UsersAvatarController Controller Routes
 |--------------------------------------------------------
 */
Route::post('api/users/{user}/avatar', 'Api\UsersAvatarController@store')->middleware('auth')->name('avatar');


Route::get('/test', function () {

    auth()->loginUsingId(1);

});
