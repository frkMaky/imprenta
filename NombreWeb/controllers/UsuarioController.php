<?php
namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Presupuesto;
use Model\Categoria;
use Model\Servicio;
use Model\Noticia;

class UsuarioController {
    
    public static function area_cliente(Router $router) {
        
        $alertas = [];

        
        // Iniciar / recuperar sesion
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } 
        // Redirige al inicio si no hay sesion
        if (!isset( $_SESSION['rol'] )) {
            header('Location: /');
        }

        // Conexión a la base de datos 
        $conn = obetenerConexion();
        
        $alertas = [];
        
        // Recuperar usuario
        $usuario = Usuario::find($_SESSION['id']);
        
        // Obtener Presupuestos
        
        $presupuestos = Presupuesto::consultarSQL("SELECT * FROM presupuestos WHERE id_usuario={$_SESSION['id']}");
        
        //debuguear($presupuestos);

        // Guardar cambios 
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $usuario->sincronizar($_POST);
            $usuario->guardar();
        }

        // Render a la vista 
        $router->render('privadas/area_cliente', [
            'titulo' => 'FastPrintSpain - Área Cliente',
            'usuario' => $usuario,
            'presupuestos' => $presupuestos,
            'alertas' => $alertas
        ]);
    }

    public static function dashboard(Router $router) {
        
        $alertas = [];

        // Iniciar / recuperar sesion
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } 
        
        // Redirige al inicio si no hay sesion o si no es admin
        if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin')) {
            header('Location: /');
        } 
    
        // Obtener las categorias 
        $categorias = Categoria::all();

        // Conexión a la base de datos 
        $conn = obetenerConexion();
    
        // Recuperar noticias 
        $noticias = Noticia::all();

        // Recuperar usuarios 
        $usuarios = Usuario::all();

        // Recuperar servicios 
        $servicios = Servicio::all();

        // Recuperar servicios 
        $presupuestos = Presupuesto::all();

        // Render a la vista 
        $router->render('privadas/dashboard', [
            'titulo' => 'FastPrintSpain - Servicio',
            'noticias' => $noticias,
            'servicios' => $servicios,
            'usuarios' => $usuarios,
            'categorias' => $categorias,
            'presupuestos' => $presupuestos,
            'alertas' => $alertas
        ]);
    }

    public static function ver(Router $router) {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $alertas = [];


        // Recuperar usuario
        $usuario = Usuario::find((int)$_GET['id']);

        $router->render('privadas/ver_usuario',[
            'titulo' => 'FastPrintSpain - Servicio',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);

    }
    public static function promocionar(){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Redirige al inicio si no hay sesion o si no es admin
        if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin')) {
            header('Location: ../../');
        } 

        // Recuperar servicios 
        $usuario = Usuario::find($_GET['id']);   // array assoc con los datos de los servicios 
    
        if (($usuario->rol == 'usuario') ) {
            $query = "UPDATE usuarios SET rol='admin' WHERE id={$usuario->id}";
            $conn = obetenerConexion();
            $result = $conn->query($query);
            if (!$result) {
                $alertas[] = 'No se puede degradar al usuario';
            } 
            header('Location: /dashboard');
        }
    }
    public static function degradar(Router $router){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Redirige al inicio si no hay sesion o si no es admin
        if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin')) {
            header('Location: ../../');
        } 

        // Recuperar servicios 
        $usuario = Usuario::find($_GET['id']);   // array assoc con los datos de los servicios 
    
        if (($usuario->rol == 'admin') && ($usuario->email != 'admin@correo.com')) {
            $query = "UPDATE usuarios SET rol='usuario' WHERE id={$usuario->id}";
            $conn = obetenerConexion();
            $result = $conn->query($query);
            if (!$result) {
                $alertas[] = 'No se puede degradar al usuario';
            } 
            header('Location: /dashboard');
        }
        
    }
    public static function bloquear(Router $router){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $alertas = [];
        
        // Redirige al inicio si no hay sesion o si no es admin
        if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin')) {
            header('Location: /');
        } 
        
        // Recuperar usuario 
        $usuario = Usuario::find($_GET["id"]);
    
        if ($usuario->confirmado == '1') {
            $query = "UPDATE usuarios SET confirmado=0 WHERE id={$usuario->id}";
            $conn = obetenerConexion();
            $result = $conn->query($query);
            if (!$result) {
                $alertas[] = 'No se puede bloquear al usuario';
            } 
            header('Location: /dashboard');
        }

    }

    public static function desbloquear(Router $router){
      
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Redirige al inicio si no hay sesion o si no es admin
        if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin')) {
            header('Location: ../../');
        } 

        // Recuperar servicios 
        $usuario = Usuario::find($_GET['id']);   // array assoc con los datos de los servicios 
    
        if ($usuario->confirmado == '0') {
            $query = "UPDATE usuarios SET confirmado=1 WHERE id={$usuario->id}";
            $conn = obetenerConexion();
            $result = $conn->query($query);
            if (!$result) {
                $alertas[] = 'No se puede bloquear al usuario';
            } 
            header('Location: /dashboard');
        }
    }
}