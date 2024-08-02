<?php
namespace Controllers;

require_once('../includes/app.php');
require_once('../includes/database.php');

use MVC\Router;
use Model\Categoria;
use Model\Servicio;

class PublicController {
    
    public static function index(Router $router) {

        $alertas = [];

        // Render a la vista 
        $router->render('paginas/inicio', [
            'titulo' => 'FastPrintSpain - Inicio',
            'alertas' => $alertas
        ]);
    }

    public static function noticias(Router $router) {
        
        $alertas = [];
        
        // Sesiones
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $conn = obetenerConexion(); // conexión a la base de datos 

        // Recuperar noticias 
        $noticias = [];   // array assoc con los datos de los noticias 


        $query = "SELECT * FROM noticias";
        $result = $conn->query($query);
        if ($result->num_rows > 0 ) {
            while ( $noticia = $result->fetch_assoc() ){
                $noticias[] = $noticia;
            }
        } else {
            $alertas[] = "No hay noticias actualmente";
        }
        $num_columnas = 3; // columnas x fila
        $result->close();

        $categorias = Categoria::all();

        // Render a la vista 
        $router->render('paginas/noticias', [
            'titulo' => 'FastPrintSpain - Noticias',
            'noticias' =>  $noticias,
            'categorias' => $categorias,
            'alertas' => $alertas
        ]);
    }

    public static function noticia(Router $router) {
                
        // Sesiones
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Conexión a la base de datos 
        $conn = obetenerConexion();

        debuguear($conn);
        $alertas = [];

        // Recuperar noticia 
        $noticia = Noticia::find($_GET['id']);

        if (is_null($noticia->medios) || $noticia->medios == '') {
            $noticia['medios'] = 'imagenDefault.png';
        }

        // Obtener Autors
        $usuario = Usuario::find($noticia->id_autor);

        $categorias = Categoria::all();

        debuguear($categorias);

        // Render a la vista 
        $router->render('paginas/noticia', [
            'titulo' => 'FastPrintSpain - Noticia',
            'noticia' =>  $noticia,
            'usuario' => $usuario,
            'categorias' => $categorias,
            'alertas' => $alertas
        ]);
    }

 
    public static function servicios(Router $router) {
        
        $alertas = [];

        // Sesiones
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Conexión a la base de datos 
        $conn = obetenerConexion();
    
        // Recuperar servicios 
        $servicios = Servicio::all();

        // Columnas por fila
        $num_columnas = 3;

        // Render a la vista 
        $router->render('paginas/servicios', [
            'titulo' => 'FastPrintSpain - Servicios',
            'servicios' => $servicios,
            'num_columnas' => $num_columnas,
            'alertas' => $alertas
        ]);
    }

    public static function servicio(Router $router) {
        
        $alertas = [];

        // Sesiones
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }

        // Conexión a la base de datos 
        $conn = obetenerConexion();

        // Recuperar servicios 
        $servicio = Servicio::find($_GET['id']);

        // Render a la vista 
        $router->render('paginas/servicio', [
            'titulo' => 'FastPrintSpain - Servicio',
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function contacto(Router $router) {
        $alertas = [];

        // Render a la vista 
        $router->render('paginas/contacto', [
            'titulo' => 'FastPrintSpain - Contacto',
            'alertas' => $alertas
        ]);
    }
}