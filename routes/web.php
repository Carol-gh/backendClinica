<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\citaController;
use App\Http\Controllers\documentoController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\medicoController;
use App\Http\Controllers\pacienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\roleController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', roleController::class)->names('roles');
Route::resource('users', UserController::class)->names('users');
Route::resource('medicos', medicoController::class)->names('medicos');
Route::get('medicos/especialidad/{id}', [medicoController::class, 'especialidad']);
Route::post('medicos/esp_store', [medicoController::class, 'esp_store']);
Route::resource('pacientes', pacienteController::class)->names('pacientes');
Route::resource('citas', citaController::class)->names('citas');
Route::resource('historias', HistoriaController::class)->names('historias');
Route::get('citas/diagnostico/{id}', [citaController::class, 'diagnostico']);
Route::post('citas/diag_store/{id}', [citaController::class, 'diag_store']);
Route::delete('historias/elim_archivo/{id}', [HistoriaController::class, 'elim_archivo']);
Route::resource('documentos', documentoController::class)->names('documentos');
Route::resource('Bitacora',BitacoraController::class)->names('Bitacora');