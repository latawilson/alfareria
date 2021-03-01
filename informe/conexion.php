<?php 
class conexion
{
	private $servidor;
	private $usuario;
	private $contrasena;
	private $basedatos;
	public $conexion;

	public function __construct(){
		// $this->servidor = "alfareriabd.cn3hw4ruastd.us-east-2.rds.amazonaws.com:3306";
		// $this->usuario = "admin";
		// $this->contrasena = "admin1234";
		// $this->basedatos = "bd_ver1";
		
		$this->servidor = "localhost:3306";
		$this->usuario = "root";
		$this->contrasena = "";
		$this->basedatos = "bd_ver1";
	}
	
	function conectar(){
		$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
		$this->conexion->set_charset("utf8");
	echo "string";
	}
	function cerrar(){
		$this->conexion->close();	
		echo "se cerrro";
	}
	
}

?>
