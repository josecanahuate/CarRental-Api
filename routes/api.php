<?php

use App\Http\Controllers\API\AutenticarController;
use App\Http\Controllers\API\ReservationsController;
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

Route::post('register', [AutenticarController::class, 'register']);
Route::post('login', [AutenticarController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('logout', [AutenticarController::class, 'logout']); 
    Route::get("/reservations", [ReservationsController::class, 'index']); // ver todas las reservas
    Route::post("/reservations", [ReservationsController::class, 'store']); // almacenar una reserva
    Route::get("/reservations/{id}", [ReservationsController::class, 'show']); // ver una reserva
    Route::put("/reservations/{id}", [ReservationsController::class, 'update']); // actualizar una reserva - PUT
    Route::delete("/reservations/{id}", [ReservationsController::class, 'destroy']); // eliminar una reserva -- DELETE
});