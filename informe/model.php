<?php
class ventas{
	private $conexion;
	function __construct()
	{
		require_once('conexion.php');
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}


	function ventafuncion(){
		$sql ="SELECT 
		u.nombre_cli, 
		u.apellido_cli, 
		ub.id_ped,
		ub.fecha_ped, 
		ub.estado_ped,
		ub.total_ped,
		ub.pdf_compro_ped,
		ub.fecha_compro_ped,
		ub.direccion_entriega_ped

		from 
		pedido ub,
		cliente u 

		where ub.cliente_id_cli =  u.id_cli ";
	//	$sql = "SELECT fechaVenta, montoVenta from ventas";	
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();	
		}
	}

	function traerparametro($fechainicio, $fechafin){

		$sql = "CALL DATOSPARAMETROS('$fechainicio','$fechafin')";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();	
		}
	}
}
?>