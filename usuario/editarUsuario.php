
<?php
include_once("../clases/cls_usuario.php");
$obj_usu= new usuario();
$obj_usu->actualizar($_POST['id_cli'],$_POST['nombre_cli'],$_POST['apellido_cli'],$_POST['usuario_cli'],$_POST['contrasenia_cli'],$_POST['telefono_cli'],$_POST['direccion_cli']);
header('Location: ../loginres1.php');
?>