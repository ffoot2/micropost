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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'MicropostsController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        
        Route::get('favorittings', 'UserFavoritesController@favorittings')->name('favorites.favorittings');
     
    });

    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
    
     Route::get('favorittings/{id}', 'UserFavoritesController@favorittings')->name('favorites.favorittings');
     Route::post('favorites/{id}', 'UserFavoritesController@store')->name('favorites.store');
     Route::delete('unfavorite/{id}', 'UserFavoritesController@destroy')->name('favorites.destroy');
    // Route::resource('favorites', 'UserFavoritesController', ['only' => ['store', 'destroy']]);
    // Route::get('favorites', 'UserFavoritesController@show');
   
        
    // Route::group(['prefix' => 'favorites/{id}'], function () {
        // Route::post('favorites/{id}', 'UserFavoritesController@store')->name('favorites.favorite');
        // Route::delete('unfavorite', 'UserFavoritesController@destroy')->name('favorites.unfavorite');
        // Route::get('followings', 'UsersController@followings')->name('users.followings');
        // Route::get('followers', 'UsersController@followers')->name('users.followers');
    // });
    
    
});