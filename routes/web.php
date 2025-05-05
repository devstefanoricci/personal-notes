<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/notes/index', [App\Http\Controllers\NoteController::class, 'index'])->name('notes-index');
Route::get('/notes/show/{id}', [App\Http\Controllers\NoteController::class, 'show'])->name('notes-show')->middleware(['auth']);
Route::get('/notes/create', [App\Http\Controllers\NoteController::class, 'create'])->name('notes-create')->middleware(['auth']);
Route::post('/notes/store', [App\Http\Controllers\NoteController::class, 'store'])->name('notes-store')->middleware(['auth']);
Route::get('/notes/edit/{id}', [App\Http\Controllers\NoteController::class, 'edit'])->name('notes-edit')->middleware(['auth']);
Route::put('/notes/update/{id}', [App\Http\Controllers\NoteController::class, 'update'])->name('notes-update')->middleware(['auth']);
Route::delete('/notes/destroy/{id}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('notes-destroy')->middleware(['auth']);
