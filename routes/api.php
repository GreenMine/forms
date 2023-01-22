<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'form'], function() {
	Route::get('{id}', []);
});

Route::group(['prefix' => 'admin'], function() {
	Route::post('/create', [\App\Http\Controllers\Admin\FormController::class, 'store']);
	Route::delete('/{formId}', [\App\Http\Controllers\Admin\FormController::class, 'destroy']);
	Route::group([
			'prefix' => '/{formId}/group',
			'controller' => \App\Http\Controllers\Admin\GroupController::class
	], function() {
		Route::get('/create', 'store');
		Route::delete('/{groupId}', 'destroy');
	});
	Route::group([
		'prefix' => '/{formId}/question',
		'controller' => \App\Http\Controllers\Admin\QuestionController::class
	], function() {
		Route::get('/create', 'store');
		Route::delete('/{groupId}', 'destroy');
	});
	
	Route::get('{id}/statistics', [\App\Http\Controllers\StatisticsController::class, 'show']);
});

Route::group(['prefix' => 'record'], function() {
	Route::get('{recordId}', []);//TODO
});