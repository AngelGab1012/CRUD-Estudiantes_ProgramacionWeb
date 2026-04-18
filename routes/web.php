<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;


// Ruta para la vista principal de la pagina
Route::get('/', [ViewController::class, 'index'])->name('index');

// Rutas utilizadas para CRUD Estudiantes
Route::get('/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiante/create', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiante', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('/estudiante/{id}/edit', [EstudianteController::class, 'edit'])->name('estudiante.edit');
Route::put('/estudiante/{id}/edit', [EstudianteController::class, 'update'])->name('estudiante.update');
Route::delete('/estudiante/{id}/delete', [EstudianteController::class, 'delete'])->name('estudiante.delete');

// Rutas utilizadas para CRUD Carreras
Route::get('/carrera', [CarreraController::class, 'index'])->name('carrera.index');
Route::get('/carrera/create', [CarreraController::class, 'create'])->name('carrera.create');
Route::post('/carrera', [CarreraController::class, 'store'])->name('carrera.store');
Route::get('/carrera/{id}/edit', [CarreraController::class, 'edit'])->name('carrera.edit');
Route::put('/carrera/{id}/edit', [CarreraController::class, 'update'])->name('carrera.update');
Route::delete('/carrera/{id}/delete', [CarreraController::class, 'delete'])->name('carrera.delete');