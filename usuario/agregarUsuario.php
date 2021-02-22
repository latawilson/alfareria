<?php
include_once("../clases/cls_usuario.php");
$obj_asu= new usuario();
//echo($_GET['txtEmpr']);
$obj_asu->insertar($_POST['nombre_cli'],$_POST['apellido_cli'],$_POST['usuario_cli'],$_POST['contrasenia_cli'],$_POST['telefono_cli'],$_POST['direccion_cli']);
header('Location: ../index.php');
?>