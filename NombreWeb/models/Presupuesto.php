<?php

namespace Model;

class Presupuesto extends ActiveRecord {
    protected static $tabla = 'presupuestos';
    protected static $columnasDB = ['id', 'id_usuario', 'total', 'fecha_presupuesto', 'medios','estado'];

    public $id;
    public $id_usuario;
    public $total;
    public $fecha_presupuesto;
    public $medios;
    public $estado;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->total = $args['total'] ?? '';
        $this->fecha_presupuesto = $args['fecha_presupuesto'] ?? '';
        $this->medios = $args['medios'] ?? '';
        $this->estado = $args['estado'] ?? '';
        
    }

    // Validar el Login de Usuarios
    public function validarPresupuesto() {
        if(is_null($this->servicios) ) {
            self::$alertas['error'][] = 'Debe seleccionar algún servicio';
        }
        return self::$alertas;

    }

}