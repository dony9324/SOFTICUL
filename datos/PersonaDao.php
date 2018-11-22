<?php
include 'Conexion.php';
include '../entidades/personas.php';
class PersonaDao extends Conexion
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

    /* $query = "INSERT INTO personas (nombre, apellidos, identificacion, email, direccion, cell, asociacion) VALUES (:nombre, :apellidos, :identificacion, :email, :direccion, :cell, :asociacion)*/
    $query = "INSERT INTO `personas` (`id`, `nombre`, `apellidos`, `identificacion`, `email`, `direccion`, `cell`, `estado`, `asociacion`, `fecha_registro`) VALUES (NULL, :nombre, :apellidos, :identificacion, :email, :direccion, :cell, '1', :asociacion, '2018-11-20 19:07:30' ) " ;

    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $tmpnombre =   $usuario->getNombre();
    $tmpapellidos =   $usuario->getApellidos();
    $tmpidentificacion =   $usuario->getIdentificacion();
    $tmpemail =   $usuario->getEmail();
    $tmpdireccion =   $usuario->getDireccion();
    $tmpcell =   $usuario->getCell();
    $tmpasociacion =   $usuario->getAsociacion();
    $tmpfoto =   $usuario->getfoto();
    $resultado->bindParam(":nombre", $tmpnombre );
    $resultado->bindParam(":apellidos", $tmpapellidos);
    $resultado->bindParam(":identificacion", $tmpidentificacion);
    $resultado->bindParam(":email", $tmpemail);
    $resultado->bindParam(":direccion", $tmpdireccion);
    $resultado->bindParam(":cell", $tmpcell);
    $resultado->bindParam(":asociacion", $tmpasociacion);
    //  $resultado->bindParam(":foto", $tmpfoto);

    if ($resultado->execute()) {
      return true;
    }

    return false;
  }
  public static function modificar($usuario)
  {
    //  $query = "INSERT INTO invetario (nombre, descricion, nota, foto, id_item, asociacion) VALUES (:nombre, :descricion, :nota, :foto, :id_item, :asociacion)";
    $query = "UPDATE `invetario` SET `nombre` = :nombre, `descricion` = :descricion, `nota` = :nota WHERE `invetario`.`id` = :id";
    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $tmpid =   $usuario->getId();
    $tmpnombre =   $usuario->getNombre();
    $tmpdescricion =   $usuario->getDescricion();
    $tmpnota =   $usuario->getNota();
    $tmpfoto =   $usuario->getFoto();
    $tmpid_item =   $usuario->getId_item();
    $tmpasociacion =   $usuario->getAsociacion();
    $resultado->bindParam(":id", $tmpid );
    $resultado->bindParam(":nombre", $tmpnombre );
    $resultado->bindParam(":descricion", $tmpdescricion);
    $resultado->bindParam(":nota", $tmpnota);
    if ($resultado->execute()) {
      return true;
    }
    return false;
  }


  public static function mover($usuario)
  {
    //  $query = "INSERT INTO invetario (nombre, descricion, nota, foto, id_item, asociacion) VALUES (:nombre, :descricion, :nota, :foto, :id_item, :asociacion)";
    $query = "UPDATE `invetario` SET `id_item` = :id_item WHERE `invetario`.`id` = :id";
    //    UPDATE `invetario` SET `id_item` = '2'       WHERE `invetario`.`id` = 1;
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $tmpid =   $usuario->getId();
    $tmpid_item =   $usuario->getid_item();
    //    $tmpasociacion =   $usuario->getAsociacion();

    $resultado->bindParam(":id_item", $tmpid_item );
    $resultado->bindParam(":id", $tmpid );
    if ($resultado->execute()) {
      return true;
    }
    return false;
  }
}
