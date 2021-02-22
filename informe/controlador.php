<?php 

require 'model.php';
$mg = new ventas();
$consulta =$mg-> ventafuncion();
echo json_encode($consulta);

 ?>