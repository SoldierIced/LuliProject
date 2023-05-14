<?php

use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\TurnoController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/test', [TestController::class, 'test'])->name('test'); //pag principal



Route::get('/turno', [TestController::class, 'turno'])->name('turno'); //futura pagina de confirmacion de turno



Route::post('/save-turno', [TestController::class, 'saveturno'])->name ('guardar-turno');
//accion de guardar el turno

//ruta para mostrar los turnos
Route::get('/mostrarturno', [TestController::class, 'mostrarturno'])->name('mostrarturno');

//ruta pal admin
Route::get('/admin/turnos', [TurnoController::class, 'tablaestado'])->name('admin-turnos');

Route::post('/admin/turnos/guardar', [TurnoController::class, 'guardarestado'])->name('admin-turnos-guardar');

Route::get('/admin/servicios', [ServicioController::class, 'agregarnuevoservicio'])->name('admin-servicios');
Route::post('/admin/servicios/guardar', [ServicioController::class, 'guardar'])->name('admin-servicios-guardar');
Route::post('/admin/servicios/eliminar', [ServicioController::class, 'eliminar'])->name('admin-servicios-eliminar');
Route::post('/admin/servicios/modificar', [ServicioController::class, 'modificar'])->name('admin-servicios-modificar');

Route::get('/admin/servicios/historial', [ServicioController::class, 'mostrarhistorialservicio'])->name('admin-servicios-historial');

