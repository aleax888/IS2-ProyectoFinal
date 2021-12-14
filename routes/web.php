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
use App\Http\Controllers\ActividadController; // (CD14)
use App\Http\Controllers\AmbienteController; // (CD10)
use App\Http\Controllers\DtlleActividadController;
use App\Http\Controllers\CajaController;



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
Route::get('unirse/comite/{id_usuario}', [ComiteController::class, 'unirseComite']);
Route::post('unirse/comite/{id_usuario}', [ComiteController::class, 'unirseComiteGuardar']);


//Configuracion
Route::get('configuracion/seleccion', ConfiguracionController::class);
//CNFG: Evento
Route::get('configuracion/eventos', [EventoController::class, 'verEventos']); // (PT24)
Route::get('configuracion/datosevento/{id}', [EventoController::class, 'verDatosEvento']); // (PT25)
Route::get('configuracion/detalleseventos/{id}', [EventoController::class, 'verDetallesEvento']); // (PT26)
Route::get('configuracion/crearevento', [EventoController::class, 'mostrarCrearEvento']); // (PT15)
Route::post('configuracion/crearevento', [EventoController::class, 'crearEventoGuardar']); // (PT16)
Route::get('configuracion/adaptarevento/{id}', [EventoController::class, 'mostrarAdaptarEvento']); // (PT17)
Route::post('configuracion/adaptarevento/{id}', [EventoController::class, 'adaptarEventoGuardar']); // (PT27)
Route::get('configuracion/editarevento/{id}', [EventoController::class, 'mostrarEditarEvento']); // (PT18)
Route::post('configuracion/editarevento/{id}', [EventoController::class, 'editarEventoGuardar']); // (PT28)
//CNFG: Actividad
Route::get('configuracion/actividades', [ActividadController::class, 'verActividades']); // (PT36)
Route::get('configuracion/datosactividad/{id}', [ActividadController::class, 'verDatosActividad']); // (PT37)
Route::get('configuracion/crearactividad', [ActividadController::class, 'mostrarCrearActividad']); // (PT38)
Route::post('configuracion/crearactividad', [ActividadController::class, 'crearActividadGuardar']); // (PT39)
Route::get('configuracion/editaractividad/{id}', [ActividadController::class, 'mostrarEditarActividad']); // (PT40)
Route::post('configuracion/editaractividad/{id}', [ActividadController::class, 'editarActividadGuardar']); // (PT41)
//CNFG: Ambiente
Route::get('configuracion/ambientes', [AmbienteController::class, 'verAmbientes']); // (PT29)
Route::get('configuracion/datosambiente/{id}', [AmbienteController::class, 'verDatosAmbiente']); // (PT30)
Route::get('configuracion/crearambiente', [AmbienteController::class, 'mostrarCrearAmbiente']); // (PT31)
Route::post('configuracion/crearambiente', [AmbienteController::class, 'crearAmbienteGuardar']); // (PT31)
Route::get('configuracion/adaptarambiente/{id}', [AmbienteController::class, 'mostrarAdaptarAmbiente']); // (PT34)
Route::post('configuracion/adaptarambiente/{id}', [AmbienteController::class, 'adaptarAmbienteGuardar']); // (PT35)
Route::get('configuracion/editarambiente/{id}', [AmbienteController::class, 'mostrarEditarAmbiente']); // (PT32)
Route::post('configuracion/editarambiente/{id}', [AmbienteController::class, 'editarAmbienteGuardar']); // (PT33)
//CNFG: Material
Route::get('configuracion/materiales', [MaterialesController::class, 'verMateriales']); // (PT42)
Route::get('configuracion/datosmaterial/{id}', [MaterialesController::class, 'verDatosMaterial']); // (PT43)
Route::get('configuracion/crearmaterial', [MaterialesController::class, 'mostrarCrearMaterial']); // (PT44)
Route::post('configuracion/crearmaterial', [MaterialesController::class, 'crearMaterialGuardar']); // (PT45)
Route::get('configuracion/editarmaterial/{id}', [MaterialesController::class, 'mostrarEditarMaterial']); // (PT46)
Route::post('configuracion/editarmaterial/{id}', [MaterialesController::class, 'editarMaterialGuardar']); // (PT47)

//Asistencias
Route::get('responsabilidades/seleccion/{id_usuario}', [UsuarioController::class, 'listarEventos']);
Route::get('responsabilidades/tomarAsistencia/{id_evento}', [UsuarioController::class, 'tomarAsistencia']);
Route::get('responsabilidades/materialesAmbiente', [UsuarioController::class, 'materialesAmbiente']);
Route::post('responsabilidades/materialesAmbiente', [UsuarioController::class, 'materialesAmbienteGuardar']);

//Inscripciones
Route::get('eventos/seleccion/{id_usuario}', [UsuarioController::class, 'listarEventos2']);
Route::post('eventos/seleccion', [UsuarioController::class, 'preins']);
Route::get('preinscripciones/seleccion/{id_usuario}', [UsuarioController::class, 'verPreinscripciones']);
Route::get('inscripcion/form/{id_usuario}/{id_evento}', [UsuarioController::class, 'inscripcion']);
Route::post('inscripcion/form/{id_usuario}/{id_evento}', [UsuarioController::class, 'inscripcionGuardar']);

//Caja
Route::get('eventos/escoger/{id_usuario}', [CajaController::class, 'caja']);
Route::get('ver/transacciones/{id_evento}/{id_usuario}', [CajaController::class, 'verTransacciones']);
Route::get('registrar/gasto/{id_evento}/{id_usuario}', [CajaController::class, 'registrarGasto']);
Route::post('registrar/gasto/{id_evento}/{id_usuario}', [CajaController::class, 'registrarGastoGuardar']);









