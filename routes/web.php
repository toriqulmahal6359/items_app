<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [CategoryController::class, 'index'])->name('dashboard');
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store'])->name('category.create');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/update-category', [CategoryController::class, 'update'])->name('category.edit');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('destroy');
    Route::get('/view', [ItemController::class, 'index']);
    Route::get('/show', [ItemController::class, 'show']);
    Route::get('/create', [ItemController::class, 'create']);
    Route::post('/store', [ItemController::class, 'store'])->name('items.create');
    Route::get('/edit/{id}', [ItemController::class, 'edit']);
    Route::post('/update', [ItemController::class, 'update'])->name('items.edit');
    Route::get('/delete/{id}', [ItemController::class, 'delete'])->name('destroy');
});
