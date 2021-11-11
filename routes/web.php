<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CierreDeCajaController;
use App\Http\Controllers\InscritosController;
use App\Http\Controllers\MaterialesController;

Route::get('/', HomeController::class);

Route::get('reportes', ReportesController::class);

Route::get('reportes/inscritos', InscritosController::class);
Route::get('reportes/inscritos/{inscrito}', [InscritosController::class, 'showInscrito']);
Route::get('reportes/inscritos/{inscrito}/QR', [InscritosController::class, 'showQR']);

Route::get('reportes/cierredecaja/evento', [CierreDeCajaController::class, 'CDCevento']);
Route::get('reportes/cierredecaja/diario', [CierreDeCajaController::class, 'CDCdiario']);

Route::get('reportes/materiales', MaterialesController::class);