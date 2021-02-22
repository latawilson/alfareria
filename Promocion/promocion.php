﻿<?php
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

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Promociones </title>
  <link rel="stylesheet" href="../css/alfarerias.css">
    <link rel="stylesheet" href="../css/alfa_admin.css">
  <link rel="stylesheet" href="../css/fonts1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/editaralfareria.css">
    <link rel="stylesheet" href="../css/administrador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
      <div class="log">
    <br>
    <center>
          <IMG src="../images/logue.PNG"alt="Smiley face" height="140" width="130">
      </center>
   </div>
   <div class="caer" style="background: #fff; width: 120px; height: 30px; padding: 5px; margin-left: 90%; border-radius: 10px;
    position: absolute; margin-top: -95px; background-color: rgb(232,129,9, .7);">

    	<a style="text-decoration: none;   color: #fff;" href="<?php echo $logoutAction ?>"><span style="margin-right: 10px;"class="icon-exit icon"></span>Cerrar Sesi&oacuten</a>
   
</div>

   <div class="navigation-alfa1">
  <p><a href="../index_admin.php">Inicio </a> / <strong>Promocioness</strong></p>
  <a href="crear-promocion.php"><p class="add"> <strong>+</strong>Agregar Promoci&oacuten </p></a>
   </div>
 <header>
  <div class="menu_bar">
    <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
  </div>
  <nav>
    <ul>
      <li><a  href="#"><span class="icon-tree icon"></span>Gesti&oacuten de desarrollo</a>
      <ul >
        <li><a  href="../alfareria/alfarerias.php"><span class="icon-home icon"></span>Alfarer&iacutea</a></li>
          <li><a  href="productos.php"><span class="icon-mug icon"></span>Producto</a></li>
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
<?php
require_once("../clases/cls_promocion.php");
$obj_promocion = new promocion();
$result=$obj_promocion->consultar();
$datos= array();
?>
  <div class="contenedor-alfa1">
    <?php
while($row= mysql_fetch_array($result))
{
?>
      <div class="contenedor-peq">
             <div class="info1">
             <center><p class="titulo"><?php echo($row['nombre_prom']); ?></p></center> 
            </div>
            <div class="imagen">
             
              <img src="../imagen_prom/<?php echo($row['imagen_prom']); ?>" class="imagen">


            </div>
            <div class="info">
              <p class="titulo">Descuento: <?php echo($row['descuento_prom']); ?>%</p>
               <a class="btn btn-warning btn-sm link2" href="editar-pr.php?id_prom=<?php echo($row['id_prom']);?>" ><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                  <a class="btn btn-warning btn-sm link2" href="eliminar_promocion.php?id_prom=<?php echo($row['id_prom']);?>"></span>Eliminar</a>
             
             
            </div>
          </div>
<?php 
}
?> 
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


















































