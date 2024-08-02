<?php

namespace Model;

class Noticia extends ActiveRecord {
    protected static $tabla = 'noticias';
    protected static $columnasDB = ['id', 'titulo', 'cuerpo', 'fecha_publicacion', 'medios', 'id_autor','id_categoria'];

    public $id;
    public $titulo;
    public $cuerpo;
    public $fecha_publicacion;
    public $medios;
    public $id_autor;
    public $id_categoria;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->cuerpo = $args['cuerpo'] ?? '';
        $this->fecha_publicacion = $args['fecha_publicacion'] ?? '';
        $this->medios = $args['medios'] ?? '';
        $this->id_autor = $args['id_autor'] ?? '';
        $this->id_categoria = $args['id_categoria'] ?? '';
        
    }

    // Validar el Login de Usuarios
    public function validarNoticia() {
        if(!$this->titulo) {
            self::$alertas['error'][] = 'El título de la Noticia es Obligatorio';
        }
        if(!$this->cuerpo) {
            self::$alertas['error'][] = 'El cuerpo de la Noticia es Obligatorio';
        }
        return self::$alertas;

    }

}