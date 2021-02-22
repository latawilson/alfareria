<?php
 require_once ("../clases/cls_producto.php");
 $obj_pro = new provincia ();
 $resultPro = $obj_pro->consultarId($_GET['id']);
 $datos = array ();
?>

<select id="pro" onchange="cargarCiudad(this)">       
  <?php
  while ( $row = mysql_fetch_array ( $resultPro ) ) {
    ?>  
    <option value="<?php echo($row['id_pro']); ?>"><?php echo($row['nombre_pro']); ?></option>                  
  <?php
    }
    ?>    
</select>
