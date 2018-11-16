<?php

class Usuario
{
  /*variables iguales a los compos*/
  private $id;
  private $nombre;
  private $usuario;
  private $apellido;
  private $password;
  private $privilegio;
  private $asociacion;
  private $fecha_registro;

  /*funciones para adceder a los datos*/
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function getUsuario()
  {
    return $this->usuario;
  }

  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;
  }

  public function getapellido()
  {
    return $this->apellido;
  }

  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getPrivilegio()
  {
    return $this->privilegio;
  }

  public function setPrivilegio($privilegio)
  {
    $this->privilegio = $privilegio;
  }

  public function getAsociacion()
  {
    return $this->asociacion;
  }

  public function setAsociacion($asociacion)
  {
    $this->asociacion = $asociacion;
  }

  public function getFecha_registro()
  {
    return $this->fecha_registro;
  }

  public function setFecha_registro($fecha_registro)
  {
    $this->fecha_registro = $fecha_registro;
  }
}
