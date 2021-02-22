<?php
require_once("cls_conexion.php");
class alfareria
{
	function insertar($nombre_al,$direccion_al,$propietario_al,$descripcion_al,$telefono_al,$imagen_al)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO alfareria (nombre_al,direccion_al,propietario_al,descripcion_al,telefono_al,imagen_al) values ('%s','%s','%s','%s','%s','%s')",$nombre_al,$direccion_al,$propietario_al,$descripcion_al,$telefono_al,$imagen_al);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	}
	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from alfareria";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
	/// traer todo 
	function consultarid_al($id_al){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from alfareria where id_al='%s'",$id_al);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}

	function actualizar($id_al,$nombre_al,$direccion_al,$propietario_al,$descripcion_al,$telefono_al,$imagen_al)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("UPDATE alfareria SET nombre_al='%s', direccion_al='%s', propietario_al='%s', descripcion_al='%s', telefono_al='%s', imagen_al='%s'WHERE id_al='%s'",$nombre_al,$direccion_al,$propietario_al,$descripcion_al,$telefono_al,$imagen_al,$id_al);
		$result=mysql_query($query,$dbconexion);
		//echo($query);
	}
	function consultarId2($id_al){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("
            select a.*, b.id_pro, from alfareria a, producto b where a.id_al='%s' and a.id_al= b.alfareria_id_al
"
			  ,$id_al);
	
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);		
		return $row;
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