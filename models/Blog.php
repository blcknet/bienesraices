<?php

namespace Model;

class Blog extends ActiveRecord
{
    protected static $tabla = 'blog';
    protected static $columnasDB = ['id', 'title', 'created', 'description', 'image'];

    public $id;
    public $title;
    public $creted;
    public $description;
    public $image;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->title = $args['titulo'] ?? '';
        $this->created = date('Y-m-d');
        $this->description = $args['descripcion'] ?? '';
        $this->image = $args['imagen'] ?? '';
    }

    public function validar()
    {
        if (!$this->title) {
            self::$errores[] = 'Debes agregar un titulo';
        }

        if (!$this->image) {
            self::$errores[] = 'Debes agregar una imagen';
        }

        if (!$this->description) {
            self::$errores[] = 'Debes agregar una descripcion';
        }

        return self::$errores;
    }
}
