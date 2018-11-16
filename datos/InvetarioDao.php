<?php
include 'Conexion.php';
include '../entidades/invetario.php';
class InvetarioDao extends Conexion
{
  protected static $cnx;
  private static function getConexion()
  {
    /*metodo para conectarnos*/
    self::$cnx = Conexion::conectar();
  }
  /*para desconectarnos*/
  private static function desconectar()
  {
    self::$cnx = null;
  }
  /**
  * Metodo que sirve para validar el login
  *
  * @param   resive    object         $usuario
  * @return  reponde   boolean
  */
  public static function login($usuario)
  {
    $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
    self::getConexion();
    /*guardamos los resultado de la consulta*/
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":usuario", $usuario->getUsuario());
    $resultado->bindParam(":password", $usuario->getPassword());
    $resultado->execute();
    /*ver si hay por lo menos un resultado*/
    if ($resultado->rowCount() > 0) {
      /*rellna de los resultados como un array*/
      $filas = $resultado->fetch();
      if ($filas["usuario"] == $usuario->getUsuario()
      && $filas["password"] == $usuario->getPassword()) {
        return true;
        /*exito al autenticar*/
      }
    }
    /*fallo al autenticar*/
    return false;
  }
  /**
  * Metodo que sirve obtener un usuario
  *
  * @param      object         $usuario
  * @return     object
  */
  public static function getUsuario($usuario)
  {
    $query = "SELECT id,nombre,apellido,usuario,privilegio, asociacion, fecha_registro FROM usuarios WHERE usuario = :usuario AND password = :password";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":usuario", $usuario->getUsuario());
    $resultado->bindParam(":password", $usuario->getPassword());
    $resultado->execute();
    $filas = $resultado->fetch();
    $usuario = new Usuario();
    $tmpid = $filas["id"];
    $tmpnombre = $filas["nombre"];
    $tmpusuario = $filas["usuario"];
    $tmpapellido = $filas["apellido"];
    $tmpprivilegio = $filas["privilegio"];
    $tmpasociacion = $filas["asociacion"];
    $tmpfecha_registro = $filas["fecha_registro"];

    $usuario->setId($tmpid);
    $usuario->setNombre($tmpnombre);
    $usuario->setUsuario($tmpusuario);
    $usuario->setapellido($tmpapellido);
    $usuario->setPrivilegio($tmpprivilegio);
    $usuario->setAsociacion($tmpasociacion);
    $usuario->setFecha_registro($tmpfecha_registro);
    return $usuario;
  }
  /**
  * Metodo que sirve para registrar usuarios
  *
  * @param      object         $usuario
  * @return     boolean
  */
  public static function registrar($usuario)
  {
    $query = "INSERT INTO invetario (nombre, descricion, nota, foto, id_item, asociacion) VALUES (:nombre, :descricion, :nota, :foto, :id_item, :asociacion)";

    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $tmpnombre =   $usuario->getNombre();
    $tmpdescricion =   $usuario->getDescricion();
    $tmpnota =   $usuario->getNota();
    $tmpfoto =   $usuario->getFoto();
    $tmpid_item =   $usuario->getId_item();
    $tmpasociacion =   $usuario->getAsociacion();
    $resultado->bindParam(":nombre", $tmpnombre );
    $resultado->bindParam(":descricion", $tmpdescricion);
    $resultado->bindParam(":nota", $tmpnota);
    $resultado->bindParam(":foto", $tmpfoto);
    $resultado->bindParam(":id_item", $tmpid_item);
    $resultado->bindParam(":asociacion", $tmpasociacion);
    if ($resultado->execute()) {
      return true;
    }
    return false;
  }
}