<?php

include '../datos/PrestamosDao.php';

class PrestamosControlador
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


  public function registrar($inventario_id, $persona_id, $comienzo, $terminar, $Asociacion)
  {

    $obj_usuario = new Prestamos();

    $obj_usuario->setInventario_id($inventario_id);
    $obj_usuario->setPersona_id($persona_id);
    $obj_usuario->setComienzo($comienzo);
    $obj_usuario->setTerminar($terminar);
    $obj_usuario->setAsociacion($Asociacion);
//return true;
    return PrestamosDao::registrar($obj_usuario);
  }

  public function finalizar($Id)
  {
    $obj_usuario = new Prestamos();
    $obj_usuario->setId($Id);
    return PrestamosDao::finalizar($obj_usuario);
  }

  public function mover($Id, $Id_item)
  {
    $obj_usuario = new Invetario();
    $obj_usuario->setId($Id);
    $obj_usuario->setid_item($Id_item);
    return InvetarioDao::mover($obj_usuario);
  }


}
