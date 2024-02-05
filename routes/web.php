<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ConfirmOrderController;
use App\Http\Controllers\api\MovieController;
use App\Http\Controllers\API\SeatSelectionController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\TransactionHistoryController;
use App\Http\Controllers\OwnerController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [MovieController::class, 'showMovies'])->name('movie');
Route::get('/login', [AuthController::class, 'index'])->name('formlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/purchases', [TransactionHistoryController::class, 'showPurchases'])->name('history');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['checkRole:user'])->group( function() {
        Route::get('/detailmovie/{movie}', [MovieController::class, 'detailmovie'])->name('detailmovie');
        Route::get('change-password', [AuthController::class, 'changePassword'])->name('changePassword');
        Route::post('update-Password', [AuthController::class, 'updatePassword'])->name('updatePassword');
        Route::get('seat-selection', [SeatSelectionController::class, 'index'])->name('seatSelection');
        Route::post('confirm-order', [ConfirmOrderController::class, 'index'])->name('confirmOrder');
        Route::post('create-order', [ConfirmOrderController::class, 'order'])->name('createOrder');
        Route::get('ticket', [TransactionHistoryController::class, 'ticket'])->name('ticket');
    
    });
    
    
    // Admin routes disini wak
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'homeadmin'])->name('homeadmin');
        Route::get('/admin/tambahmovie', [AdminController::class, 'tambahmovie'])->name('tambahmovie');
        Route::post('/admin/posttambahmovie', [AdminController::class, 'posttambahmovie'])->name('posttambahmovie');
        Route::get('/admin/edit-{movie}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/admin/edit{movie}', [AdminController::class, 'editMovie'])->name('editMovie');
        Route::get('/admin/hapus/{movie}', [AdminController::class, 'hapus'])->name('hapus');
        Route::post('/admin/deleteterpilih', [AdminController::class, 'deleteterpilih'])->name('deleteterpilih');
        Route::get('/admin/tambah-user', [AdminController::class, 'tambahuser'])->name('tambahuser');
    
    });
    
    Route::middleware(['checkRole:owner'])->group(function () {
        Route::get('/owner-dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
        Route::get('/owner-filter', [OwnerController::class, 'filter'])->name('filter');
    });
});




// Route::middleware(['auth', 'checkRole:user'])->group(function () {
//     // User routes here
//     Route::get('/user/dashboard', 'UserController@dashboard')->name('user.dashboard');
// });
