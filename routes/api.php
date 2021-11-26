<?php

use App\Http\Controllers\TaskController;
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

//REAL ESTATE ROUTES
Route::group(['prefix' => 'task'], function () {
    Route::get('/', [TaskController::class, 'index']);
    // Route::get('/{id}', [TaskController::class, 'show']);
    Route::post('/', [TaskController::class, 'store']);
    Route::put('/', [TaskController::class, 'update']);

    Route::get('/getByOrder', [TaskController::class, 'getByOrder']);


    // Route::put('/{id}', 'Task\TaskController@update');
    // Route::delete('/{id}', 'Task\TaskController@destroy');
});
