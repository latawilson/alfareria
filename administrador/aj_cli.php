  
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
      <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <script type="text/javascript">
      function sololetras(e){
         key=e.keyCode || e.which;
         teclado=String.fromCharCode(key).toLowerCase();
         letras=" abcdefghijklmn&ntildeopqrstuvwxyz";
         especiales="8-37-38-46-164";
         teclado_especial=false;
         for(var i in especiales){
          if(key==especiales[i]){
            teclado_especial=true;break;
          }
         }
         if(letras.indexOf(teclado)==-1 && !teclado_especial){
          return false;
         }
      }
    </script>
    <script type="text/javascript">
      function solonumeros(e){
         key=e.keyCode || e.which;
         teclado=String.fromCharCode(key);
         numero="0123456789";
         especiales="8-37-38-46";
         teclado_especial=false;
         for(var i in especiales){
          if(key==especiales[i]){
            teclado_especial=true;
          }
         }
         if(numero.indexOf(teclado)==-1 && !teclado_especial){
          return false;
         }
      }
    </script>
    <script type="text/javascript">
      function maxlengthNumber(obj){
        console.log(obj.value);
        if(obj.value.length > obj.maxlength){
          obj.value = obj.value.slice(0. obj.maxlength);
        }
      }
    </script>
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