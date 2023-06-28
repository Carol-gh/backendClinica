<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\roleController;
use App\Http\Controllers\API\medicoController;
use App\Http\Controllers\API\pacienteController;
use App\Http\Controllers\API\citaController;
use App\Http\Controllers\API\HistoriaController;
use App\Http\Controllers\API\BitacoraController;
use App\Http\Controllers\API\documentoController;
use App\Http\Controllers\API\RegisterController;
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

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);


Route::get('/roles', [roleController::class, 'index']);
Route::get('/roles/create', [roleController::class, 'create']);
Route::post('/roles', [roleController::class, 'store']);
Route::get('/roles/{id}', [roleController::class, 'show']);
Route::get('/roles/{id}/edit', [roleController::class, 'edit']);
Route::put('/roles/{role}', [roleController::class, 'update']);
Route::delete('/roles/{id}', [roleController::class, 'destroy']);

Route::get('/medicos', [medicoController::class, 'index']);
Route::get('/medicos/create', [medicoController::class, 'create']);
Route::post('/medicos', [medicoController::class, 'store']);
Route::get('/medicos/{id}', [medicoController::class, 'show']);
Route::get('/medicos/{id}/edit', [medicoController::class, 'edit']);
Route::put('/medicos/{id}', [medicoController::class, 'update']);
Route::delete('/medicos/{id}', [medicoController::class, 'destroy']);
Route::post('/medicos/especialidad', [medicoController::class, 'esp_store']);
Route::get('/medicos/{id}/especialidad', [medicoController::class, 'especialidad']);

Route::get('/pacientes', [pacienteController::class, 'index']);
Route::get('/pacientes/{id}', [pacienteController::class, 'show']);
Route::get('/pacientes/{id}/edit', [pacienteController::class, 'edit']);
Route::post('/pacientes', [pacienteController::class, 'store']);
Route::put('/pacientes/{id}', [pacienteController::class, 'update']);
Route::delete('/pacientes/{id}', [pacienteController::class, 'destroy']);

Route::get('/citas', [citaController::class, 'index']);
Route::get('/citas/create', [citaController::class, 'create']);
Route::post('/citas', [citaController::class, 'store']);
Route::get('/citas/{id}', [citaController::class, 'show']);
Route::get('/citas/{id}/edit', [citaController::class, 'edit']);
Route::put('/citas/{id}', [citaController::class, 'update']);
Route::delete('/citas/{id}', [citaController::class, 'destroy']);
Route::get('/citas/{id}/diagnostico', [citaController::class, 'diagnostico']);
Route::post('/citas/diagnostico/{id}', [citaController::class, 'diag_store']);

Route::get('/historias', [HistoriaController::class, 'index']);
Route::get('/historias/create', [HistoriaController::class, 'create']);
Route::post('/historias', [HistoriaController::class, 'store']);
Route::get('/historias/{id}', [HistoriaController::class, 'show']);
Route::get('/historias/{id}/edit', [HistoriaController::class, 'edit']);
Route::put('/historias/{id}', [HistoriaController::class, 'update']);
Route::delete('/historias/{id}', [HistoriaController::class, 'destroy']);
Route::delete('/historias/documentos/{id}', [HistoriaController::class, 'elim_archivo']);

Route::get('/bitacora', [BitacoraController::class, 'index']);

Route::get('/documentos/{id}', [DocumentoController::class, 'show']);
Route::delete('/documentos/{id}', [DocumentoController::class, 'destroy']);

Route::post('/register', [RegisterController::class, 'create']);