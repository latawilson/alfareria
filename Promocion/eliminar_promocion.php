<?php
include_once("../clases/cls_promocion.php");
$obj_promocion = new promocion();
$obj_promocion->eliminar($_GET['id_prom']);

header('Location: promociones.php');