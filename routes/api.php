<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Blogs\BlogController;
use App\Http\Controllers\Notes\NoteController;
use App\Http\Controllers\Notes\SubjectController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('notes')->group(function() {
	Route::get('', [NoteController::class, 'index']);
	Route::post('create-new-note', [NoteController::class, 'store']);
	Route::get('{note:slug}', [NoteController::class, 'show'])->name('notes.show');
	Route::patch('{note:slug}/edit', [NoteController::class, 'update']);
	Route::delete('{note:slug}/delete', [NoteController::class, 'destroy']);
});

Route::prefix('subjects')->group(function() {
	Route::get('', [SubjectController::class, 'index']);
});
