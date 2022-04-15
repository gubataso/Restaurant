<?php

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('root');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('category')->group(function(){
    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category_show');
    Route::post('/', [App\Http\Controllers\CategoryController::class, 'store'])->name('category_store');
    Route::delete('/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category_delete');
    Route::patch('/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category_update');

});
Route::prefix('food')->group(function(){
    Route::get('/', [App\Http\Controllers\FoodController::class, 'index'])->name('foods');
    Route::get('/create', [App\Http\Controllers\FoodController::class, 'create'])->name('food_create');
    Route::get('/{id}', [App\Http\Controllers\FoodController::class, 'show'])->name('food_show');
    Route::post('/', [App\Http\Controllers\FoodController::class, 'store'])->name('food_store');
    Route::delete('/{id}', [App\Http\Controllers\FoodController::class, 'delete'])->name('food_delete');
    Route::patch('/{id}', [App\Http\Controllers\FoodController::class, 'update'])->name('food_update');
});

Route::prefix('transaction')->group(function(){
    Route::get('/', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions');
    Route::get('{id}', [App\Http\Controllers\TransactionController::class, 'show'])->name('transaction_show');
    Route::post('/', [App\Http\Controllers\TransactionController::class, 'store'])->name('transaction_store');
    Route::delete('/{id}', [App\Http\Controllers\TransactionController::class, 'delete'])->name('transaction_delete');
    Route::patch('/{id}', [App\Http\Controllers\TransactionController::class, 'update'])->name('transaction_update');
});
Route::prefix('slot')->group(function(){
    Route::get('/', [App\Http\Controllers\SlotController::class, 'index'])->name('slots');
    Route::get('{id}', [App\Http\Controllers\SlotController::class, 'show'])->name('slot_show');
    Route::post('/', [App\Http\Controllers\SlotController::class, 'store'])->name('slot_store');
    Route::delete('/{id}', [App\Http\Controllers\SlotController::class, 'delete'])->name('slot_delete');
    Route::patch('/{id}', [App\Http\Controllers\SlotController::class, 'update'])->name('slot_update');
});
Route::prefix('profile')->group(function(){
    Route::get('/form', [App\Http\Controllers\ProfileController::class, 'create'])->name("profile-create-form");
    Route::patch('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile-update');
});