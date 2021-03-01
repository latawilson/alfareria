<?php
class DBConexion
{

	// aki es donde se carga las alafaerias
public $conexion;
protected $db;
private $host="localhost";
private $usua="root";
private $cla="";
private $base="bd_ver1";
	public function __construct()
	{
	$this->conexion = mysql_connect($this->host,$this->usua,$this->cla,$this->base);
        if ($this->conexion == 0)
		{
		 DIE("Lo sentimos, no se ha podido conectar con MySQL: " . mysql_error());
		}
        
		$this->db = mysql_select_db($this->base,$this->conexion);
        if ($this->db == 0) 
		{
		DIE("Lo sentimos, no se ha podido conectar con la base datos: " . $this->base);
		}
        return true;
  	}
}
?>