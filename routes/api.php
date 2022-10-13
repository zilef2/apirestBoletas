<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App/Http/Controllers/BoletaController as bole;
use App\Http\Resources\BoletaResource;
use App\Models\Boleta;
// use App\Http\Controllers\Api;
use app\Http\Controllers\BoletasController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('api/boleta', BoletaController::class)
//       ->only(['index','show', 'destroy']);

Route::resource('Boletas', 'App\Http\Controllers\BoletasController');