<?php

namespace Model;

class Admin extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = 'Debes agregar un email';
        }

        if (!$this->password) {
            self::$errores[] = 'La contraseña es obligatoria';
        }

        return self::$errores;
    }

    public function validarContrasena($password)
    {
        $resultado = password_verify($password, $this->password);

        return $resultado;
    }
}
