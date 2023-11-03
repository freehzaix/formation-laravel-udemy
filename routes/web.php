<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/nos-services', [PageController::class, 'service'])->name('service');
Route::get('/nous-contacter', [PageController::class, 'contact'])->name('contact');

//Classe
Route::get('/classe', [ClasseController::class, 'index'])->name('classe.index');
Route::post('/classe/add', [ClasseController::class, 'add'])->name('classe.add');
Route::get('/classe/{id}', [ClasseController::class, 'show'])->name('classe.show');
Route::post('/classe/edit', [ClasseController::class, 'edit'])->name('classe.edit');
Route::get('/classe/delete/{id}', [ClasseController::class, 'delete'])->name('classe.delete');

//Etudiant
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::post('/etudiant/add', [EtudiantController::class, 'add'])->name('etudiant.add');