<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //Muestra la pagina principal

Route::get('/calendario', [App\Http\Controllers\HomeController::class, 'mostrarCalendario'])->name('calendario'); //Muestra la pagina con el calendario

Route::get('/ruta/{fecha}', [HomeController::class, 'recibirFecha'])->name('formulario'); //Recibe la hora y fecha del calendario en la vista del formulario

Route::post('/confirmacion', [HomeController::class, 'enviarCorreo'])->name('confirmacion'); //Envia la informacion del formulario a una funcion para enviar el correo pero me da fallo al enviarlo porque no encuentra una vista

Route::get('/tarjeta', [App\Http\Controllers\HomeController::class, 'mostrarFormularioTarjeta'])->name('tarjeta'); //Muestra la pagina para añadir una nueva tarjeta

Route::post('/crear', [App\Http\Controllers\HomeController::class, 'crearTarjeta'])->name('crear'); //Inserto la tarjeta a la BBDD

Route::get('/reservas', [App\Http\Controllers\HomeController::class, 'mostrarReservas'])->name('reservas'); //Muestra las reservas del usuario

