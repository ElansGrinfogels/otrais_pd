<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\GenreController;



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

Route::get('/', [HomeController::class, 'index']);
Route::get('/authors', [AuthorController::class, 'list']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors/put', [AuthorController::class, 'put']);
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);
Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);


// Book routes
Route::get('/books', [BookController::class, 'list']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books/put', [BookController::class, 'put']);
Route::get('/books/update/{book}', [BookController::class, 'update']);
Route::post('/books/patch/{book}', [BookController::class, 'patch']);
Route::post('/books/delete/{book}', [BookController::class, 'delete']);

// genre routes
Route::get('/genre', [GenreController::class, 'list']);
Route::get('/genre/create', [GenreController::class, 'create']);
Route::post('/genre/put', [GenreController::class, 'put']);
Route::get('/genre/update/{book}', [GenreController::class, 'update']);
Route::post('/genre/patch/{book}', [GenreController::class, 'patch']);
Route::post('/genre/delete/{book}', [GenreController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthorizationController::class, 'login'])->name('login');
Route::post('/auth', [AuthorizationController::class, 'authenticate']);
Route::get('/logout', [AuthorizationController::class, 'logout']);


// Data routes
Route::prefix('data')->group(function () {
    Route::get('/get-top-books', [DataController::class, 'getTopBooks']);
    Route::get('/get-book/{book}', [DataController::class, 'getBook']);
    Route::get('/get-relatedbooks/{book}', [DataController::class, 'getRelatedBooks']);
   });
   