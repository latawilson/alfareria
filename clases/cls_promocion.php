<?php
require_once("cls_conexion.php");
class promocion
{
	function insertar($nombre_prom,$producto_id_pro,$fecha_inicio_prom,$fecha_fin_prom,$descuento_prom,$imagen_prom)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO promocion (nombre_prom,producto_id_pro,fecha_inicio_prom,fecha_fin_prom,descuento_prom,imagen_prom) values ('%s','%s','%s','%s','%s','%s')",$nombre_prom,$producto_id_pro,$fecha_inicio_prom,$fecha_fin_prom,$descuento_prom,$imagen_prom);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	}
 

	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from promocion";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}

function consultarid_pro($id_prom){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from promocion where id_prom='%s'",$id_prom);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);	
		return $row;
	}

function actualizar($id_prom,$nombre_prom,$producto_id_pro,$fecha_inicio_prom,$fecha_fin_prom,$descuento_prom,$imagen_prom)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf(" UPDATE promocion SET nombre_prom ='%s',producto_id_pro='%s', fecha_inicio_prom='%s',fecha_fin_prom='%s', descuento_prom='%s', imagen_prom='%s' WHERE id_prom='%s'",$nombre_prom,$producto_id_pro,$fecha_inicio_prom,$fecha_fin_prom,$descuento_prom,$imagen_prom,$id_prom);
		$result=mysql_query($query,$dbconexion);
		echo($query);
	}
	
	function eliminar($id_prom)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("DELETE  FROM promocion WHERE id_prom='%s'",$id_prom);
		$result=mysql_query($query,$dbconexion);
	}
	function consultarId2($id_prom){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("
             select a.*, b.id_pro 
             from 
             promocion a,
              producto b 
              where a.id_prom='%s'
               and
                a.producto_id_pro = b.id_pro
"
			  ,$id_prom);
	
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);		
		return $row;
	}
}
?>