<?php namespace Modelo;

class Cliente{

	//Attributes
	private $ClienteId;
	private $Apellido; 
	private $Nombre;
	private $Dni;
	private $Domicilio;
	private $Email;
	private $FechaAlta;


	//Constructs
	public function __construct($ape, $nomb, $dni, $domi, $email){
		$this->setApellido($ape);
		$this->setNombre($nomb);
		$this->setDni($dni);
		$this->setDomicilio($domi);
		$this->setEmail($email);
	}

	//Properties
	public function getID(){
		return $this->ClienteId;
	}

	public function setID($newID){
		$this->ClienteId = $newID;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nomb){
		$this->nombre = $nomb;
	}

	public function getApellido(){
		return $this->Apellido;
	}

	public function setApellido($apellido){
		$this->Apellido = $apellido;
	}

	public function getDni(){
		return $this->Dni;
	}

	public function setDni($dni){
		$this->Dni = $dni;
	}

	public function getDomicilio(){
		return $this->Domicilio;
	}

	public function setDomicilio($domicilio){
		$this->Domicilio = $domicilio;
	}

	public function getEmail(){
		return $this->Email;
	}

	public function setEmail($email){
		$this->Email = $email;
	}

	public function getFechaAlta(){
		return $this->FechaAlta;
	}

	public function setFechaAlta($fech){
		$this->FechaAlta = $fech;
	}
}

?>