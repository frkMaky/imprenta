<?php
namespace Controllers;

require_once (__DIR__ . '/../includes/app.php');
require_once (__DIR__ . '/../includes/database.php');

use MVC\Router;
use Model\Noticia;
use Model\Usuario;
use Model\Categoria;

class NoticiasController {
    

    public static function noticia (Router $router) {
        // Sesiones
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Conexión a la base de datos 
        $conn = obetenerConexion();

        
        $alertas = [];
        
        // Recuperar noticia 
        $noticia = Noticia::find($_GET['id']);
        
        if (is_null($noticia->medios) || $noticia->medios == '') {
            $noticia->medios = 'imagenDefault.png';
        }
        
        // Obtener Autor
        $usuario = Usuario::find($noticia->id_autor);
        
        // Obtener categoria
        $categoria = Categoria::find($noticia->id_categoria);

        // Render a la vista 
        $router->render('paginas/noticia', [
            'titulo' => 'FastPrintSpain - Noticia',
            'noticia' =>  $noticia,
            'usuario' => $usuario,
            'categoria' => $categoria,
            'alertas' => $alertas
        ]);
    }
    public static function nueva(Router $router) {

        $alertas = [];

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Redirige al inicio si no hay sesion o si no es admin
        if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin')) {
            header('Location: /');
        } 
        
        // Obtener las categorias 
        $categorias = Categoria::all();

        if ($_SERVER['REQUEST_METHOD']=='POST') {

            // Se obtienen los datos del medio
            $noticia =new Noticia($_POST);
            
            $fecha = getdate();
            $noticia->fecha_publicacion = $fecha["year"] . '-' . $fecha["mon"] . '-' . $fecha["mday"];  
            $noticia->medios = $_FILES['medios']["name"];
            $noticia->id_autor =  $_SESSION['id'];
            $noticia->id_categoria = $_POST['categoria'];

            $alertas = $noticia->validarNoticia(); // Se validan datos del formulario

            if (empty($alertas ["error"]) ) {
                $noticiaImagen['ruta_temporal'] =   $_FILES['medios']["tmp_name"];
                $noticiaImagen['nuevaRuta'] = __DIR__ . '/../public/build/medios/' .$_FILES['medios']["name"];
                
                // Se mueve medio a la carpeta images/
                try {
                    move_uploaded_file($noticiaImagen['ruta_temporal'],$noticiaImagen['nuevaRuta']);
                    
                } catch (\Throwable $th) {
                    debuguear( $th);
                }
                // Se hace el insert en la base de datos
                $noticia->guardar();
    
                header('Location: /dashboard');
                
            }
        }


        // Render a la vista 
        $router->render('noticias/nueva_noticia', [
            'titulo' => 'FastPrintSpain - Nueva Noticia',
            'categorias' => $categorias,
            'alertas' => $alertas 
        ]);
    }
    public static function editar(Router $router) {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Conexión a la base de datos 
        $conn = obetenerConexion();

        $alertas = [];

        // Recuperar noticia 
        $noticia = Noticia::find($_GET['id']);

        // Obtener categorias
        $categorias = Categoria::all();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $noticia->titulo = $_POST['titulo'];
            $noticia->cuerpo = $_POST['cuerpo'];
          
            $fecha = getdate();
            $noticia->fecha_publicacion = $fecha["year"] . '-' . $fecha["mon"] . '-' . $fecha["mday"];  
            
            $noticiaImagen['imagenAntigua'] = $noticia->medios; // Imagen Antigua
            $noticia->medios = $_FILES['medios']["name"];       // Imagen Nueva

            $noticia->id_autor =  $_SESSION['id'];
            $noticia->id_categoria =  $_POST['categoria'];

            $alertas = $noticia->validarNoticia(); // Se validan datos del formulario

            if (empty($alertas) ) { // si no hay errores

                $noticiaImagen['ruta_temporal'] =   $_FILES['medios']["tmp_name"];
                $noticiaImagen['nuevaRuta'] = __DIR__ . '/../public/build/medios/' .$_FILES['medios']["name"];
                
                // Si hay imagen nueva
                if ($_FILES['medios']["name"] != "" && !is_null($_FILES['medios']["name"]) ) {
                    try {
                        // Se elimina imagen antigua si no es la defaul
                        if ($noticiaImagen['imagenAntigua'] != 'imagenDefault.png') {
                            unlink(__DIR__ . '/../public/build/medios/' . $noticiaImagen['imagenAntigua']);
                        } 
                    } catch (\Throwable $th) {
                    }
                    // Se mueve medio a la carpeta medios/
                    try {
                        move_uploaded_file($noticiaImagen['ruta_temporal'],$noticiaImagen['nuevaRuta']);
                    } catch (\Throwable $th) {
                    }
                } else {
                    $noticia->medios =  $noticiaImagen['imagenAntigua'] ;
                }
                // Se hace el insert en la base de datos
                $noticia->guardar();
                header('Location: /dashboard');
            }

        }

        // Render a la vista 
        $router->render('noticias/editar_noticia', [
            'titulo' => 'FastPrintSpain - Editar Noticia',
            'noticia' => $noticia,
            'categorias' => $categorias,
            'alertas' => $alertas
        ]);
    }
    public static function eliminar(Router $router) {

        $alertas = [];

        // Render a la vista 
        $router->render('noticias/eliminar_noticia', [
            'titulo' => 'FastPrintSpain - Inicio',
            'alertas' => $alertas
        ]);
    }

 
}