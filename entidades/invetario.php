<?php

class invetario
{
/*variables iguales a los compos*/
    private $id;
    private $nombre;
	private $descricion;
    private $nota;
    private $foto;
	private $id_item;
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

	public function getDescricion(){
		return $this->descricion;
	}

	public function setDescricion($descricion){
		$this->descricion = $descricion;
	}

	public function getNota(){
		return $this->nota;
	}

	public function setNota($nota){
		$this->nota = $nota;
	}
  public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}
public function getid_item(){
		return $this->id_item;
	}

	public function setid_item($id_item){
		$this->id_item = $id_item;
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
