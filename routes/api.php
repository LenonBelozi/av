<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

#Route::get('estudantes', 'ApiController@getAllEstudantes');
Route::get('estudantes', [ApiController::class, 'getAllEstudantes']);
Route::get('estudantes/{id}', [ApiController::class, 'getEstudante']);
Route::post('estudantes', [ApiController::class, 'createEstudante']);
Route::put('estudantes/{id}', [ApiController::class, 'updateEstudante']);
Route::delete('estudantes/{id}',[ApiController::class, 'deleteEstudante']);

Route::get('operacao/{id}', [ApiController::class, 'getStatusOperacao']);
