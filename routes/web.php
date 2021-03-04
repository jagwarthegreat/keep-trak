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
    Route::get('/', [UserController::class, 'index'])->middleware(['auth'])->name('user');
    Route::post('/store', [UserController::class, 'user_store'])->middleware(['auth']);
    Route::get('/{user_id}', [UserController::class, 'user_destroy'])->middleware(['auth'])->name('user.destroy');
    Route::get('/edit/{user_id}', [UserController::class, 'user_edit'])->middleware(['auth'])->name('user.edit');
    Route::post('/update/{user_id}', [UserController::class, 'user_update'])->middleware(['auth'])->name('user.update');
});

Route::group(['prefix' => 'location'], function ($router) {
    Route::get('/', [LocationController::class, 'index'])->middleware(['auth'])->name('loc');
    Route::post('/store', [LocationController::class, 'store'])->middleware(['auth'])->name('loc.store');
    Route::get('/{id}', [LocationController::class, 'destroy'])->middleware(['auth'])->name('loc.destroy');
    Route::get('/edit/{id}', [LocationController::class, 'edit'])->middleware(['auth'])->name('loc.edit');
    Route::post('/update/{id}', [LocationController::class, 'update'])->middleware(['auth'])->name('loc.update');
});

Route::group(['prefix' => 'item-category'], function ($router) {
    Route::get('/', [ItemCategoryController::class, 'index'])->middleware(['auth'])->name('cat');
    Route::post('/store', [ItemCategoryController::class, 'store'])->middleware(['auth'])->name('cat.store');
    Route::get('/{id}', [ItemCategoryController::class, 'destroy'])->middleware(['auth'])->name('cat.destroy');
    Route::get('/edit/{id}', [ItemCategoryController::class, 'edit'])->middleware(['auth'])->name('cat.edit');
    Route::post('/update/{id}', [ItemCategoryController::class, 'update'])->middleware(['auth'])->name('cat.update');
});

Route::group(['prefix' => 'item'], function ($router) {
    Route::get('/', [ItemController::class, 'index'])->middleware(['auth'])->name('item');
    Route::post('/store', [ItemController::class, 'store'])->middleware(['auth'])->name('item.store');
    Route::get('/{id}', [ItemController::class, 'destroy'])->middleware(['auth'])->name('item.destroy');
    Route::get('/edit/{id}', [ItemController::class, 'edit'])->middleware(['auth'])->name('item.edit');
    Route::post('/update/{id}', [ItemController::class, 'update'])->middleware(['auth'])->name('item.update');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
