<?php
require_once("cls_conexion.php");
class usuario
{
	function insertar($nombre_cli, $apellido_cli, $usuario_cli, $contrasenia_cli, $telefono_cli, $direccion_cli)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO cliente (nombre_cli, apellido_cli, usuario_cli, contrasenia_cli, telefono_cli, direccion_cli) values ('%s','%s','%s','%s','%s','%s')",$nombre_cli, $apellido_cli, $usuario_cli, $contrasenia_cli, $telefono_cli, $direccion_cli);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	}

	function actualizar($id_cli,$nombre_cli, $apellido_cli, $usuario_cli, $contrasenia_cli, $telefono_cli, $direccion_cli)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("UPDATE cliente SET nombre_cli='%s', apellido_cli='%s',usuario_cli='%s', contrasenia_cli='%s', telefono_cli='%s', direccion_cli='%s' WHERE id_cli='%s'",$nombre_cli, $apellido_cli, $usuario_cli, $contrasenia_cli, $telefono_cli, $direccion_cli,$id_cli);
		$result=mysql_query($query,$dbconexion);
		//echo($query);
	}
	
	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from cliente";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
	
	function consultarId_cli($id_cli){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from cliente where id_cli='%s'",$id_cli);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}
	/// traer TRIDUTOS
	function consultarid_alp($usuario_cli){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from cliente where usuario_cli='%s'",$usuario_cli);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}

}
?>