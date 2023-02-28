<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::post('/receive-data', [ApiController::class, 'receivedata']);
Route::post('/senddata', [ApiController::class, 'senddata']);
Route::get('/showdata', [ApiController::class, 'readJsonFile']);
Route::get('/globalstatus', [ApiController::class, 'globalstatus']);
Route::get('/totalluminaire', [ApiController::class, 'totalluminaire']);
Route::get('/offline', [ApiController::class, 'offline']);

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('/send-data', 'App\Http\Controllers\ApiController@sendData');
