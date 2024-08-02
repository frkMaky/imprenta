<?php
namespace Controllers;

require_once('../includes/app.php');
require_once('../includes/database.php');

use MVC\Router;
use Model\Servicio;

class ServiciosController {
    
    public static function nuevo_servicio (Router $router) {
        
        // Sesiones
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $alertas = [];
        
        // Recuperar servicio 
        $servicio = new Servicio();
        

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $servicio->nombre = $_POST['nombre'];
            $servicio->descripcion = $_POST['descripcion'];
            $servicio->precio = (float)($_POST['precio']);
            $servicio->medios = $_FILES['medios']['name'];

            $alertas = $servicio->validarServicio();

            if (empty($alertas)) {
                $servicioImagen['ruta_temporal'] =   $_FILES['medios']["tmp_name"];
                $servicioImagen['nuevaRuta'] = __DIR__ . '/../public/build/medios/' .$_FILES['medios']["name"];
                // Se mueve medio a la carpeta images/
                try {
                    move_uploaded_file($servicioImagen['ruta_temporal'],$servicioImagen['nuevaRuta']);
                    
                } catch (\Throwable $th) {
                    debuguear( $th);
                }
                //debuguear($servicio);
                // Se hace el insert en la base de datos
                $servicio->guardar();
    
                header('Location: /dashboard');
            }
        
        
        }


        // Render a la vista 
        $router->render('servicios/nuevo_servicio', [
            'titulo' => 'FastPrintSpain - Servicio Nuevo',
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
    public static function editar_servicio (Router $router) {
        // Sesiones
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $alertas = [];

        // Recuperar servicio 
        $servicio = Servicio::find($_GET['id']);

        
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            
            $servicio->nombre = $_POST['nombre'];
            $servicio->descripcion = $_POST['descripcion'];
            $servicio->precio = $_POST['precio'];
                     
            $servicioImagen['imagenAntigua'] = $servicio->medios; // Imagen Antigua
            $servicio->medios = $_FILES['medios']["name"];       // Imagen Nueva

            $alertas = $servicio->validarServicio();

            if (empty($alertas)) {
                $servicioImagen['ruta_temporal'] =   $_FILES['medios']["tmp_name"];
                $servicioImagen['nuevaRuta'] = __DIR__ . '/../public/build/medios/' .$_FILES['medios']["name"];
                
                // Si hay imagen nueva
                if ($servicio->medios != '' && !is_null($servicio->medios) ) {
                    try {
                        // Se elimina imagen antigua si no es la defaul
                        if ($servicioImagen['imagenAntigua'] != 'imagenDefault.png') {
                            unlink(__DIR__ . '/../public/build/medios/' . $servicioImagen['imagenAntigua']);
                        } 
                    } catch (\Throwable $th) {
                    }
                    // Se mueve medio a la carpeta medios/
                    try {
                        move_uploaded_file($servicioImagen['ruta_temporal'],$servicioImagen['nuevaRuta']);
                    } catch (\Throwable $th) {
                    }
                }
                // Se hace el insert en la base de datos
                $servicio->guardar();
                header('Location: /dashboard');
            }

        }

        // Render a la vista 
        $router->render('servicios/editar_servicio', [
            'titulo' => 'FastPrintSpain - Servicio Editar',
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Conexión a la base de datos 
        $conn = obetenerConexion();
    
        $alertas = [];
    
        // Recuperar noticia
        $servicio = Servicio::find($_GET['id']);   // array assoc con los datos de los servicios 
        
        $query = "SELECT * FROM servicios WHERE id={$servicio->id}";
        $result = $conn->query($query);
        $servicio = $result->fetch_assoc();
        
        if ($servicio) {
            try {
                // Eliminar medios antiguos del servicio
                $servicioAntiguo = __DIR__ . SEPARADOR . '..'. SEPARADOR . '..'. SEPARADOR . 'build'. SEPARADOR . 'medios' . SEPARADOR . $servicio->medios;
                // Eliminar imagen 
                unlink($servicioAntiguo);
                //debuguear($medio);
                $query = "DELETE FROM servicios WHERE id={$servicio['id']}";
                $result = $conn->query($query);
            } catch (\Throwable $th) {
                debuguear($th);
            }
        }
        header('Location: /dashboard');
      
    }
}