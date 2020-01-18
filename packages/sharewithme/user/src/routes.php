<?php

Route::middleware('auth:api')->prefix('api')->namespace('Sharewithme\User\Http\Controllers')->group(function() {
  Route::post('reset/password', 'ForgetPasswordController@reset');

  Route::post('verify/password', 'ForgetPasswordController@verify');
});