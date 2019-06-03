<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('regions/destroy', 'RegionController@massDestroy')->name('regions.massDestroy');

    Route::resource('regions', 'RegionController', ['except' => ['show']]);

    Route::delete('buildings/destroy', 'BuildingController@massDestroy')->name('buildings.massDestroy');

    Route::resource('buildings', 'BuildingController');

    Route::delete('metro-stations/destroy', 'MetroStationController@massDestroy')->name('metro-stations.massDestroy');

    Route::resource('metro-stations', 'MetroStationController', ['except' => ['show']]);

    Route::delete('floors/destroy', 'FloorController@massDestroy')->name('floors.massDestroy');

    Route::resource('floors', 'FloorController', ['except' => ['show']]);

    Route::delete('realty-objects/destroy', 'RealtyObjectController@massDestroy')->name('realty-objects.massDestroy');

    Route::resource('realty-objects', 'RealtyObjectController');

    Route::post('realty-objects/media', 'RealtyObjectController@storeMedia')->name('realty-objects.storeMedia');
});
