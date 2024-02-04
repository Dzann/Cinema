<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ConfirmOrderController;
use App\Http\Controllers\api\MovieController;
use App\Http\Controllers\API\SeatSelectionController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\TransactionHistoryController;
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

Route::group(['prefix' => 'v1'], function(){
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('list-movie', [MovieController::class, 'showMovies']);

    Route::get('seat-selection', [SeatSelectionController::class, 'index']);

    Route::post('confirm-order', [ConfirmOrderController::class, 'order']);

    Route::get('transaction-detail', [TransactionController::class, 'detail']);
    Route::get('transaction-histories', [TransactionController::class, 'index']);
});

