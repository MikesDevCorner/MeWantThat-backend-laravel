<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ShoppinglistController;
use App\Http\Controllers\Auth\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    //'prefix' => 'v1',
    //'as' => 'api.',
    'middleware' => ['auth:api', 'cors']
], function () {
    Route::get('lists/', 'Api\ShoppinglistController@showLists');
    Route::post('list/', 'Api\ShoppinglistController@createList');
    Route::delete('list/{idList}/', 'Api\ShoppinglistController@deleteList');
    Route::get('list/{idList}/entries/', 'Api\ShoppinglistController@showListEntries');
    Route::post('list/{idList}/entry/', 'Api\ShoppinglistController@createEntry');
    Route::delete('entry/{id}/', 'Api\ShoppinglistController@deleteEntry');
    Route::get('me/', 'Auth\ApiAuthController@me');
});


Route::group([
    //'prefix' => 'v1',
    //'as' => 'api.',
    'middleware' => ['cors']
], function () {
    Route::post('register/', 'Auth\ApiAuthController@register');
    Route::post('login/', 'Auth\ApiAuthController@login');
});
