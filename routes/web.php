<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;

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
    return view('home');
})->middleware(['auth']);

Route::group(['prefix' => 'user'], function ($router) {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::post('/store', [UserController::class, 'user_store']);
    Route::get('/{user_id}', [UserController::class, 'user_destroy'])->name('user.destroy');
    Route::get('/edit/{user_id}', [UserController::class, 'user_edit'])->name('user.edit');
    Route::post('/update/{user_id}', [UserController::class, 'user_update'])->name('user.update');
});

Route::group(['prefix' => 'location'], function ($router) {
    Route::get('/', [LocationController::class, 'index'])->name('loc');
    Route::post('/store', [LocationController::class, 'store'])->name('loc.store');
    Route::get('/{id}', [LocationController::class, 'destroy'])->name('loc.destroy');
    Route::get('/edit/{id}', [LocationController::class, 'edit'])->name('loc.edit');
    Route::post('/update/{id}', [LocationController::class, 'update'])->name('loc.update');
});

Route::group(['prefix' => 'item-category'], function ($router) {
    Route::get('/', [ItemCategoryController::class, 'index'])->name('cat');
    Route::post('/store', [ItemCategoryController::class, 'store'])->name('cat.store');
    Route::get('/{id}', [ItemCategoryController::class, 'destroy'])->name('cat.destroy');
    Route::get('/edit/{id}', [ItemCategoryController::class, 'edit'])->name('cat.edit');
    Route::post('/update/{id}', [ItemCategoryController::class, 'update'])->name('cat.update');
});

Route::group(['prefix' => 'item'], function ($router) {
    Route::get('/', [ItemController::class, 'index'])->name('item');
    Route::post('/store', [ItemController::class, 'store'])->name('item.store');
    Route::get('/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
    Route::post('/update/{id}', [ItemController::class, 'update'])->name('item.update');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
