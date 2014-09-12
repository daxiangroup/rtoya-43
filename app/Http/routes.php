<?php

use Rtoya\Services\ArtService;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
/*
|--------------------------------------------------------------------------
| Route Patterns
|--------------------------------------------------------------------------
*/
Route::pattern('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
$routePrefix = '/dashboard';
$controller  = 'DashboardController@';

Route::get($routePrefix, [
    'uses' => $controller.'getIndex',
    'as'   => 'dashboard'
]);

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
*/
$routePrefix = '/account';
$controller  = 'AccountController@';

Route::get($routePrefix, [
    'uses' => $controller.'getIndex',
    'as'   => 'account'
]);

Route::group(['before' => 'isSelf'], function() use ($routePrefix, $controller)
{
    Route::get($routePrefix.'/{id}/edit/settings', [
        'uses' => $controller.'getEditSettings',
        'as'   => 'account.edit.settings'
    ]);

    Route::get($routePrefix.'/{id}/edit/password', [
        'uses' => $controller.'getEditPassword',
        'as'   => 'account.edit.password'
    ]);

    Route::get($routePrefix.'/{id}/edit/social', [
        'uses' => $controller.'getEditSocial',
        'as'   => 'account.edit.social'
    ]);

    Route::post($routePrefix.'/{id}/edit/{any?}', [
        'uses' => $controller.'postSave',
        'as'   => 'account.save'
    ]);
});

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
*/
$routePrefix = '/art';
$controller  = 'ArtController@';

Route::get($routePrefix, array(
    'uses' => $controller.'getIndex',
    'as'   => 'art'));

Route::get($routePrefix.'/featured', array(
    'uses' => $controller.'getFeaturedArt',
    'as'   => 'art.featuredArt'));

Route::get($routePrefix.'/{id}/{empty?}', array(
    'uses' => $controller.'getArtById',
    'as'   => 'art.artById'));


// Signin Routes
$routePrefix = '/signin';
$controller  = 'SigninController@';

Route::get($routePrefix, array(
    'uses' => $controller.'getForm',
    'as'   => 'signin'));

Route::post($routePrefix, array(
    'uses' => $controller.'postSignin',
    'as'   => 'signin.post'));

Route::get('/forgot-password', array(
    'uses' => $controller.'getForgotPassword',
    'as'   => 'signin.forgotpassword'));

Route::get('/signout', array(
    'uses' => $controller.'getLogout',
    'as'   => 'signin.signout'));

Route::get('/hash', function()
{
    return Hash::make('test');
});