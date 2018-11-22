<?php

class Prestamos
{
/*variables iguales a los compos*/
    private $id;
    private $inventario_id;
	private $persona_id;
    private $comienzo;
    private $terminar;
	private $devuelto;
   	private $asociacion;
    private $fecha_registro;

/*funciones para adceder a los datos*/
   	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getInventario_id(){
		return $this->inventario_id;
	}

	public function setInventario_id($inventario_id){
		$this->inventario_id = $inventario_id;
	}

	public function getPersona_id(){
		return $this->persona_id;
	}

	public function setPersona_id($persona_id){
		$this->persona_id = $persona_id;
	}

	public function getComienzo(){
		return $this->comienzo;
	}

	public function setComienzo($comienzo){
		$this->comienzo = $comienzo;
	}

	public function getTerminar(){
		return $this->terminar;
	}

	public function setTerminar($terminar){
		$this->terminar = $terminar;
	}
public function getDevuelto(){
		return $this->devuelto;
	}

	public function setDevuelto($devuelto){
		$this->devuelto = $devuelto;
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
}
