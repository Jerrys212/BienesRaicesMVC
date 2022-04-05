<?php

namespace Model;

class ActiveRecord
{
    //db
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    //errores

    protected static $errores = [];


    public static function setDB($database)
    {
        self::$db = $database;
    }


    public function guardar()
    {
        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    public function crear()
    {

        //sanitizar los datos

        $datos = $this->sanitizarDatos();

        $consulta = " INSERT INTO " . static::$tabla . " ( ";
        $consulta .= join(', ', array_keys($datos));
        $consulta .= " ) VALUES (' ";
        $consulta .= join("', '", array_values($datos));
        $consulta .= "') ";

        $resultado = self::$db->query($consulta);

        if ($resultado) {
            //Siempre se recomienda direccionar al usuario para evitar datos duplicados

            header('Location: /admin?resultado=1');
        }
        return $resultado;
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarDatos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            //Siempre se recomienda direccionar al usuario para evitar datos duplicados

            header('Location: /admin?resultado=2');
        }
    }

    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    public function datos()
    {
        $datos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $datos[$columna] = $this->$columna;
        }
        return $datos;
    }
    public function sanitizarDatos()
    {
        $datos = $this->datos();
        $sanitizado = [];

        foreach ($datos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //subida de archivos

    public function setImagen($imagen)
    {
        //eliminar imagen previa 

        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //validaciones 

    public static function getErrores()
    {
        return static::$errores;
    }


    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }
    //Listar propiedades

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado =  self::consultarSQL($query);

        return $resultado;
    }

    public static function get($cantidad)
    {
        $query = " SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado =  self::consultarSQL($query);

        return $resultado;
    }

    public static function find($id)
    {
        $query = " SELECT * FROM " . static::$tabla . " WHERE id = ${id} ";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }


    public static function consultarSQL($query)
    {
        //consultar la db
        $resultado = self::$db->query($query);


        // //iterar resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        // //liberar la memoria 
        $resultado->free();
        // //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
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
