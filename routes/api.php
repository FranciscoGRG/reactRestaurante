<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/calendario', [App\Http\Controllers\HomeController::class, 'mostrarCalendario'])->name('calendario'); //Muestra la pagina con el calendario


Route::POST('/login', [App\Http\Controllers\Api\AuthController::class, 'loginUser'])->name('login');
Route::POST('/register', [App\Http\Controllers\Api\AuthController::class, 'createUser'])->name('register');
Route::POST('/noLoginReserve', [App\Http\Controllers\Api\EventController::class, 'noLoginReserve'])->name('noLoginReserve');


Route::middleware('auth:sanctum')->group(function () {
    Route::POST('/createCards', [App\Http\Controllers\Api\EventController::class, 'createCards'])->name('createCards');
    Route::GET('/getCreditCard', [App\Http\Controllers\Api\EventController::class, 'getCreditCard'])->name('getCreditCard');
    Route::POST('/createReserve', [App\Http\Controllers\Api\EventController::class, 'createReserve'])->name('createReserve');
    Route::GET('/events', [App\Http\Controllers\Api\EventController::class, 'getEvents'])->name('events');
    Route::DELETE('/deleteReserve', [App\Http\Controllers\Api\EventController::class, 'deleteReserve'])->name('deleteReserve');

    Route::POST('/createReserve', [App\Http\Controllers\Api\EventController::class, 'createReserve'])->name('createReserve');

    Route::DELETE('/deleteCard', [App\Http\Controllers\Api\EventController::class, 'deleteCreditCard'])->name('deleteCreditCard');
});
