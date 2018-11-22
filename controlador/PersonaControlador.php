<?php

include '../datos/PersonaDao.php';

class PersonaControlador
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


  public function registrar($Nombre, $Apellidos, $Identificacion, $Email, $Direccion, $Cell, $Asociacion, $foto)
  {
    $obj_usuario = new Persona();
    $obj_usuario->setNombre($Nombre);
    $obj_usuario->setApellidos($Apellidos);
    $obj_usuario->setIdentificacion($Identificacion);
    $obj_usuario->setEmail($Email);
    $obj_usuario->setDireccion($Direccion);
    $obj_usuario->setCell($Cell);
    $obj_usuario->setAsociacion($Asociacion);
    $obj_usuario->setfoto($foto);

    return PersonaDao::registrar($obj_usuario);
  }

  public function modificar($Nombre, $Apellidos, $Identificacion, $Email, $Direccion, $Cell, $Asociacion, $foto)
  {
    $obj_usuario = new Persona();
    $obj_usuario->setNombre($Nombre);
    $obj_usuario->setApellidos($Apellidos);
    $obj_usuario->setIdentificacion($Identificacion);
    $obj_usuario->setEmail($Email);
    $obj_usuario->setDireccion($Direccion);
    $obj_usuario->setCell($Cell);
    $obj_usuario->setAsociacion($Asociacion);
    $obj_usuario->setfoto($foto);
    return PersonaDao::modificar($obj_usuario);
  }
}
