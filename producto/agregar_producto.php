<?php
include_once("../clases/cls_producto.php");

//echo($_GET['txtEmpr']);
 $target_path = "../imagen_pro/";
	$target_path = $target_path . basename( $_FILES['imagen_pro']['name']); 
	if(move_uploaded_file($_FILES['imagen_pro']['tmp_name'], $target_path)) 
	{
	    echo "El archivo ".  basename( $_FILES['imagen_pro']['name']). 
	    " ha sido subido";
       $obj_producto= new producto();
		//echo($_GET['txtEmpr']);
		$obj_producto->insertar(

			$_POST['nombre_pro'],
			$_POST['clasificacion_id_clas'],
			$_POST['alfareria_id_al'],
			$_POST['cantidad_pro'],
			$_POST['tamanio_pro'],
			$_POST['descripcion_pro'],
			$_FILES['imagen_pro']['name'],
			$_POST['precio_pro']
		);
		header('Location: productos.php');
	} else{
	    echo "Ha ocurrido un error, trate de nuevo!";
	}

?>

