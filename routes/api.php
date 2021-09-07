<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Blogs\BlogController;
use App\Http\Controllers\Notes\NoteController;
use App\Http\Controllers\Notes\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories\CategoryController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'user']);

Route::prefix('blog')->group(function() {
	Route::get('', [BlogController::class, 'index']);
	Route::post('create', [BlogController::class, 'store']);
	Route::get('{blog:slug}', [BlogController::class, 'show']);
	Route::put('{blog:slug}', [BlogController::class, 'update']);
	Route::delete('{blog:slug}', [BlogController::class, 'destroy']);
});

Route::prefix('category')->group(function() {
	Route::get('', [CategoryController::class, 'index']);
	Route::post('create', [CategoryController::class, 'store']);
	Route::get('{category:slug}', [CategoryController::class, 'show']);
	Route::put('{category:slug}', [CategoryController::class, 'update']);
	Route::delete('{category:slug}', [CategoryController::class, 'destroy']);
});
