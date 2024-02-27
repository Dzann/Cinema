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
    Route::get('/filtered-Chart', [TransactionHistoryController::class, 'filteredChart'])->name('filteredChart');
    Route::get('historyPDF', [TransactionHistoryController::class, 'filterPdf'])->name('filterPdf');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('change-password', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::post('update-Password', [AuthController::class, 'updatePassword'])->name('updatePassword');

    Route::middleware(['checkRole:user'])->group( function() {
        Route::get('/detailmovie/{movie}', [MovieController::class, 'detailmovie'])->name('detailmovie');
        Route::get('seat-selection', [SeatSelectionController::class, 'index'])->name('seatSelection');
        Route::post('confirm-order', [ConfirmOrderController::class, 'index'])->name('confirmOrder');
        Route::post('create-order', [ConfirmOrderController::class, 'order'])->name('createOrder');
        Route::get('transaction/{id}', [ConfirmOrderController::class, 'show'])->name('transaction');
        Route::get('ticket', [TransactionHistoryController::class, 'ticket'])->name('ticket');
        Route::get('cari', [MovieController::class, 'cari'])->name('cari');
    
    });
    
    
    // Admin routes disini wak
    Route::middleware(['checkRole:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'homeadmin'])->name('homeadmin');
        Route::get('/admin/trash', [AdminController::class, 'trash'])->name('trash');
        Route::get('/admin/masuk/{movie}', [AdminController::class, 'masuk'])->name('masuk');
        Route::get('/admin/tambahmovie', [AdminController::class, 'tambahmovie'])->name('tambahmovie');
        Route::post('/admin/posttambahmovie', [AdminController::class, 'posttambahmovie'])->name('posttambahmovie');
        Route::get('/admin/edit-{movie}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/admin/edit{movie}', [AdminController::class, 'editMovie'])->name('editMovie');
        Route::get('/admin/hapus/{movie}', [AdminController::class, 'hapus'])->name('hapus');
        Route::post('/admin/deleteterpilih', [AdminController::class, 'deleteterpilih'])->name('deleteterpilih');
        Route::get('/admin/dashboard-user', [AdminController::class, 'formUser'])->name('formUser');
        Route::get('/admin/tambah-user', [AdminController::class, 'formTambahUser'])->name('formTambahUser');
        Route::post('/admin/tambah-user', [AdminController::class, 'tambahUser'])->name('tambahUser');
        Route::get('/admin/edit-user/{user}', [AdminController::class, 'formEditUser'])->name('formEditUser');
        Route::post('/admin/edit-user/{user}', [AdminController::class, 'editUser'])->name('editUser');
        Route::get('/admin/delete-user/{user}', [AdminController::class, 'deleteUser'])->name('deleteUser');
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
