
<?php
  header('Content-Type: text/html; charset=ISO-8859-1');
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 

  $isValid = False; 

  if (!empty($UserName)) { 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 

    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../loginres-adm.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "../loginres-adm.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

?>

<?php
require_once("../clases/cls_promocion.php");
$obj_promocion= new promocion();
$row=$obj_promocion->consultarid_pro($_GET['id_prom']);
?>
<?php
 require_once ("../clases/cls_promocion.php");
 $obj_prom = new promocion ();
 $resultprom= $obj_prom->consultarId2($_GET['id_prom']);
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Alfarer&iacuteas editar</title>
  <link rel="stylesheet" href="../css/editaralfareria.css">
  <link rel="stylesheet" href="../css/alfarerias.css">
    <link rel="stylesheet" href="../css/alfa_admin.css">
  <link rel="stylesheet" href="../css/fonts1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/administrador.css">
     <link rel="stylesheet" href="../css/jquery-ui.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" href="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" href="../js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.coustom/jquery-ui.css">
  <script src="jquery-3.4.1.min.js" ></script>
  <script src="../js/jquery-ui-1.12.1.coustom/jquery-ui.js" type="text/javascript"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
   $(function() {
    $("#calen").datepicker({dateFormat:'yy-mm-dd'});
  });
  $(function() {
    $( "#calen1").datepicker({dateFormat: 'yy-mm-dd'});
  });

</script>

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
  <div class="log">
    <br>
    <center>
          <IMG src="../images/logue.png"alt="Smiley face" height="140" width="130">
      </center>
   </div>
    <div class="caer" style="background: #fff; width: 120px; height: 30px; padding: 5px; margin-left: 90%; border-radius: 10px;
    position: absolute; margin-top: -95px; background-color: rgb(232,129,9, .7);">

    	<a style="text-decoration: none;   color: #fff;" href="<?php echo $logoutAction ?>"><span style="margin-right: 10px;"class="icon-exit icon"></span>Cerrar Sesi&oacuten</a>
   
</div>
   <div class="navigation-alfa1">
  <p><a href="../index_admin.php">Inicio </a> /<a href="promociones.php">Promociones </a> / <strong>Editar Promoci&oacuten</strong></p>
  
   </div>
 <header>
  <div class="menu_bar">
    <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
  </div>
  <nav>
    <ul>
      <li><a  href="#"><span class="icon-tree icon"></span>Gesti&oacuten de desarrollo</a>
      <ul >
        <li><a  href="alfarerias.php"><span class="icon-home icon"></span>Alfarer&iacutea</a></li>
          <li><a  href="../producto/productos.php"><span class="icon-mug icon"></span>Producto</a></li>
          <li><a  href="../administrador/administrador.php"><span class="icon-calendar icon"></span>Administrador</a></li>
          <li><a  href="../usuario/lista_usuarios.php"><span class="icon-address-book icon"></span>Clientes</a></li>
      </ul>
      </li>
      <li><a  href="../administrador/pedido.php"><span class="icon-cart icon"></span>Pedidos</a></li>
      <li><a  href="#"><span class="icon-calendar icon"></span>Reportes</a></li>
      <li><a  href="../informe/informes.php"><span class="icon-wrench icon"></span>Informaci&oacuten</a></li>
      <li><a  href="promociones.php"><span class="icon-gift icon"></span>Promociones</a></li>
      <li><a  href="../index.php"><span class="icon-database icon"></span>Revisi&oacuten de Interfaz</a></li>
    </ul>
  </nav>
</header>

  <div class="contenedor-alfa3">
     <section class="form_wrap">

         <section >
          <img src="../imagen_prom/<?php echo($row['imagen_prom']); ?>" width="400px" height="600px">
        </section>

<form enctype="multipart/form-data" method="post" name="form1" action="editar_pro.php" class="form_contact">
            <h2>Editar Promoci&oacuten</h2>
            <div class="user_info">

                <label for="names">Nombre  de la promoci&oacuten </label>
                <input style="text-transform: uppercase;"  name="nombre_prom" type="text" id="names" value="<?php echo($row['nombre_prom']); ?>" maxlength="15" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required>
                 <label for="email"> Fecha inicial de la promoci&oacuten </label>
                <input  type="text" id="calen" name="fecha_inicio_prom" readonly="" value="<?php echo($row['fecha_inicio_prom']); ?>">

                <label for="email">Fecha final de la promoci&oacuten </label>
                <input type="text" id="calen1" name="fecha_fin_prom" readonly="" value="<?php echo($row['fecha_fin_prom']); ?>">

                <label for="phone"> Porcentaje de descuento </label>
                <input name="descuento_prom" type="text" id="direccion" value="<?php echo($row['descuento_prom']); ?>"maxlength="10" oninput="maxlengthNumber(this);" required onkeypress="return solonumeros(event)" onpaste="return false" required="">
                <h2>Seleccione la imagen del promoci&oacuten</h2>
                <input name="imagen_prom" type="file" name=" Examinar" value="<?php echo($row['imagen_prom']); ?>" required>
                <label for="phone"> Nombre del  Producto  </label>
                 <select name="producto_id_pro" type="text" style="margin: 10px;   border-left:4px solid rgb(208,101,3, .7);
  border-bottom:4px solid rgb(208,101,3, .7); height: 40px;"  >
                   <option  value="0"> Todas las Productos</option>
                        <?php
                        require_once("../clases/cls_producto.php");
                        $obj_producto= new producto();
                        $result=$obj_producto->consultar();
                        $datos= array();
                        ?>
                        <?php
                        while($row= mysql_fetch_array($result))
                        {
                        ?>    
                        <option <?php if ($resultprom['producto_id_pro']==$row['id_pro']) echo('selected')?> value="<?php echo($row['id_pro']); ?>"><?php echo($row['nombre_pro']); ?></option>

                        <?php 
                        }
                        ?>
                        </select>
<?php
require_once("../clases/cls_promocion.php");
$obj_promocion= new promocion();
$row=$obj_promocion->consultarid_pro($_GET['id_prom']);
?>
               
                 
                <input style="display:none" name="id_prom" type="text" value="<?php echo($row['id_prom']); ?>" readonly >
                 <input type="submit" value="Editar">

            </div>
        </form>

    </section>

  </div>

<footer>
   <div class="foot">
            <p>
                        Copyright &copy; All rights reserved | Alfarerias La Victoria      
            </p>
        </div>
</footer>

  

</body>
</html>