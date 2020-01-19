<?php
use Illuminate\Http\Request;

Route::prefix('api')->namespace('Sharewithme\User\Http\Controllers')->group(function() {
  Route::post('reset/password', 'ForgetPasswordController@reset');

  Route::post('verify/password', 'ForgetPasswordController@verify');

  Route::middleware('auth:api')->prefix('users')->group(function(){
    Route::get('/','ProfileController@all');

    Route::get('/profile/{profileId}','ProfileController@get');

    Route::post('/profile','ProfileController@store');

    Route::post('/profile/{profileId}','ProfileController@edit');

    Route::delete('/profile/{profileId}','ProfileController@delete');
  });
});