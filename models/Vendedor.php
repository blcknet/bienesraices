<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'imagen'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = 'Debes añadir un nombre';
        }

        if (!$this->apellido) {
            self::$errores[] = 'Debes agregar un apellido';
        }

        if (!(strlen($this->telefono) == 10)) {
            self::$errores[] = 'El telefono es obligatorio y debe tener una extension de 10 caracteres';
        }

        if (!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores[] = 'Formato de telefono no valido';
        }

        if (!$this->imagen) {
            self::$errores[] = 'Debes agregar una imagen';
        }

        return self::$errores;
    }
}
