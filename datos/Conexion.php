<?php
class Conexion
{
    /**
     * Conexión a la base datos
     * @return PDO PHP Data Objects
     */
    public static function conectar()
    {
        try {
            $cn = new PDO("mysql:host=localhost;dbname=softicul", "root", "");
			/*
			prueba
			//echo "conectado";
			*/
            return $cn;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
}
/*
ejecuta la conexion
///conexion::conectar();
*/
