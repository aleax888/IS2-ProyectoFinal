<?php

//Reportes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CierreDeCajaController;
use App\Http\Controllers\InscritosController;
use App\Http\Controllers\MaterialesController;

//Gestion Administrativa
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ComiteController;
use App\Http\Controllers\UsuarioController;

//Configuracion
use App\Http\Controllers\ConfiguracionController;



// LogIn - Register - Home
Route::get('/{rol}', HomeController::class);
//Route::get('/login', RegisterController::class);
//Route::get('/register', LogInController::class);

//Reportes
Route::get('reportes/seleccion', ReportesController::class);
Route::get('reportes/inscritos', InscritosController::class);
Route::get('reportes/inscritos/{inscrito}', [InscritosController::class, 'showInscrito']);
Route::get('reportes/inscritos/QR/{inscrito}', [InscritosController::class, 'showQR']);
Route::get('reportes/cierredecaja/evento/{idEvento}', [CierreDeCajaController::class, 'CDCevento']);
Route::get('reportes/cierredecaja/diario/{fecha}', [CierreDeCajaController::class, 'CDCdiario']);
Route::get('reportes/materiales', MaterialesController::class);

//Gestion Administrativa
Route::resource('GestionAdministrativa/Eventos', EventoController::class);
Route::resource('GestionAdministrativa/Comites', ComiteController::class);
Route::post('GestionAdministrativa/CrearComite/', [EventoController::class, 'GuardarComite']);
Route::get('GestionAdministrativa/ShowCrearComite/{id}', [EventoController::class, 'ShowGuardarComite']);
Route::get('GestionAdministrativa/GestionarRoles', [UsuarioController::class, 'mostrarUsuarios']);

//Configuracion
Route::get('configuracion/seleccion', ConfiguracionController::class);
Route::get('configuracion/crearevento', [EventoController::class, 'crearEvento']);
Route::get('configuracion/adaptarevento', [EventoController::class, 'adaptarEvento']);
Route::get('configuracion/editarevento', [EventoController::class, 'editarEvento']);











