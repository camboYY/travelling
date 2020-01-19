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

    // user's roles
    Route::prefix('roles')->group(function () {
      Route::get('/', 'RoleController@index');

      Route::post('/', 'RoleController@store');

      Route::get('/{roleId}', 'RoleController@get');

      Route::post('/{roleId}', 'RoleController@edit');

      Route::delete('/{roleId}', 'RoleController@delete');
    });

    // user's permission
    Route::prefix('permissions')->group(function () {
      Route::get('/', 'PermissionController@index');

      Route::post('/', 'PermissionController@store');

      Route::get('/{permissionId}', 'PermissionController@get');

      Route::post('/{permissionId}', 'PermissionController@edit');

      Route::delete('/{permissionId}', 'PermissionController@delete');
    });

  });
});