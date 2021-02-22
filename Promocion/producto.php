  
</div>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="css/producto.css">
    <link rel="stylesheet" href="../css/alfa_admin.css">
	<link rel="stylesheet" href="../css/fonts1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../administrador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
  	<?php
 require_once ("../clases/cls_producto1.php");
 $obj_producto = new producto();
 $resultProducto = $obj_producto->consult($_GET['id']);
 $datos = array ();
?>

<div id="producto_id_pro" name="producto_id_pro">
         
  <?php
  while ( $row = mysql_fetch_array ( $resultProducto) ) {
    ?> 

  			<div class="contenedor-peq"  style=" width: 20%">
             <div class="info1">
             <center><p class="titulo"><?php echo($row['nombre_pro']); ?></p></center> 
            </div>
		        <div class="imagen">
			        <img src="imagen_pro/<?php echo($row['imagen_pro']); ?>" class="imagen">
		        </div>
		        <div class="info">
			        <p class="titulo">Cantidad: <?php echo($row['cantidad_pro']); ?></p>
			        <p class="titulo">Precio: <?php echo($row['precio_pro']); ?></p>

			        

		        </div>
	        </div>

  <?php
    }
    ?> 
  </body>
  </html>