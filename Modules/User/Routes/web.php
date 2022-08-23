<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\QrCodeController;

Route::prefix('user')->group(function () {

    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['guest']], function () {

        /*** Register Routes ***/
        // Route::get('/register', 'Auth\RegisterController@show')->name('register.show');
        // Route::post('/register', 'Auth\RegisterController@register')->name('register.perform');

        /*** Login Routes ***/
        Route::get('/login', 'Auth\LoginController@show')->name('login.show');
        Route::post('/login', 'Auth\LoginController@login')->name('login.perform');

        /*** forgot - reset password ***/
        Route::get('/recovery-options', 'Auth\ForgotPasswordController@showRecoveryOptionsForm')->name('user.recovery.options.get');
        Route::get('/forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('user.forget.password.get');
        Route::post('/forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('user.forget.password.post');
        Route::get('/reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('user.reset.password.get');
        Route::post('/reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('user.reset.password.post');
    });

    Route::group(['middleware' => ['auth:web']], function () {

        Route::get('/dashboard', 'HomeController@index')->name('user.dashboard');
        Route::get('/logout', 'Auth\LogoutController@perform')->name('logout.perform');

        /*** ACL Routes ***/
        Route::group(['prefix'=>'ACL'],function(){
            Route::group(['prefix' => 'roles'], function () {
                Route::get('/', 'ACL\RolesController@index')->name('roles.user.index');
                Route::get('/create', 'ACL\RolesController@create')->name('roles.user.create');
                Route::post('/create', 'ACL\RolesController@store')->name('roles.user.store');
                Route::get('/{id}/show', 'ACL\RolesController@show')->name('roles.user.show');
                Route::get('/edit/{id}', 'ACL\RolesController@edit')->name('roles.user.edit');
                Route::put('/update/{id}', 'ACL\RolesController@update')->name('roles.user.update');
                Route::delete('/{id}/delete', 'ACL\RolesController@destroy')->name('roles.user.destroy');
                Route::get('/search', 'ACL\RolesController@search')->name('roles.user.search');
            });

            Route::group(['prefix' => 'permissions'], function () {
                Route::get('/', 'ACL\PermissionsController@index')->name('permissions.user.index');
                Route::get('/create', 'ACL\PermissionsController@create')->name('permissions.user.create');
                Route::post('/create', 'ACL\PermissionsController@store')->name('permissions.user.store');
                Route::get('/{id}/show', 'ACL\PermissionsController@show')->name('permissions.user.show');
                Route::get('/edit/{id}', 'ACL\PermissionsController@edit')->name('permissions.user.edit');
                Route::put('/update/{id}', 'ACL\PermissionsController@update')->name('permissions.user.update');
                Route::delete('/{id}/delete', 'ACL\PermissionsController@destroy')->name('permissions.user.destroy');
                Route::get('/search', 'ACL\PermissionsController@search')->name('permissions.user.search');
            });
        });

        /*** User Routes ***/
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@index')->name('users.index');
            Route::get('/create', 'UserController@create')->name('users.create');
            Route::post('/create', 'UserController@store')->name('users.store');
            Route::get('/{user}/show', 'UserController@show')->name('users.show');
            Route::get('/edit/{id}', 'UserController@edit')->name('users.edit');
            Route::put('/update/{id}', 'UserController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UserController@destroy')->name('users.destroy');
            Route::get('/profile/{user}', 'UserController@showProfile')->name('users_.show.profile');
            Route::get('/edit/profile/{id}', 'UserController@editProfile')->name('users_.edit.profile');
            Route::put('/update/profile/{id}', 'UserController@updateProfile')->name('users_.update.profile');
            Route::get('/search', 'UserController@search')->name('users.search');
        });

        /*** Providers Routes ***/
        Route::group(['prefix' => 'providers'], function () {
            Route::get('/', 'ProvidersController@index')->name('providers.index');
            Route::get('/create', 'ProvidersController@create')->name('providers.create');
            Route::post('/create', 'ProvidersController@store')->name('providers.store');
            Route::get('/show/{id}', 'ProvidersController@show')->name('providers.show');
            Route::get('/edit/{id}', 'ProvidersController@edit')->name('providers.edit');
            Route::put('/update/{id}', 'ProvidersController@update')->name('providers.update');
            Route::delete('/delete/{id}', 'ProvidersController@destroy')->name('providers.destroy');
            Route::get('/search', 'ProvidersController@search')->name('providers.search');
        });

        /*** Customers Routes ***/
        Route::group(['prefix' => 'customers'], function () {
            Route::get('/', 'CustomersController@index')->name('customers.index');
            Route::get('/create', 'CustomersController@create')->name('customers.create');
            Route::post('/create', 'CustomersController@store')->name('customers.store');
            Route::get('/show/{id}', 'CustomersController@show')->name('customers.show');
            Route::get('/edit/{id}', 'CustomersController@edit')->name('customers.edit');
            Route::put('/update/{id}', 'CustomersController@update')->name('customers.update');
            Route::delete('/delete/{id}', 'CustomersController@destroy')->name('customers.destroy');
            Route::get('/search', 'CustomersController@search')->name('customers.search');
        });

        /*** Parameters Routes ***/
        Route::group(['prefix' => 'parameters'], function () {
            Route::get('/', 'ParametersController@index')->name('parameters.index');
            Route::get('/create', 'ParametersController@create')->name('parameters.create');
            Route::post('/create', 'ParametersController@store')->name('parameters.store');
            Route::get('/show/{id}', 'ParametersController@show')->name('parameters.show');
            Route::get('/edit/{id}', 'ParametersController@edit')->name('parameters.edit');
            Route::put('/update/{id}', 'ParametersController@update')->name('parameters.update');
            Route::delete('/delete/{id}', 'ParametersController@destroy')->name('parameters.destroy');
            Route::get('/search', 'ParametersController@search')->name('parameters.search');
        });

        /*** Reports Routes ***/
        Route::group(['prefix' => 'reports'], function () {
            Route::get('/customers', 'ReportsController@customers')->name('reports.customers');
            Route::get('/customers/search', 'ReportsController@customers')->name('reports.customers');
            Route::get('/machines', 'ReportsController@machines')->name('reports.machines');
            Route::get('/users', 'ReportsController@users')->name('reports.users');
            Route::get('/schedules', 'ReportsController@schedules')->name('reports.schedules');
        });

        /** Posts only teste*/
        Route::any('posts', 'PostController@index')->name('posts.index');
        Route::get('posts/show', 'PostController@show')->name('posts.show');
        Route::any('posts/search', 'PostController@search')->name('posts.search');
    });
});
