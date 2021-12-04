<?php


use Illuminate\Support\Facades\Route;

// LogIn - Register - Home page
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sessionController;

//Reportes
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CierreDeCajaController;
use App\Http\Controllers\InscritosController;
use App\Http\Controllers\MaterialesController;

//Gestion Administrativa
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ComiteController;

//Configuracion
use App\Http\Controllers\ConfiguracionController;



// LogIn - Register - Home
Route::get('/{rol}', UsuarioController::class);
Route::get('/home/welcom', HomeController::class);
Route::get('/login/form', [HomeController::class, 'login']);
Route::post('/login/validate', [sessionController::class, 'loginValidate']);
Route::get('/register/form', [HomeController::class, 'register']);

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
Route::get('GestionAdministrativa/GestionarRoles/{id}', [EventoController::class, 'showEditarRol']);
Route::post('GestionAdministrativa/GestionarRoles/{id}', [EventoController::class, 'saveEditarRol']);

//Configuracion
Route::get('configuracion/seleccion', ConfiguracionController::class);
Route::get('configuracion/crearevento', [EventoController::class, 'crearEvento']);
Route::post('configuracion/crearevento', [EventoController::class, 'crearEventoGuardar']);
Route::get('configuracion/adaptarevento', [EventoController::class, 'adaptarEvento']);
Route::get('configuracion/editarevento', [EventoController::class, 'editarEvento']);

//Asistencias
Route::get('responsabilidades/seleccion', [UsuarioController::class, 'listarEventos']);
Route::get('responsabilidades/tomarAsistencia/{id_evento}', [UsuarioController::class, 'tomarAsistencia']);
Route::get('responsabilidades/materialesAmbiente', [UsuarioController::class, 'materialesAmbiente']);











