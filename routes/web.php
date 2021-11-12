<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CierreDeCajaController;
use App\Http\Controllers\InscritosController;
use App\Http\Controllers\MaterialesController;


use App\Http\Controllers\EventoController;
use App\Http\Controllers\ComiteController;
use App\Http\Controllers\UsuarioController;



Route::get('/', HomeController::class);

//Reportes
Route::get('reportes', ReportesController::class);
Route::get('reportes/inscritos', InscritosController::class);
Route::get('reportes/inscritos/{inscrito}', [InscritosController::class, 'showInscrito']);
Route::get('reportes/inscritos/{inscrito}/QR', [InscritosController::class, 'showQR']);
Route::get('reportes/cierredecaja/evento', [CierreDeCajaController::class, 'CDCevento']);
Route::get('reportes/cierredecaja/diario', [CierreDeCajaController::class, 'CDCdiario']);
Route::get('reportes/materiales', MaterialesController::class);

//Gestion Administrativa
Route::resource('GestionAdministrativa/Eventos', EventoController::class);
Route::resource('GestionAdministrativa/Comites', ComiteController::class);
Route::post('GestionAdministrativa/CrearComite/', [EventoController::class, 'GuardarComite']);
Route::get('GestionAdministrativa/ShowCrearComite/{id}', [EventoController::class, 'ShowGuardarComite']);
Route::get('GestionAdministrativa/GestionarRoles', [UsuarioController::class, 'mostrarUsuarios']);