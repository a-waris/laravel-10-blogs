<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    // Route::get('/article', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/article/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('/article', [ArticleController::class, 'store'])->name('articles.store');
    Route::patch('/article', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    
    Route::post('/comment', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__ . '/auth.php';