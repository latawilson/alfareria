<?php
 require_once ("../clases/cls_producto1.php");
 $obj_producto = new producto();
 $resultProducto = $obj_producto->consult($_GET['id']);
 $datos = array ();
?>

<select id="producto_id_pro" name="producto_id_pro">
  <option value="0">Productos </option>          
  <?php
  while ( $row = mysql_fetch_array ( $resultProducto) ) {
    ?>  
    <option value="<?php echo($row['id_pro']); ?>"><?php echo($row['nombre_pro']); ?></option>                  
  <?php
    }
    ?>    
</select>
