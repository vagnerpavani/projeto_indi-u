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



Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

//              ROTAS PARA USUÁRIOS LOGADOS

Route::group(['middleware' => 'auth:api'], function() {
    //Rotas relacionadas a USER
    Route::put('self-update' , 'API\PassportController@selfUpdate');
    Route::delete('self-delete','API\PassportController@selfDelete');
    Route::get('logout', 'API\PassportController@logout');
    Route::get('get-details', 'API\PassportController@getDetails');
    Route::get('list-users', 'API\PassportController@getUsers');
    Route::post('get-details', 'API\PassportController@getDetails');
    Route::get('get-pic/{id}', 'UserController@downloadPic');

    //Rotas relacionadas a PROJECT
    Route::get('list-projects', 'API\PassportController@getProjects');
    Route::post('create-project', 'ProjectController@createProject');
    Route::get('my-projects', 'ProjectController@listProjects');
    Route::delete('delete-project/{id}', 'ProjectController@deleteProject');
    Route::put('edit-project/{id}', 'ProjectController@editProject');

    


    //Rotas relacionadas a WORK
    Route::get('list-works', 'API\PassportController@getWorks');
    Route::post('new-work/{id}', 'WorkController@newWork');
    Route::get('list-works/{id}', 'WorkController@listWorks');
    Route::put('edit-work/{idProject}/{idWork}', 'WorkController@editWork');
    Route::delete('delete-work/{idProject}/{idWork}', 'WorkController@deleteWork');
    
    //Rotas de avaliação
    Route::post('get-details', 'API\PassportController@getDetails');
    Route::post('give-avaliation', 'AvaliationController@createAvaliation');
    Route::get('my-avaliations', 'AvaliationController@listAvaliations');

    //Rotas de ADMIN
    Route::group(['middleware' => 'admin',], function ($router) {
        Route::apiResource('project', 'ProjectController');
        Route::apiResource('work', 'WorkController');
        Route::apiResource('avaliation', 'AvaliationController');
        Route::apiResource('user','UserController');
    });
});
