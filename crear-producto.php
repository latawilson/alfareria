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

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Crear Producto</title>
	<link rel="stylesheet" href="../css/editaralfareria.css">
  <link rel="stylesheet" href="../css/Alfarerias.css">
    <link rel="stylesheet" href="../css/alfa_admin.css">
	<link rel="stylesheet" href="../css/fonts1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/administrador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
	<p><a href="../index_admin.php">Inicio </a> /<a href="productos.php">Producto </a> / <strong>Craer Producto</strong></p>
	
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
      <li><a  href="../Promocion/promociones.php"><span class="icon-gift icon"></span>Promociones</a></li>
      <li><a  href="../index.php"><span class="icon-database icon"></span>Revisi&oacuten de Interfaz</a></li>
		</ul>
	</nav>
</header>

	<div class="contenedor-alfa3">
		


		 <section class="form_wrap">
		 <section class="form_wrap">
        <section >
        	<img src="../images/dec4.jpg" width="400px" height="600px">
        </section>

        <form method="post" name="form1" action="agregar_producto.php" class="form_contact">
            <h2>Producto</h2>
            <div class="user_info">
                <label for="names">Nombre producto</label>
                <input style="text-transform: uppercase;" name="nombre_pro" type="text" id="names">

                <label for="phone">Cantidad </label>
                <input name="cantidad_pro" type="number" id="direccion">

                <label for="email">Tama&ntildeo del producto</label>
                <input name="tamanio_pro" type="text" id="email">

                <label for="names">Precio</label>
                <input name="precio_pro" type="text" id="names">

                <label for="phone">Nombre de la alfarer&iacutea</label>
              <!--  <div id="divalfarereria">
                <select name="alfareria_id_al" onchange="cargarCiudad(this)">
                <option> </option>
                </select>
                </div>-->
                <select name="alfareria_id_al" type="text" style="margin: 10px;   border-left:4px solid rgb(208,101,3, .7);
  border-bottom:4px solid rgb(208,101,3, .7); height: 40px;"  >
                   <option  value="0"> Todas las Alfarer&iacuteas</option>
<?php
require_once("../clases/cls_alfareria.php");
$obj_alfareria= new alfareria();
$result=$obj_alfareria->consultar();
$datos= array();
?>
<?php
while($row= mysql_fetch_array($result))
{
?>    
<option value="<?php echo($row['id_al']); ?>"><?php echo($row['nombre_al']); ?> </option>
<?php 
}
?>

                </select>
             <!--   <input name="alfareria_id_al" type="text" id="direccion">-->

                <label for="phone">Tipo de producto</label>

             <select name="clasificacion_id_clas" type="text"  style="margin: 10px;   border-left:4px solid rgb(208,101,3, .7);
  border-bottom:4px solid rgb(208,101,3, .7); height: 40px;"   >
                <option value="0"> Todas las clasificaciones</option>
<?php
require_once("../clases/cls_clasificacion.php");
$obj_classificacion= new clasificacion();
$result=$obj_classificacion->consultar();
$datos= array();
?>
<?php
while($row= mysql_fetch_array($result))
{
?>    
<option  value="<?php echo($row['id_clas']); ?>"><?php echo($row['nombre_clas']); ?> </option>
<?php 
}
?>
</select>
               <!-- <input name="clasificacion_id_clas" type="text" id="direccion">-->

                <label for="mensaje">Descripci&oacuten *</label>
                 <input style="text-transform: uppercase;" name="descripcion_pro" id="mensaje" id="names">

                 <h2>Seleccione la imagen del producto</h2>
                <input name="imagen_pro" type="file" name=" Examinar" >

                <input type="submit" value="Guardar" id="btnSend">
            </div>
        </form>

    </section>
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



















































