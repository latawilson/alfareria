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
require_once("../clases/cls_pedido.php");
$obj_pedido= new pedido();
$row=$obj_pedido->consultarid_pede($_GET['id_ped']);
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pedido editar</title>
	<link rel="stylesheet" href="../css/editaralfareria.css">
	<link rel="stylesheet" href="../css/alfarerias.css">
    <link rel="stylesheet" href="../css/alfa_admin.css">
	<link rel="stylesheet" href="../css/fonts1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/administrador.css">
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
	<p><a href="../index_admin.php">Inicio </a></a> / <strong>Editar estado de pedido</strong></p>
	
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
			    <li><a  href="../producto/productos.php"><span class="icon-mug icon"></span>Producto</a></li>
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

         <section >
        	<img src="../imagen_con/<?php echo($row['pdf_compro_ped']); ?>" width="400px" height="600px">
        </section>

<form method="post" name="form1" action="editar_pedido.php" class="form_contact">
            <h2>Estado de pedido</h2>
            <div class="user_info">

                <label for="names">Nombre del cliente</label>
                <input style="text-transform: uppercase;"   type="text"  value="<?php echo($row['nombre_cli']); ?> <?php echo($row['apellido_cli']); ?>" readonly>
                <input style="text-transform: uppercase; display: none;"  name="cliente_id_cli" type="text"  value="<?php echo($row['cliente_id_cli']); ?>">
                <input style="text-transform: uppercase; display: none;"  name="administrador_id_ad" type="text"  value="<?php echo($row['administrador_id_ad']); ?>">
                <input style="text-transform: uppercase; display: none;"  name="pdf_compro_ped" type="text"  value="<?php echo($row['pdf_compro_ped']); ?>">
                <label for="email">Fecha del pedido</label>
                <input style="text-transform: uppercase;"name="fecha_ped" type="text" value="<?php echo($row['fecha_ped']); ?>" readonly>

                <label for="email">Total </label>
                <input name="total_ped" type="text"  value="<?php echo($row['total_ped']); ?>" readonly >

                <label for="phone">Fecha del Comprobande</label>
                <input style="text-transform: uppercase;" name="fecha_compro_ped" type="text"  value="<?php echo($row['fecha_compro_ped']); ?>"readonly>

                <label for="nomes">Direcci&oacuten</label>
                 <input style="text-transform: uppercase;" name="direccion_entriega_ped" type="text" value="<?php echo($row['direccion_entriega_ped']); ?>" readonly>
                 <label for="nomes">Estado del pedido</label>
                 <input style="text-transform: uppercase;" type="text" value="<?php echo($row['estado_ped']); ?>" readonly>
                 <label for="nomes">Cambiar estado</label>
                 <select  name="estado_ped" type="text" style="margin: 10px;   border-left:4px solid rgb(208,101,3, .7); border-bottom:4px solid rgb(208,101,3, .7); height: 40px;">
                   <option value="0">Elejir estado de estado</option>
                   <option value="Pendiente">Pendiente</option>
                   <option value="Cancelado">Cancelado</option>
                   <option value="Aprodado">Aprodado</option>
                 </select>

                <input  style="display:none"  name="id_ped" type="text" value="<?php echo($row['id_ped']); ?>" readonly>

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



















































