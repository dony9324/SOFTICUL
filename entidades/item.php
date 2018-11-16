<?php

class item
{
/*variables iguales a los compos*/
    private $id;
    private $nombre;
    private $estado;
	private $asociacion;
    private $fecha_registro;
	
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

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
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

}
