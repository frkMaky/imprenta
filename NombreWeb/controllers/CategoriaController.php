<?php
namespace Controllers;

require_once (__DIR__ . '/../includes/app.php');
require_once (__DIR__ . '/../includes/database.php');

use MVC\Router;
use Model\Noticia;
use Model\Categoria;

class CategoriaController {
    

    public static function nueva(Router $router) {

        $alertas = [];
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Redirige al inicio si no hay sesion o si no es admin
        if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'admin')) {
            header('Location: /');
        } 
        
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            // Se obtienen los datos del medio
            $categoria =new Categoria($_POST);
            
        
            $alertas = $categoria->validarCategoria(); // Se validan datos del formulario

            if (empty($alertas ["error"]) ) {
                $categoria->guardar();
    
                header('Location: /dashboard');
                
            }
        }

        // Render a la vista 
        $router->render('categorias/nueva_categoria', [
            'titulo' => 'FastPrintSpain - Nueva Categoria',
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
        $categoria = Categoria::find($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $categoria->nombre = $_POST['nombre'];

            $alertas = $categoria->validarCategoria(); // Se validan datos del formulario

            if (empty($alertas) ) { // si no hay errores

                // Se hace el insert en la base de datos
                $categoria->guardar();
                header('Location: /dashboard');
            }

        }

        // Render a la vista 
        $router->render('categorias/editar_categoria', [
            'titulo' => 'FastPrintSpain - Editar Categoria',
            'categoria' => $categoria,
            'alertas' => $alertas
        ]);
    }
    public static function eliminar(Router $router) {

        $alertas = [];

        // Render a la vista 
        $router->render('categorias/eliminar_categoria', [
            'titulo' => 'FastPrintSpain - Eliminar Categoria',
            'alertas' => $alertas
        ]);
    }

 
}