<?php

class movimientos
{
/*variables iguales a los compos*/
    private $id;
    private $id_inventario;
    private $id_item;
    private $nota;
	private $asociacion;
    private $fecha_registro;
	
/*funciones para adceder a los datos*/
   public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_inventario(){
		return $this->id_inventario;
	}

	public function setId_inventario($id_inventario){
		$this->id_inventario = $id_inventario;
	}

	public function getId_item(){
		return $this->id_item;
	}

	public function setId_item($id_item){
		$this->id_item = $id_item;
	}

	public function getNota(){
		return $this->nota;
	}

	public function setNota($nota){
		$this->nota = $nota;
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
