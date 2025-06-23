<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    CicloController,
    CursoController,
    MaterialController,
    MatriculaController
};

// Redirección inicial
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('ciclos.index')
        : redirect()->route('login');
});

// Rutas protegidas (requieren login y verificación)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * ACCESO GENERAL (admin o estudiante)
     */
    Route::get('/ciclos', [CicloController::class, 'index'])->name('ciclos.index');
    Route::get('/ciclos/{ciclo}', [CursoController::class, 'porCiclo'])->name('cursos.porCiclo');

    /**
     * VER CURSO
     * - Admin accede libremente
     * - Estudiante solo si está matriculado (usamos middleware CheckMatricula)
     */
   Route::get('/curso/{curso}', [CursoController::class, 'show'])
    ->middleware('check.matricula')
    ->name('curso.show');


    /**
     * MATRÍCULA (solo usuarios autenticados)
     */
    Route::get('/curso/{curso}/matricula', [MatriculaController::class, 'formulario'])
        ->name('matricula.formulario');

    Route::post('/curso/{curso}/matricula', [MatriculaController::class, 'matricular'])
        ->name('matricula.enviar');

    /**
     * GESTIÓN DE MATERIALES (solo administradores)
     */
    Route::middleware(['admin'])->group(function () {
        Route::get('/material/upload/{curso}', [MaterialController::class, 'create'])->name('material.create');

        Route::post('/material/upload', [MaterialController::class, 'store'])->name('material.store');
    });

});
