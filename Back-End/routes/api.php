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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//                CRUDs

Route::apiResource('user','UserController');
Route::apiResource('project', 'ProjectController');
Route::apiResource('work', 'WorkController');
Route::apiResource('avaliation', 'AvaliationController');

//------------------------------------------------//

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'API\PassportController@logout');
    Route::post('get-details', 'API\PassportController@getDetails');
});
