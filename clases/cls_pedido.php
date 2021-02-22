<?php
require_once("cls_conexion.php");
class pedido
{

   function insertar($administrador_id_ad,$cliente_id_cli,$fecha_ped,$estado_ped,$total_ped,$pdf_compro_ped,$fecha_compro_ped,$direccion_entriega_ped)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("INSERT INTO pedido (administrador_id_ad, cliente_id_cli, fecha_ped, estado_ped, total_ped, pdf_compro_ped, fecha_compro_ped, direccion_entriega_ped) values ('%s','%s','%s','%s','%s','%s','%s','%s')",$administrador_id_ad,$cliente_id_cli,$fecha_ped,$estado_ped,$total_ped,$pdf_compro_ped,$fecha_compro_ped,$direccion_entriega_ped);
		$result=mysql_query($query,$dbconexion);
		echo($query);
		
	}
	function insertId(){
		//printf("Last inserted record has id %d\n", mysql_insert_id());
		return mysql_insert_id();
	}

	function actualizar($id_ped,$administrador_id_ad,$cliente_id_cli,$fecha_ped,$estado_ped,$total_ped,$pdf_compro_ped,$fecha_compro_ped,$direccion_entriega_ped)
	{
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("UPDATE pedido SET administrador_id_ad='%s', cliente_id_cli='%s', fecha_ped='%s', estado_ped='%s', total_ped='%s', pdf_compro_ped='%s',fecha_compro_ped='%s',direccion_entriega_ped='%s' WHERE id_ped='%s'",$administrador_id_ad,$cliente_id_cli,$fecha_ped,$estado_ped,$total_ped,$pdf_compro_ped,$fecha_compro_ped,$direccion_entriega_ped,$id_ped);
		$result=mysql_query($query,$dbconexion);
		//echo($query);
	}
	
	function consultar(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select * from pedido";
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


////////consultar pedido
	function consultarid_ped($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from pedido where id_ped='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}
	//////consultar con el nombre del cliente 
		function consultarid_pede($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select
b.nombre_cli,
b.apellido_cli,
a.`id_ped`,
a.`administrador_id_ad`,
a.`cliente_id_cli`,
a.`fecha_ped`,
a.`estado_ped`,
a.`total_ped`,
a.`pdf_compro_ped`,
a.`fecha_compro_ped`,
a.`direccion_entriega_ped`
FROM 
pedido a,
cliente b
WHERE a.`cliente_id_cli` = b.id_cli and a.id_ped ='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $row;
	}

	////////// consultar cliente 
		function consult($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select * from pedido where cliente_id_cli='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $result;
	} 
	////////// consultar pedido de cliente x id
		function consultarid_pedido($id_ped){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query=sprintf("Select
        u.nombre_cli, 
        u.apellido_cli, 
        ub.id_ped,
        ub.cliente_id_cli,
        ub.fecha_ped, 
        ub.estado_ped,
        ub.total_ped,
        ub.pdf_compro_ped,
        ub.fecha_compro_ped,
        ub.direccion_entriega_ped

		FROM 
		pedido ub,
		cliente u 

		where ub.cliente_id_cli =  u.id_cli and cliente_id_cli='%s'",$id_ped);
		$result=mysql_query($query,$dbconexion);
		//$row = mysql_fetch_assoc($result);	
		//echo($query);
			
		return $result;
	} 
	function consultart(){
		$conex=new DBConexion();
		$dbconexion=$conex->conexion;
		$query="Select 
		u.nombre_cli, 
        u.apellido_cli, 
        ub.id_ped,
        ub.cliente_id_cli,
        ub.fecha_ped, 
        ub.estado_ped,
        ub.total_ped,
        ub.pdf_compro_ped,
        ub.fecha_compro_ped,
        ub.direccion_entriega_ped

		FROM 
		pedido ub,
		cliente u 

		where ub.cliente_id_cli =  u.id_cli ";
		$result=mysql_query($query,$dbconexion);
		return $result;
	}
}
?>