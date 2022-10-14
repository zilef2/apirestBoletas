<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\BoletaResource;
use App\Models\Boleta;
use app\Http\Controllers\BoletasController;
use app\Http\Controllers\SorteoController;

//NOTA: Boletas.show trae las ultimas voletas de un sorteo dado(sorteo_id)
//NOTA: Sorteps.show trae los ultimos sorteos disponibles
Route::resource('Boletas', 'App\Http\Controllers\BoletasController');
Route::resource('Sorteo', 'App\Http\Controllers\SorteoController');