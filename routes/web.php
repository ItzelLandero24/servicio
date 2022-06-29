<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\alumnoController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\bajaController;
use App\Http\Controllers\calificacioneController;


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
    return view('welcome');
});

Route::view('admin/socioeconomico', 'encuesta')->name('socioeconomico');

Route::get('admin/registro/{dato}', [alumnoController::class, 'registro']);
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('login', '\TCG\Voyager\Http\Controllers\VoyagerAuthController@login')->name('login');
Route::view('registro',  'registro')->name('registrar');
Route::post('/registro',  [RegistrarController::class, 'registerUser'])->name('registrar');
Route::get('admin/calificacion/crear', [alumnoController::class, 'nuevacalificacion']);
Route::get('admin/calificacion/{alumno}', [alumnoController::class, 'calificacion'])->name('calificacion');
Route::get('admin/imprimir/{alumno}', [alumnoController::class, 'imprimir'])->name('imprimircalificacion');
Route::get('admin/calificacion/crear/{alumno}', [alumnoController::class, 'nuevacalificacion'])->name('nuevacalificacion');
Route::post('admin/calificacion/crear', [calificacioneController::class, 'crear']);



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('admin/baja/{dato}', [bajaController::class, 'baja']);
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
