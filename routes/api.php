<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
 |--------------------------------------------------------
 |            Thread Favorites Controller Routes
 |--------------------------------------------------------
 */
Route::post('/threads/{thread}/favorites', 'Api\ThreadFavoritesController@store');
Route::delete('/threads/{thread}/favorites', 'Api\ThreadFavoritesController@destroy');



//Route::get('/users', 'Api\UsersController');