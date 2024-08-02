<?php
namespace Controllers;


require_once (__DIR__ . '/../includes/app.php');
require_once (__DIR__ . '/../includes/database.php');

use MVC\Router;
use Model\ActiveRecord;
use Model\Presupuesto;
use Model\Servicio;

class PresupuestosController {
    
    public static function calcular(Router $router) {


        $alertas = [];

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Obtener Servicios 
        $servicios=  Servicio::all();

        // Guardar presupuesto
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $presupuesto = new Presupuesto;
            $presupuesto->id_usuario = (int)$_SESSION['id'];
            $presupuesto->total = (float)$_POST['presupuestoEstimado'];
            $fecha = getdate();
            $presupuesto->fecha_presupuesto  = $fecha["year"] . '-' . $fecha["mon"] . '-' . $fecha["mday"];
            $extras = $_POST['flexCheckDefault1'] . ', ' . $_POST['flexCheckDefault2'] . ', ' . $_POST['flexCheckDefault3'] . ', ' . $_POST['flexCheckDefault4'] . ', ' . $_POST['flexCheckDefault5'];
            $presupuesto->medios = 'Servicio: ' . $_POST['selectServicio'] . ' Plazo: ' . $_POST['plazo'] . ' Extras: ' . $extras;
            $presupuesto->estado = 'PENDIENTE';
            $presupuesto->guardar();
            header('Location: /area_cliente');
        }

        // Render a la vista 
        $router->render('privadas/calcular', [
            'titulo' => 'FastPrintSpain - Calcular Presupuesto',
            'servicios' => $servicios,
            'alertas' => $alertas
        ]);
    }

    public static function aceptar(Router $router) {

        $alertas = [];

        $presupuesto = Presupuesto::find($_GET['id']);

        $id = (int) $_GET['id'];

        $query = "UPDATE presupuestos SET estado='ACEPTADO' WHERE id={$presupuesto->id}";
        $conn = mysqli_connect('localhost','root','root','baseDatosNombreWeb');
        $result = $conn->query($query);

        header('Location: /dashboard');
     

    }
    public static function rechazar(Router $router) {
        $alertas = [];

        $presupuesto = Presupuesto::find($_GET['id']);

        $id = (int) $_GET['id'];

        $query = "UPDATE presupuestos SET estado='CANCELADO' WHERE id={$presupuesto->id}";
        $conn = mysqli_connect('localhost','root','root','baseDatosNombreWeb');
        $result = $conn->query($query);


        header('Location: /dashboard');
    }
    public static function pendiente(Router $router) {

        $alertas = [];

        $presupuesto = Presupuesto::find($_GET['id']);

        $id = (int) $_GET['id'];

        $query = "UPDATE presupuestos SET estado='PENDIENTE' WHERE id={$presupuesto->id}";
        $conn = mysqli_connect('localhost','root','root','baseDatosNombreWeb');
        $result = $conn->query($query);

        header('Location: /dashboard');
    

    }
}