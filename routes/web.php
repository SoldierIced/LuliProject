<?php

use App\Http\Controllers\AdminTurnoController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\TurnoController;
use App\Http\Middleware\Authenticate;

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
    return redirect()->route("home");
});

Route::any('/logout', function () {
    Auth::logout();
    return redirect()->route("home");
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ruta para mostrar los turnos
Route::prefix('turnos')->group(function () { // rutas del admin
    Route::get('/', [TurnoController::class, 'turnosView'])->name('turnos');
    Route::get('/nuevo', [TurnoController::class, 'turnosNewView'])->name('turnos-new-view');
    Route::post('/update', [TurnoController::class, 'turnoSave'])->name('guardar-turno');
})->middleware(Authenticate::class);



Route::prefix('admin')->group(function () { // rutas del admin

    Route::prefix('turnos')->group(function () { //rutas de los admin -> turnos
        Route::get('/', [AdminTurnoController::class, 'turnosView'])->name('admin-turnos');
        Route::post('update', [AdminTurnoController::class, 'turnosUpdate'])->name('admin-turnos-guardar');
    });
    Route::prefix('servicios')->group(function () { //rutas de los admin -> turnos
        Route::get('/', [ServiciosController::class, 'view'])->name('servicios-view');


    });


})->middleware(Authenticate::class);

//ruta pal admin
