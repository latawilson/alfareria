<?php
include_once("clases/cls_asignatura.php");
$obj_asignatura= new asignatura();
$obj_asignatura->eliminar($_GET['id']);
header('Location: asignaturas.php');
?>