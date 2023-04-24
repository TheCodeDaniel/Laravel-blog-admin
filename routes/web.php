<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', [AdminController::class, 'index']);

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dash');
Route::get('/createPage', [AdminController::class, 'createPage'])->name('create.page');
Route::get('/blog_set/{id}', [AdminController::class, 'blog_set'])->name('set');

// function routes
Route::post('/login', [AdminController::class, 'login']);
Route::post('/create', [AdminController::class, 'create']);
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
Route::delete('/deletepost/{id}', [AdminController::class, 'deletepost'])->name('deletepost');
// admin logout
Route::get('/logout', [AdminController::class, 'logout']);
