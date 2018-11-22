<?php

class persona
{
  /*variables iguales a los compos*/
  private $id;
  private $nombre;
  private $apellidos;
  private $identificacion;
  private $email;
  private $direccion;
  private $cell;
  private $estado;
  private $asociacion;
  private $fecha_registro;
  private $foto;

  /*funciones para adceder a los datos*/
  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function getApellidos(){
    return $this->apellidos;
  }

  public function setApellidos($apellidos){
    $this->apellidos = $apellidos;
  }

  public function getIdentificacion(){
    return $this->identificacion;
  }

  public function setIdentificacion($identificacion){
    $this->identificacion = $identificacion;
  }
  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }
  public function getDireccion(){
    return $this->direccion;
  }

  public function setDireccion($direccion){
    $this->direccion = $direccion;
  }
  public function getCell(){
    return $this->cell;
  }

  public function setCell($cell){
    $this->cell = $cell;
  }
  public function getEstado(){
    return $this->estado;
  }

  public function setEstado($foto){
    $this->estado = $estado;
  }
  public function getAsociacion(){
    return $this->asociacion;
  }

  public function setAsociacion($asociacion){
    $this->asociacion = $asociacion;
  }

  public function getFecha_registro(){
    return $this->fecha_registro;
  }

  public function setFecha_registro($fecha_registro){
    $this->fecha_registro = $fecha_registro;
  }

  public function getFoto(){
    return $this->foto;
  }

  public function setFoto($foto){
    $this->foto = $foto;
  }
}
