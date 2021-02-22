<?php
include_once("../clases/cls_pedido.php");
$obj_pedido= new pedido();
$obj_pedido->actualizar(
	$_POST ['id_ped'],
	$_POST ['administrador_id_ad'], 
	$_POST ['cliente_id_cli'],
	$_POST ['fecha_ped'], 
	$_POST ['estado_ped'],
	$_POST ['total_ped'], 
	$_POST ['pdf_compro_ped'],
	$_POST ['fecha_compro_ped'], 
	$_POST ['direccion_entriega_ped']
);

header('Location: pedido.php');
?>

<?php/*

$nombre_imagen=$_FILES['imagen_al']['name'];
$tipo_imagen=$_FILES['imagen_al']['type'];
$tamagno_imagen=$_FILES['imagen_al']['size'];


$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/proyecto_practicas/bd_ver2.1/alfareria_php_contrario/imagen_alfa/';

move_uploaded_file($_FILES['imagen_al']['tmp_name'], $carpeta_destino.$nombre_imagen);*/

?>