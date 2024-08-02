<?php

namespace Model;

class Categoria extends ActiveRecord {
    protected static $tabla = 'categorias';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        
    }

    // Validar el Login de Usuarios
    public function validarCategoria() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre de la categoria es Obligatorio';
        }
        return self::$alertas;

    }

}