<?php
require_once("cls_conexion.php");
class asignatura
{
	function insertar($nombre,$codigo)
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
	
	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from asignatura";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
	
	function consultarId($id){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from asignatura where id='%s'",$id);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);

		return $row;
	}

	function eliminar($id)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("DELETE  FROM asignatura WHERE id='%s'",$id);
		$result=mysql_query($query,$dbconexion);
	}

	//// consultar nombre
	function consult($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from cliente where id_cli='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);

		return $result;
	} 

	/// traer TRIDUTOS
	function consultarid_alp($usuario_cli){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from alfareria where usuario_cli='%s'",$usuario_cli);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);

		return $row;
	}

	function ClientPDF($id_cli,$id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select DISTINCT u.nombre_cli, u.apellido_cli, ub.id_ped, ub.cliente_id_cli, ub.fecha_ped, ub.estado_ped, ub.total_ped , ub.fecha_compro_ped, ub.direccion_entriega_ped,  
			group_concat( DISTINCT concat(p.nombre_pro,'  Cant.  ', dp.cantidad_depe , '  $  ', p.precio_pro) separator '\n') as todo FROM pedido ub,cliente u, detalle_pedido dp, producto p
			where( ub.cliente_id_cli = u.id_cli and cliente_id_cli='%s') and (dp.producto_id_pro =  p.id_pro and dp.pedido_id_ped='%s')",$id_cli,$id_ped);
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
}
?>