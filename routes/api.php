<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProgramaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Rutas del componente de grupo
 */
Route::group([
    'prefix' => 'estudiante',
], function ($router) {
    Route::post('/save-estudiante', [EstudianteController::class, 'crearEstudiante']);
    Route::post('/update-estudiante', [EstudianteController::class, 'editarEstudiante']);
    Route::get('/traer-estudiante/{id}', [EstudianteController::class, 'traerEstudiante']);
    Route::get('/traer-estudiantes', [EstudianteController::class, 'traerEstudiantes']);
    Route::put('/editar-estudiante/{id}', [EstudianteController::class, 'editarEstudiante']);
    Route::delete('/delete-estudiante/{id}', [EstudianteController::class, 'eliminarEstudiante']);
});

/**
 * Rutas del componente de grupo
 */
Route::group([
    'prefix' => 'programa',
], function ($router) {
    Route::post('/save-programa', [ProgramaController::class, 'crearPrograma']);
    Route::post('/update-programa', [ProgramaController::class, 'editarPrograma']);
    Route::get('/traer-programa/{id}', [ProgramaController::class, 'traerPrograma']);
    Route::get('/traer-programas', [ProgramaController::class, 'traerProgramas']);
    Route::put('/editar-programa/{id}', [ProgramaController::class, 'editarPrograma']);
    Route::delete('/delete-programa/{id}', [ProgramaController::class, 'eliminarPrograma']);
});
