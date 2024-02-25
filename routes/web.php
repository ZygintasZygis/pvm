<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Admin
    Route::prefix('admin')->name('admin.')->middleware('is_admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('{id}', [UserController::class, 'update'])->name('update');
        });

        Route::prefix('client')->name('client.')->group(function () {
            Route::get('/', [AdminClientController::class, 'index'])->name('index');
            Route::get('{id}/profile', [AdminClientController::class, 'profile'])->name('profile');
            Route::get('{userId}', [AdminClientController::class, 'create'])->name('create');
            Route::post('{userId}', [AdminClientController::class, 'store'])->name('store');
            Route::get('{id}/edit', [AdminClientController::class, 'edit'])->name('edit');
            Route::put('{id}', [AdminClientController::class, 'update'])->name('update');
        });

        Route::prefix('bill')->name('bill.')->group(function () {
            Route::get('{clientId}', [BillController::class, 'create'])->name('create');
            Route::post('/', [BillController::class, 'store'])->name('store');
            Route::get('{clientId}/{bill}/edit', [BillController::class, 'edit'])->name('edit');
            Route::put('{bill}', [BillController::class, 'update'])->name('update');
            Route::delete('{bill}', [BillController::class, 'destroy'])->name('destroy');
        });

        Route::get('/product-item/{bill?}', [BillController::class, 'productItem'])->name('product-item');
    });

    // Accountant
    Route::prefix('accountant')->name('accountant.')->middleware('is_accountant')->group(function () {
        Route::get('/', [AccountantController::class, 'index'])->name('index');
        Route::get('/client/{userId}', [AccountantController::class, 'clientShow'])->name('client.show');
        Route::get('/bill/{clientId}/{bill}', [AccountantController::class, 'billShow'])->name('bill.show');
    });

    // Client
    Route::prefix('client')->name('client.')->middleware('is_client')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('/bill/{bill}', [ClientController::class, 'billShow'])->name('bill.show');
        Route::post('/bill/{bill}', [ClientController::class, 'billPay'])->name('bill.pay');
    });
});

