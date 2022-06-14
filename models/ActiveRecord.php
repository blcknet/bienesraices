<?php

namespace Model;

class ActiveRecord
{
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    protected static $errores = [];

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {
        $resultado = '';
        if (!is_null($this->id)) {
            $resultado = $this->actualizar();
        } else {
            $resultado = $this->crear();
        }

        return $resultado;
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " set ";
        $query .= join(', ', $valores);
        $query .= " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";

        $resultado = self::$db->query($query);

        return $resultado;
    }
    public function crear(): bool
    {
        $atributos = $this->sanitizarAtributos();

        $keys = join(', ', array_keys($atributos));
        $values = join("','", array_values($atributos));

        $query = "INSERT INTO " . static::$tabla . "(${keys}) ";
        $query .= "VALUES('";
        $query .= "${values}')";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna == 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public function setImagen($imagen)
    {

        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        if ($imagen) {
            $this->image = $imagen;
        }
    }

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGEN . $this->image);

        if ($existeArchivo) {
            unlink(CARPETA_IMAGEN . $this->image);
        }
    }

    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores =  [];
        return static::$errores;
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function limit($limite)
    {
        $query = "SELECT * FROM " .  static::$tabla . " LIMIT ${limite}";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function where($column, $value)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ${column}='${value}'";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        $resultado = self::$db->query($query);

        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        };

        $resultado->free();

        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $obj = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }

        return $obj;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
