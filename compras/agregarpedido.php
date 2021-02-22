<?php
include_once ("../clases/cls_pedido.php");

//echo($_GET['txtEmpr']);
 $target_path = "../imagen_con/";
	$target_path = $target_path . basename( $_FILES['pdf_compro_ped']['name']); 
	if(move_uploaded_file($_FILES['pdf_compro_ped']['tmp_name'], $target_path)) 
	{
	    echo "El archivo ".  basename( $_FILES['pdf_compro_ped']['name']). 
	    " ha sido subido";
	       $obj_pedido = new pedido ();
				//echo($_GET['txtEmpr']);
			$obj_pedido->insertar ( 
		$_POST ['administrador_id_al'], 
		$_POST ['cliente_id_cli'],
		$_POST ['fecha_ped'], 
		$_POST ['estado_ped'],
		$_POST ['total_ped'], 
		$_FILES['pdf_compro_ped']['name'],
		$_POST ['fecha_compro_ped'], 
		$_POST ['direccion_entriega_ped']
		 );

       $last_id = $obj_pedido->insertId ();

//DETALLE
//Inserci&oacuten para los registros del detalle
$detail = $_POST["item"];
include_once ("../clases/cls_detalle.php");
$obj_pedido_detalle = new detalle ();

for ($i = 0; $i < sizeof($detail['id_pro']); $i++) {	
	$obj_pedido_detalle->insertar ($detail['id_pro'][$i],$last_id,  $detail['cantidad'][$i], $detail['total'][$i] );	
}
include_once ("../clases/cls_producto.php");
$obj_pedido_detalle = new producto();

for ($i = 0; $i < sizeof($detail['id_pro']); $i++) {	
	$obj_pedido_detalle->actualizarpro ($detail['id_pro'][$i],$detail['subtotal'][$i] );	
}


header('Location: thankyou.php');
	} else{
	    echo "Ha ocurrido un error, trate de nuevo!";
	}

?>