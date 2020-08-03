<?php

use Illuminate\Http\Request;

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

Route::get('lists', array('middleware' => 'cors', 'uses' => 'EinkaufslisteController@showLists'));
Route::post('list', array('middleware' => 'cors', 'uses' => 'EinkaufslisteController@createList'));
Route::delete('list/{idList}', array('middleware' => 'cors', 'uses' => 'EinkaufslisteController@deleteList'));
Route::get('entries/{idList}', array('middleware' => 'cors', 'uses' => 'EinkaufslisteController@showListEntries'));
Route::post('entry', array('middleware' => 'cors', 'uses' => 'EinkaufslisteController@createEntry'));
Route::delete('entry/{id}', array('middleware' => 'cors', 'uses' => 'EinkaufslisteController@deleteEntry'));