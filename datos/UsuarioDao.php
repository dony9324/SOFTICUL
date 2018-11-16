<?php
include 'Conexion.php';
include '../entidades/Usuario.php';
class UsuarioDao extends Conexion{
  protected static $cnx;
  private static function getConexion(){
    /*metodo para conectarnos*/
    self::$cnx = Conexion::conectar();
  }
  /*para desconectarnos*/
  private static function desconectar(){
    self::$cnx = null;
  }
  /**
  * Metodo que sirve para validar el login
  * @param   resive    object         $usuario
  * @return  reponde   boolean
  */
  public static function login($usuario) {
    $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
    self::getConexion();
    /*guardamos los resultado de la consulta*/
    $resultado = self::$cnx->prepare($query);
    $tmpusuario = $usuario->getUsuario();
    $tmppassword = $usuario->getPassword();
    $resultado->bindParam(":usuario", $tmpusuario);
    $resultado->bindParam(":password", $tmppassword);
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
  public static function getUsuario($usuario) {
    $query = "SELECT id,nombre,apellido,usuario,privilegio, asociacion, fecha_registro FROM usuarios WHERE usuario = :usuario AND password = :password";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $tmpusuario = $usuario->getUsuario();
    $tmppassword = $usuario->getPassword();
    $resultado->bindParam(":usuario", $tmpusuario);
    $resultado->bindParam(":password", $tmppassword);
    $resultado->execute();
    $filas = $resultado->fetch();
    $usuario = new Usuario();
    $usuario->setId($filas["id"]);
    $usuario->setNombre($filas["nombre"]);
    $usuario->setUsuario($filas["usuario"]);
    $usuario->setapellido($filas["apellido"]);
    $usuario->setPrivilegio($filas["privilegio"]);
    $usuario->setAsociacion($filas["asociacion"]);
    $usuario->setFecha_registro($filas["fecha_registro"]);
    return $usuario;
  }
  /**
  * Metodo que sirve para registrar usuarios
  * @param      object         $usuario
  * @return     boolean
  */
  public static function registrar($usuario)
  {
    $query = "INSERT INTO usuarios (nombre,apellido,usuario,password,  privilegio, asociacion) VALUES (:nombre,:apellido,:usuario,:password,  :privilegio, :asociacion)";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":nombre", $usuario->getNombre());
    $resultado->bindParam(":apellido", $usuario->getapellido());
    $resultado->bindParam(":usuario", $usuario->getUsuario());
    $resultado->bindParam(":password", $usuario->getPassword());
    $resultado->bindParam(":privilegio", $usuario->getPrivilegio());
    $resultado->bindParam(":asociacion", $usuario->getAsociacion());
    if ($resultado->execute()) {
      return true;
    }
    return false;
  }
}
