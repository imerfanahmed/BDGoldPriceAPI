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

Route::prefix('v1/gold')->group(function () {
    Route::get('today', [GoldAPIController::class, 'today'])->name('gold.today');
    Route::get('yesterday', [GoldAPIController::class, 'yesterday'])->name('gold.yesterday');
    Route::get('lastweek', [GoldAPIController::class, 'lastWeek'])->name('gold.lastweek');
});

