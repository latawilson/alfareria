<?php 
	require 'model.php';
	$fechainicio = $_POST['inicio'];
	$fechafin  = $_POST['fin'];
	$mg = new ventas();
	$consulta =$mg-> traerparametro($fechainicio, $fechafin);
	echo json_encode($consulta);
?>