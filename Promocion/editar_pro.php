<?php
include_once("../clases/cls_promocion.php");

//echo($_GET['txtEmpr']);
 $target_path = "../imagen_prom/";
	$target_path = $target_path . basename( $_FILES['imagen_prom']['name']); 
	if(move_uploaded_file($_FILES['imagen_prom']['tmp_name'], $target_path)) 
	{
	    echo "El archivo ".  basename( $_FILES['imagen_prom']['name']). 
	    " ha sido subido";
			     	 $obj_promocion= new promocion();
					$obj_promocion->actualizar(
					  $_POST['id_prom'],
						$_POST['nombre_prom'],
						$_POST['producto_id_pro'],
						$_POST['fecha_inicio_prom'],
						$_POST['fecha_fin_prom'],
						$_POST['descuento_prom'],
						$_FILES['imagen_prom']['name']
			);
			header('Location: promociones.php');
	} else{
	    echo "Ha ocurrido un error, trate de nuevo!";
	}

?>