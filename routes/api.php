<?php

use App\Http\Controllers\MessageController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/client', [MessageController::class, 'index']);

Route::post('/new', [MessageController::class, 'add_client']);

Route::patch('/client/{status}', [MessageController::class, 'finish_status']);

Route::patch('/lawyer/{status}', [MessageController::class, 'work_status']);

Route::patch('/coment/{coment}', [MessageController::class, 'coment']);
