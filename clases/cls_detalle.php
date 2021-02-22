<?php
require_once("cls_conexion.php");
class detalle
{

   function insertar($producto_id_pro,$pedido_id_ped,$cantidad_depe,$sub_total_depe)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO detalle_pedido (producto_id_pro, pedido_id_ped, cantidad_depe, sub_total_depe) values ('%s','%s','%s','%s')",$producto_id_pro,$pedido_id_ped,$cantidad_depe,$sub_total_depe);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	} 
	function insertId(){
		//printf("Last inserted record has id %d\n", mysql_insert_id());
		return mysql_insert_id();
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
		$query="Select * from detalle_pedido";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
	
	function consultarid_ped($id_depe){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from detalle_pedido where id_depe='%s'",$id_depe);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}

function consult($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from detalle_pedido where pedido_id_ped='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $result;
	}
	function consulte($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select u.nombre_pro, ub.cantidad_depe,ub.pedido_id_ped, ub.sub_total_depe  FROM detalle_pedido ub,producto u where ub.producto_id_pro =  u.id_pro and ub.pedido_id_ped='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $result;
	}

}
?>