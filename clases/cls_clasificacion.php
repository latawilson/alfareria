<?php
require_once("cls_conexion.php");
class clasificacion
{
	/*function insertar($nombre,$codigo)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO asignatura (nombre,codigo) values ('%s','%s')",$nombre,$codigo);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	}

	function actualizar($id,$nombre,$codigo)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("UPDATE asignatura SET nombre='%s', codigo='%s' WHERE id='%s'",$nombre,$codigo,$id);
		$result=mysql_query($query,$dbconexion);
		//echo($query);
	}
	*/
	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from clasificacion";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
	
	function consultarId($id_clas){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from producto where clasificacion_id_clas='%s'",$id_clas);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $result;
	}
	/*

	function eliminar($id)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("DELETE  FROM asignatura WHERE id='%s'",$id);
		$result=mysql_query($query,$dbconexion);
	}*/
}
?>