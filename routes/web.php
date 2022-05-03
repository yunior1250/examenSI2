<?php

use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\consultaController;
use App\Http\Controllers\espController;
use App\Http\Controllers\historicoController;
use App\Http\Controllers\medController;
use App\Http\Controllers\pacienteController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
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

Route::resource('users', userController::class)->names('users');

Route::resource('esps', espController::class)->names('esps');

Route::resource('medicos', medController::class)->names('medicos');

Route::resource('pacientes', pacienteController::class)->names('pacientes');

Route::resource('consulta', consultaController::class)->names('consulta');

Route::resource('historias', historicoController::class)->names('historias');


Route::resource('bitacora', bitacoraController::class)->names('bitacora');
