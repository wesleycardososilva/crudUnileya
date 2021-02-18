<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/autores', [App\Http\Controllers\AutoresController::class, 'index'])->name('autores');
Route::get('/autores/{id}', [App\Http\Controllers\AutoresController::class, 'get'])->name('get');
Route::post('/autores/add', [App\Http\Controllers\AutoresController::class, 'add'])->name('criar');
Route::post('/autores/update/{id}', [App\Http\Controllers\AutoresController::class, 'update'])->name('update');
Route::delete('/autores/delete/{id}', [App\Http\Controllers\AutoresController::class, 'delete'])->name('delete');

Route::get('/generos', [App\Http\Controllers\GenerosController::class, 'index'])->name('generos');
Route::get('/generos/{id}', [App\Http\Controllers\GenerosController::class, 'get'])->name('get');
Route::post('/generos/add', [App\Http\Controllers\GenerosController::class, 'add'])->name('criar');
Route::get('/genero/{id}/edit', [App\Http\Controllers\GenerosController::class, 'edit'])->name('edit');
Route::post('/generos/update/{id}', [App\Http\Controllers\GenerosController::class, 'update'])->name('update');
Route::delete('/generos/delete/{id}', [App\Http\Controllers\GenerosController::class, 'delete'])->name('delete');

Route::get('/editoras', [App\Http\Controllers\EditorasController::class, 'index'])->name('editoras');
Route::get('/editoras/{id}', [App\Http\Controllers\EditorasController::class, 'get'])->name('get');
Route::post('/editoras/add', [App\Http\Controllers\EditorasController::class, 'add'])->name('add');
Route::post('/editoras/update/{id}', [App\Http\Controllers\EditorasController::class, 'update'])->name('update');
Route::delete('/editoras/delete/{id}', [App\Http\Controllers\EditorasController::class, 'delete'])->name('delete');

Route::get('/livros', [App\Http\Controllers\LivrosController::class, 'index'])->name('livros');
Route::get('/livros/{id}', [App\Http\Controllers\LivrosController::class, 'get'])->name('get');
Route::post('/livros/add', [App\Http\Controllers\LivrosController::class, 'add'])->name('add');
Route::post('/livros/update/{id}', [App\Http\Controllers\LivrosController::class, 'update'])->name('update');
Route::delete('/livros/delete/{id}', [App\Http\Controllers\LivrosController::class, 'delete'])->name('delete');
