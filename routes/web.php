<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['role:User,view-profile']], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::group(['namespace' => 'Profile'], function () {
            Route::get('/', 'ProfileController@index');

            Route::get('/security', 'ProfileController@security');

            Route::post('/updatephoto', 'ProfileController@updatePhoto');

            Route::patch('/updateprofile', 'ProfileController@updateProfile');

            Route::post('/updatepassword', 'ProfileController@updatePassword');
        });
    });
});

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['namespace' => 'Admin'], function () {
            Route::group(['middleware' => ['role:Moderator,view-backend']], function () {
                Route::get('/', 'AdminController@index');
            });

            Route::group(['middleware' => ['role:Moderator,manage-users']], function () {
                Route::resource('users', 'UsersController', ['except' => ['show', 'create']]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-roles']], function () {
                Route::resource('roles', 'RolesController', ['except' => ['show', 'create']]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-permissions']], function () {
                Route::resource('permissions', 'PermissionsController', ['except' => ['show', 'create']]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-settings']], function () {
                Route::get('settings', 'SettingsController@index');

                Route::put('settings/updateSettings', [
                  'uses' => 'SettingsController@updateSettings',
                  'as'   => 'settings.updateSettings', ]);

                Route::get('settings/activity', 'SettingsController@activity');

                Route::get('settings/backup', 'BackupController@index');

                Route::post('settings/backup/store', [
                    'as' => 'storebackup', 'uses' => 'BackupController@store', ]);

                Route::DELETE('settings/backup/destroy/{id}', [
                    'as' => 'destroybackup', 'uses' => 'BackupController@destroy', ]);

                Route::get('settings/backup/get/{name}', [
                    'as' => 'getdbbackup', 'uses' => 'BackupController@get', ]);
            });

            Route::group(['middleware' => ['role:Administrator,manage-uploads']], function () {
                Route::get('upload', 'UploadController@index');

                Route::post('upload/folder', 'UploadController@createFolder');
                Route::delete('upload/folder', 'UploadController@deleteFolder');

                Route::post('upload/file', 'UploadController@uploadFile');
                Route::delete('upload/file', 'UploadController@deleteFile');
            });
        });
    });
