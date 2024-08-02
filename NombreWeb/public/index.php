<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PublicController;
use Controllers\AuthController;
use Controllers\NoticiasController;
use Controllers\ServiciosController;
use Controllers\UsuarioController;
use Controllers\PresupuestosController;
use Controllers\CategoriaController;

$router = new Router();

// Página publicas
$router->get('/', [PublicController::class, 'index']);
$router->get('/noticias', [PublicController::class, 'noticias']);
//$router->get('/noticia', [PublicController::class, 'noticia']);
$router->get('/servicios', [PublicController::class, 'servicios']);
$router->get('/servicio', [PublicController::class, 'servicio']);
$router->get('/contacto', [PublicController::class, 'contacto']);

// Páginas privadas
$router->get('/area_cliente', [UsuarioController::class, 'area_cliente']);
$router->post('/area_cliente', [UsuarioController::class, 'area_cliente']);
$router->get('/dashboard', [UsuarioController::class, 'dashboard']);

// Presupuestos
$router->get('/calcular_presupuesto', [PresupuestosController::class, 'calcular']);
$router->post('/calcular_presupuesto', [PresupuestosController::class, 'calcular']);
$router->get('/presupuesto_aceptar', [PresupuestosController::class, 'aceptar']);
$router->get('/presupuesto_cancelar', [PresupuestosController::class, 'rechazar']);
$router->get('/presupuesto_pendiente', [PresupuestosController::class, 'pendiente']);


// Gestion de Noticias
// Noticia VER
$router->get('/noticia', [NoticiasController::class, 'noticia']);

// Noticia NUEVA
$router->get('/noticia_nueva', [NoticiasController::class, 'nueva']);
$router->post('/noticia_nueva', [NoticiasController::class, 'nueva']);

// Noticia EDITAR
$router->get('/noticia_editar', [NoticiasController::class, 'editar']);
$router->post('/noticia_editar', [NoticiasController::class, 'editar']);

// Noticia ELIMINAR
$router->get('/noticia_eliminar', [NoticiasController::class, 'eliminar']);

//Gestion de categorias
// categorias NUEVA
$router->get('/categoria_nueva', [CategoriaController::class, 'nueva']);
$router->post('/categoria_nueva', [CategoriaController::class, 'nueva']);

// categorias EDITAR
$router->get('/categoria_editar', [CategoriaController::class, 'editar']);
$router->post('/categoria_editar', [CategoriaController::class, 'editar']);

// categorias ELIMINAR
$router->get('/categoria_eliminar', [CategoriaController::class, 'eliminar']);


// Gestion de Servicios
// Nuevo
$router->get('/servicio_nuevo', [ServiciosController::class, 'nuevo_servicio']);
$router->post('/servicio_nuevo', [ServiciosController::class, 'nuevo_servicio']);

// Editar
$router->get('/servicio_editar', [ServiciosController::class, 'editar_servicio']);
$router->post('/servicio_editar', [ServiciosController::class, 'editar_servicio']);

// Eliminar
$router->get('/servicio_eliminar', [ServiciosController::class, 'eliminar']);

// Gestion de Usuarios
// Ver Usuario
$router->get('/usuario_ver', [UsuarioController::class, 'ver']);
// Promocionar
$router->get('/usuario_promocionar', [UsuarioController::class, 'promocionar']);
// Degradar
$router->get('/usuario_degradar', [UsuarioController::class, 'degradar']);
// Bloquear
$router->get('/usuario_bloquear', [UsuarioController::class, 'bloquear']);
// Desloquear
$router->get('/usuario_desbloquear', [UsuarioController::class, 'desbloquear']);

// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);


$router->comprobarRutas();