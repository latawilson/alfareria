<?php
require_once("cls_conexion.php");
class administrador
{

   function insertar($usuario_ad,$contrasenia_ad,$nombre_ad,$apellido_ad,$direccion_ad,$telefono_ad,$correo_ad)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO administrador (usuario_ad, contrasenia_ad, nombre_ad, apellido_ad, direccion_ad, telefono_ad, correo_ad) values ('%s','%s','%s','%s','%s','%s','%s')",$usuario_ad,$contrasenia_ad,$nombre_ad,$apellido_ad,$direccion_ad,$telefono_ad,$correo_ad);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	}

	function actualizar($id_ad,$usuario_ad,$contrasenia_ad,$nombre_ad,$apellido_ad,$direccion_ad,$telefono_ad,$correo_ad)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("UPDATE administrador SET usuario_ad='%s', contrasenia_ad='%s', nombre_ad='%s', apellido_ad='%s', direccion_ad='%s', telefono_ad='%d',correo_ad='%s' WHERE id_ad='%s'",$usuario_ad,$contrasenia_ad,$nombre_ad,$apellido_ad,$direccion_ad,$telefono_ad,$correo_ad,$id_ad);
		$result=mysql_query($query,$dbconexion);
		//echo($query);
	}
	
	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from administrador";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
	
	function consultarId($id_ad){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from administrador where id_ad='%s'",$id_ad);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}

}
?>