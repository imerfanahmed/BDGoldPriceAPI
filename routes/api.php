<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoldAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1', function () {
    return response()->json([
        'message' => 'Great success! API v1',
        'status' => 'Connected'
    ], 200);
});

Route::get('/v1/today', [GoldAPIController::class, 'today']);
Route::get('/v1/yesterday', [GoldAPIController::class, 'yesterday']);
Route::get('/v1/lastweek', [GoldAPIController::class, 'lastWeek']);
Route::get('/v1/lastmonth', [GoldAPIController::class, 'lastmonth']);
Route::get('/v1/lastyear', [GoldAPIController::class, 'lastyear']);
Route::get('/v1/last5years', [GoldAPIController::class, 'last5years']);
Route::get('/v1/all', [GoldAPIController::class, 'all']);

