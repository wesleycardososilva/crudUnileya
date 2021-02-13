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


