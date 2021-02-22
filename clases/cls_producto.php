<?php
require_once("cls_conexion.php");
class producto
{
	function insertar($nombre_pro,$clasificacion_id_clas,$alfareria_id_al,$cantidad_pro,$tamanio_pro,$descripcion_pro,$imagen_pro,$precio_pro)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO producto (nombre_pro,clasificacion_id_clas,alfareria_id_al,cantidad_pro,tamanio_pro,descripcion_pro,imagen_pro,precio_pro) values ('%s','%s','%s','%s','%s','%s','%s','%s')",$nombre_pro,$clasificacion_id_clas,$alfareria_id_al,$cantidad_pro,$tamanio_pro,$descripcion_pro,$imagen_pro,$precio_pro);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	}

	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from producto  where  cantidad_pro>'0'";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}

function consultarid_pro($id_pro){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from producto where id_pro='%s'",$id_pro);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}
function consult($id_pro){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select u.nombre_al, ub.nombre_pro,ub.cantidad_pro,ub.id_pro,ub.alfareria_id_al,ub.tamanio_pro,ub.descripcion_pro,ub.imagen_pro,ub.precio_pro

from producto ub, alfareria u

where ub.alfareria_id_al = u.id_al  and ub.cantidad_pro>'0' and ub.alfareria_id_al='%s'",$id_pro);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $result;
	} 

	//////traer nombre del producto
function consult2($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from producto where id_pro='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $result;
	} 

function actualizar($id_pro,$nombre_pro,$clasificacion_id_clas,$alfareria_id_al,$cantidad_pro,$tamanio_pro,$descripcion_pro,$imagen_pro,$precio_pro)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("UPDATE producto SET nombre_pro='%s', clasificacion_id_clas='%s',alfareria_id_al='%s', cantidad_pro='%s',tamanio_pro='%s', descripcion_pro='%s',imagen_pro='%s', precio_pro='%s' WHERE id_pro='%s'",$nombre_pro,$clasificacion_id_clas,$alfareria_id_al,$cantidad_pro,$tamanio_pro,$descripcion_pro,$imagen_pro,$precio_pro,$id_pro);
		$result=mysql_query($query,$dbconexion);
		//echo($query);
	}
	function consultarId2($id_pro){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("
select a.*, b.id_al from producto a, alfareria b where a.id_pro='%s' and a.alfareria_id_al = b.id_al
"
			  ,$id_pro);
	
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);		
		return $row;
	}
		function consultarId3($id_pro){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("
select a.*, b.id_al from producto a, alfareria b where a.id_pro='%s' and a.alfareria_id_al = b.id_al
"
			  ,$id_pro);
	
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);		
		return $row;
	}

	function consultarId($id){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		//$query=sprintf("Select * from provincia where id_provincia='%s'",$id);
		$query=sprintf("Select * from producto where id_pro='%s'",$id);
		//SWFSound(filename)echo($query);
		$result=mysql_query($query,$dbconexion);		
		return $result;
	}

function consultpromocion($id_pro){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select 
u.nombre_al, 
ub.nombre_pro,
ub.cantidad_pro,
ub.id_pro,
ub.alfareria_id_al,
ub.tamanio_pro,
ub.descripcion_pro,
ub.imagen_pro,
ub.precio_pro,
p.`id_prom`,
p.`producto_id_pro`,
p.`nombre_prom`,
p.`fecha_inicio_prom`,
p.`fecha_fin_prom`,
p.`descuento_prom`,
p.imagen_prom

from producto ub, alfareria u, promocion p

where ub.alfareria_id_al = u.id_al and p.`producto_id_pro` = ub.id_pro and ub.cantidad_pro>'0' and ub.alfareria_id_al='%s'",$id_pro);
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

function actualizarpro($id_pro,$cantidad_pro)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("UPDATE producto SET  cantidad_pro='%s' WHERE id_pro='%s'",$cantidad_pro,$id_pro);
		$result=mysql_query($query,$dbconexion);
		//echo($query);
	}

}
?>