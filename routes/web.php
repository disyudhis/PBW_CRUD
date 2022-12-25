<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Collection;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User Controller
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('user/list', [UserController::class, 'getAllUser'])->name('user.list');
Route::get('userRegistration', [UserController::class, 'create'])->name('userRegistration');
Route::post('userStore', [UserController::class, 'store'])->name('user.store');
Route::get('/userView/{user}', [UserController::class, 'show'])->name('userView');
Route::post('/userUpdate/{user}', [UserController::class, 'update'])->name('userUpdate');

// Koleksi Controller
Route::get('/koleksi', [CollectionController::class, 'index'])->name('koleksi');
Route::get('koleksi/list', [CollectionController::class, 'getAllCollection'])->name('koleksi.list');
Route::get('/koleksiTambah', [CollectionController::class, 'create'])->name('koleksiTambah');
Route::post('koleksiStore', [CollectionController::class, 'store'])->name('koleksi.store');
Route::post('/koleksiUpdate/{collection}', [CollectionController::class, 'update'])->name('koleksiUpdate');
Route::get('/koleksiView/{collection}', [CollectionController::class, 'show'])->name('koleksiView');
Route::get('/koleksiDestroy/{id}', [CollectionController::class, 'destroy'])->name('koleksiDestroy');

// Transaction Controller
Route::get('/transaksi', [TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('transaksi');
Route::get('/transaksiTambah', [TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaksiTambah');
Route::post('/transaksiStore', [TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaksiStore');
Route::get('/transaksiView/{transaction}', [TransactionController::class, 'show'])->middleware(['auth', 'verified'])->name('transaksiView');
Route::get('/getAllTransactions', [TransactionController::class, 'getAllTransactions'])->name('getAllTransactions');

// Detail Transaction
Route::post('/detailTransactionUpdate', [DetailTransactionController::class, 'update'])->name('detailUpdate');
Route::get('/detailTransactionKembalikan/{detailTransactionId}', [DetailTransactionController::class, 'detailTransactionKembalikan'])->middleware(['auth', 'verified'])->name('detailKembalikan');
Route::get('/getAllDetailTransactions/{transactionId}', [DetailTransactionController::class, 'getAllDetailTransactions'])->name('getAllDetailTransactions');
require __DIR__ . '/auth.php';
