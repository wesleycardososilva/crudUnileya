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

Route:: group(['middleware'=>'web'], function(){
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'] );
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route:: get('/autores',[App\Http\Controllers\AutoresController::class, 'index'])->name('autores')->middleware('auth');
Route:: get('/autores/novo',[App\Http\Controllers\AutoresController::class, 'novo'])->name('novo')->middleware('auth');
Route:: post('/autores/add',[App\Http\Controllers\AutoresController::class, 'add'])->name('criar')->middleware('auth');
Route:: get('/autores/{id}/edit',[App\Http\Controllers\AutoresController::class, 'edit'])->name('edit')->middleware('auth');
Route:: post('/autores/update/{id}',[App\Http\Controllers\AutoresController::class, 'update'])->name('update')->middleware('auth');
Route:: delete('/autores/delete/{id}',[App\Http\Controllers\AutoresController::class, 'delete'])->name('delete')->middleware('auth');

Route:: get('/livros',[App\Http\Controllers\LivrosController::class, 'index'])->name('Livros')->middleware('auth');
Route:: get('/livros/novo',[App\Http\Controllers\LivrosController::class, 'novo'])->name('novo')->middleware('auth');
Route:: post('/livros/add',[App\Http\Controllers\LivrosController::class, 'add'])->name('criar')->middleware('auth');
Route:: get('/livros/{id}/edit',[App\Http\Controllers\LivrosController::class, 'edit'])->name('edit')->middleware('auth');
Route:: post('/livros/update/{id}',[App\Http\Controllers\LivrosController::class, 'update'])->name('update')->middleware('auth');
Route:: delete('/livros/delete/{id}',[App\Http\Controllers\LivrosController::class, 'delete'])->name('delete')->middleware('auth');

Route:: get('/generos',[App\Http\Controllers\GenerosController::class, 'index'])->name('generos')->middleware('auth');
Route:: get('/generos/novo',[App\Http\Controllers\GenerosController::class, 'novo'])->name('novo')->middleware('auth');
Route:: post('/generos/add',[App\Http\Controllers\GenerosController::class, 'add'])->name('criar')->middleware('auth');
Route:: get('/genero/{id}/edit',[App\Http\Controllers\GenerosController::class, 'edit'])->name('edit')->middleware('auth');
Route:: post('/generos/update/{id}',[App\Http\Controllers\GenerosController::class, 'update'])->name('update')->middleware('auth');
Route:: delete('/genero/delete/{id}',[App\Http\Controllers\GenerosController::class, 'delete'])->name('delete')->middleware('auth');

Route:: get('/editoras',[App\Http\Controllers\EditorasController::class, 'index'])->name('editoras')->middleware('auth');
Route:: get('/editoras/novo',[App\Http\Controllers\EditorasController::class, 'novo'])->name('novo')->middleware('auth');
Route:: post('/editoras/add',[App\Http\Controllers\EditorasController::class, 'add'])->name('criar')->middleware('auth');
Route:: get('/editora/{id}/edit',[App\Http\Controllers\EditorasController::class, 'edit'])->name('edit')->middleware('auth');
Route:: post('/editoras/update/{id}',[App\Http\Controllers\EditorasController::class, 'update'])->name('update')->middleware('auth');
Route:: delete('/editoras/delete/{id}',[App\Http\Controllers\EditorasController::class, 'delete'])->name('delete')->middleware('auth');


Route:: get('/livros',[App\Http\Controllers\LivrosController::class, 'index'])->name('livros')->middleware('auth');
Route:: get('/livros/novo',[App\Http\Controllers\LivrosController::class, 'novo'])->name('novo')->middleware('auth');
Route:: post('/livros/add',[App\Http\Controllers\LivrosController::class, 'add'])->name('criar')->middleware('auth');
Route:: get('/livros/{id}/edit',[App\Http\Controllers\LivrosController::class, 'edit'])->name('edit')->middleware('auth');
Route:: post('/livros/update/{id}',[App\Http\Controllers\LivrosController::class, 'update'])->name('update')->middleware('auth');
Route:: delete('/livros/delete/{id}',[App\Http\Controllers\LivrosController::class, 'delete'])->name('delete')->middleware('auth');
