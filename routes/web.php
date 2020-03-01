<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'TweetController@index')->name('home');

Route::post('/store', 'TweetController@store')->name('store');

Route::post('delete', 'TweetController@destroy')->name('delete');

Route::get('account', 'UserController@account')->name('account');

Route::get('profile', 'UserController@profile')->name('profile');

Route::get('getUserProfile', 'UserController@getUserProfile')->name('getUserProfile');

Route::get('/follows/{username}', 'UserController@follows');

Route::get('/unfollows/{username}', 'UserController@unfollows');

Route::post('profile', 'UserController@update_avatar');

