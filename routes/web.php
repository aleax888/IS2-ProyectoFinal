<?php


use Illuminate\Support\Facades\Route;

// LogIn - Register - Home page
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;

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
Route::get('/home/welcome', HomeController::class);
Route::get('/login/form', [HomeController::class, 'login']);
//Route::get('/perfil/rol/{id}', [SessionController::class, 'perfil']);
Route::post('/perfil/rol', [SessionController::class, 'loginValidate']);
Route::get('/register/form', [HomeController::class, 'register']);
Route::post('/register/form', [SessionController::class, 'register']);

//Reportes
Route::get('reportes/seleccion', ReportesController::class);
Route::get('reportes/inscritos', InscritosController::class);
Route::get('reportes/inscritos/{inscrito}', [InscritosController::class, 'showInscrito']);
Route::get('reportes/inscritos/QR/{inscrito}', [InscritosController::class, 'showQR']);
Route::get('reportes/cierredecaja/evento/{idEvento}', [CierreDeCajaController::class, 'CDCevento']);
Route::get('reportes/cierredecaja/diario/{fecha}', [CierreDeCajaController::class, 'CDCdiario']);
Route::get('reportes/materiales', MaterialesController::class);

//Gestion Administrativa
//Route::resource('GestionAdministrativa/Eventos', EventoController::class);
Route::get('GestionAdministrativa/Eventos', [EventoController::class, 'ShowEventosGestionAdministrativa']);
Route::get('GestionAdministrativa/Evento/{id_evento}', [EventoController::class, 'ShowMenuGestionAdministrativa']);
Route::post('GestionAdministrativa/CrearComite', [EventoController::class, 'GuardarComite']);
Route::post('GestionAdministrativa/EditarComite', [EventoController::class, 'EditarComite']);
Route::get('GestionAdministrativa/EliminarComite/{id_comite}/{id_evento}', [EventoController::class, 'EliminarComite']);
Route::post('GestionAdministrativa/EditarRol/{id_evento}', [EventoController::class, 'EditarRol']);


Route::resource('GestionAdministrativa/Comites', ComiteController::class);
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

//Inscripciones
Route::get('eventos/seleccion/{id_usuario}', [UsuarioController::class, 'listarEventos2']);
Route::post('eventos/seleccion', [UsuarioController::class, 'preins']);
Route::get('preinscripciones/seleccion/{id_usuario}', [UsuarioController::class, 'verPreinscripciones']);
Route::get('inscripcion/form/{id_usuario}/{id_evento}', [UsuarioController::class, 'inscripcion']);

// -----  Route::get('preinscripcion/form/{id_usuario}', [UsuarioController::class, 'preins']);










