<?php
use Illuminate\Http\Request;

Route::prefix('api')->namespace('Sharewithme\User\Http\Controllers')->group(function() {
  Route::post('reset/password', 'ForgetPasswordController@reset');

  Route::post('verify/password', 'ForgetPasswordController@verify');

  Route::middleware('auth:api')->group(function(){
    Route::get('/user', function (Request $request) {
      return $request->user();
    });

  });
});