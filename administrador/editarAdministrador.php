<?php
include_once("../clases/cls_administrador.php");
$obj_admin= new administrador();
$obj_admin->actualizar($_POST['id_ad'],$_POST['usuario_ad'],$_POST['contrasenia_ad'],$_POST['nombre_ad'],$_POST['apellido_ad'],$_POST['direccion_ad'],$_POST['telefono_ad'],$_POST['correo_ad']);
header('Location: administrador.php');
?>