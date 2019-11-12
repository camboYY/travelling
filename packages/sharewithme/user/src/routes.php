<?php

Route::middleware('auth:api')->prefix('api')->namespace('Sharewithme\User\Controllers')->group(function() {
  Route::post('reset/password', 'ForgetPasswordController@reset');

  Route::post('verify/password', 'ForgetPasswordController@verify');
});