<?php

include '../datos/InvetarioDao.php';

class InvetarioControlador
{

  public static function login($usuario, $password)
  {
    $obj_usuario = new Usuario();
    $obj_usuario->setUsuario($usuario);
    $obj_usuario->setPassword($password);

    return UsuarioDao::login($obj_usuario);
  }

  public function getUsuario($usuario, $password)
  {
    $obj_usuario = new Usuario();
    $obj_usuario->setUsuario($usuario);
    $obj_usuario->setPassword($password);

    return UsuarioDao::getUsuario($obj_usuario);
  }


  public function registrar($Nombre, $Descricion, $Nota, $Fecha, $foto, $Id_item, $Asociacion)
  {
    $obj_usuario = new Invetario();
    $obj_usuario->setNombre($Nombre);
    $obj_usuario->setDescricion($Descricion);
    $obj_usuario->setNota($Nota);
    $obj_usuario->setFecha($Fecha);
    $obj_usuario->setfoto($foto);
    $obj_usuario->setId_item($Id_item);
    $obj_usuario->setAsociacion($Asociacion);
    return InvetarioDao::registrar($obj_usuario);
  }

  public function modificar($Id, $Nombre, $Descricion, $Nota, $Fecha)
  {
    $obj_usuario = new Invetario();
    $obj_usuario->setId($Id);
    $obj_usuario->setNombre($Nombre);
    $obj_usuario->setDescricion($Descricion);
    $obj_usuario->setNota($Nota);
    $obj_usuario->setFecha($Fecha);
    return InvetarioDao::modificar($obj_usuario);
  }
  public function mover($Id, $Id_item)
  {
    $obj_usuario = new Invetario();
    $obj_usuario->setId($Id);
    $obj_usuario->setid_item($Id_item);
    return InvetarioDao::mover($obj_usuario);
  }


}
