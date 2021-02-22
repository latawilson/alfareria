<?php
include_once("../clases/cls_pedido.php");

//echo($_GET['txtEmpr']);
 $target_path = "../imagen_con/";
	$target_path = $target_path . basename( $_FILES['pdf_compro_ped']['name']); 
	if(move_uploaded_file($_FILES['pdf_compro_ped']['tmp_name'], $target_path)) 
	{
	    echo "El archivo ".  basename( $_FILES['pdf_compro_ped']['name']). 
	    " ha sido subido";
       $obj_pedido= new pedido();
	   $obj_pedido->actualizar(
		$_POST ['id_ped'],
		$_POST ['administrador_id_ad'], 
		$_POST ['cliente_id_cli'],
		$_POST ['fecha_ped'], 
		$_POST ['estado_ped'],
		$_POST ['total_ped'], 
		$_FILES['pdf_compro_ped']['name'],
		$_POST ['fecha_compro_ped'], 
		$_POST ['direccion_entriega_ped']
);

header('Location: ../loginres1.php');
	} else{
	    echo "Ha ocurrido un error, trate de nuevo!";
	}

?>