<?php

namespace Model;

class Servicio extends ActiveRecord {
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'precio', 'medios'];

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $medios;
    
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->medios = $args['medios'] ?? '';
        
    }

    // Validar el Login de Usuarios
    public function validarServicio() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El servicio debe tener un nombre';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'El servicio debe tener una descripcion';
        }
        if(!$this->precio) {
            self::$alertas['error'][] = 'El servicio debe tener un precio';
        }
        return self::$alertas;

    }

}