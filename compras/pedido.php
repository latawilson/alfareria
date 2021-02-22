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

$MM_restrictGoTo = "../loginre1.php";
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

  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>La Victoria &mdash; Art&iacuteculos de ceramica</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
  <link rel="stylesheet" href="../fonts/icomoon/style.css">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">


  <link rel="stylesheet" href="../css/aos.css">

  <link rel="stylesheet" href="../css/style.css">

</head>
<body>

  <div class="site-wrap">
   <header class="site-navbar" role="banner">
     <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="" class="site-block-top-search">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div >
              <a href="../index.php" class="js-logo-clone"><IMG src="../images/fon2.jpg"alt="Smiley face" width="425" ></a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>
                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div> 
          </div>

        </div>
      </div>
    </div> 
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
        <FONT FACE="Arial Rounded MT Bold" >
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="../index.php">inicio</a></li>
            <li class="has-children active">
              <a href="#">INFORMACI&oacuteN </a>
              <ul class="dropdown">
                <li><a href="../proposito.php">PROP&oacuteSITO </a></li>
                <li><a href="../historia.php">HISTORIA</a></li>
                <li><a href="../autorid.php">AUTORIDADES</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="#">Alfarer&iacuteas</a>
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
                <li><a href="../decoracion.php">DECORACI&oacuteN </a></li>

              </ul>
            </li>

            <!--<li><a href="../contact.php">Contacto</a></li>-->

            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="<?php echo $logoutAction ?>"><span class="icon icon-person"></span></a></li>
          </ul>
        </ul>

      </div>
    </nav>
  </header>


  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a class="col-me" href="../index.php">Inicio</a> <span class="mx-2 mb-0">/</span>  <span class="mx-2 mb-0">/</span><strong class="text-black1">Pedidos</strong></div>
      </div>
    </div>
  </div>
  <?php
  require_once ("../clases/cls_pedido.php");
  $obj_pedido = new pedido ();
  $resultped= $obj_pedido->consultarid_pedido($_GET['id_cli']);
  ?>
  <div class="site-section" style="margin-top: -50px; margin-left: 100px;">
    <div class="container">
     <h2 class="h3 mb-3 text-black">Pedidos realizados por el Cliente </h2>

 <div class="container">
      <div class="col-md-12">
         <div class="border m-2  p-2 rounded" role="alert">
          <center><a href="" ><i class="fa fa-user fa-fw"></i>  <strong  style="text-transform: uppercase;" ><?php echo $_SESSION['MM_Username'];?> </strong></a></center>
          <?php
          require_once("../blogueo.php");
          if($estado){
            ?><center>
              <a style="margin-left: auto;  " href="<?php echo $logoutAction ?>"><button class="btn btn-primary btn-lg ">Cerrar Sesi&oacuten</button></a>
            </center>
            <?php

          }else{
           ?>
           
           Soy Cliente! <a href="../loginres.php">Haga clic aqu&iacute </a> para ingresar
           
           <?php
         }
         ?>
         </div>
         
       </div>
     </div>

     <div class="row">



       <table  style="margin-left: 120px; background: #F5F3EE; border: solid 0.5px #F4F4F4 ;  "> 

        <tr style="background: #F4511E  ; color:#fff;">
          <td style="padding: 15px;">Nº Pedido</td>
          <td style="padding: 15px;">Cliente</td>
          <td style="padding: 15px;">Fecha comprobante</td>
          <td style="padding: 15px;">Fecha de pedido</td>
          <td style="padding: 15px;">Total </td>

          <td style="padding: 15px;">Estado</td>
          <td style="padding: 15px;">Acci&oacuten</td>
        </tr>
        <?php
        $estado1= "Aprodado";
        $estado2= "Pendiente";
        $estado3= "Cancelado";

        while($row= mysql_fetch_array($resultped))
        {    
          ?>  
          <tr style=" text-align: center; color: black;">
            <td style="padding: 5px;"><?php echo($row[2]); ?> </td>
            <td style="padding: 5px;"><?php echo($row['nombre_cli']); ?> <?php echo($row['apellido_cli']); ?></td>
            <td style="padding: 5px;"><?php echo($row['fecha_compro_ped']); ?></td>
            <td style="padding: 5px;"><?php echo($row['fecha_ped']); ?></td>
            <td style="padding: 5px;"><?php echo($row['total_ped']); ?></td>

            <!-- <td style="padding: 5px;">   <?php echo($row['estado_ped']); ?>  </td> -->
            <td style="padding: 5px;">  

              <?php if ($row['estado_ped'] == $estado1):  ?>

               <a  href="reporte_cliente.php?id_ped=<?php echo($row['id_ped']);?>&id_cli=<?php echo($row['cliente_id_cli']);?>" style="text-decoration: none; background: rgb(232,129,9, .7); padding: 5px; border-radius: 5px; color: white">Aprobado</a>
             <?php endif ?>
             <?php if ($row['estado_ped'] == $estado2):  ?>
              Pendiente
            <?php endif ?>
            <?php if ($row['estado_ped'] == $estado3):  ?>
              Cancelado
            <?php endif ?>
          </td>

          <td style="padding: 5px;">
            <a  href="pedido_reporte.php?id_ped=<?php echo($row['id_ped']);?>&id_cli=<?php echo($row['cliente_id_cli']);?>"  style="text-decoration: none; background: rgb(232,129,9, .7); padding: 5px; border-radius: 5px; color: white" >Ver</a>
            <a  href="editar_pe.php?id_ped=<?php echo($row['id_ped']);?>"  style="text-decoration: none; background: rgb(232,129,9, .7); padding: 5px; border-radius: 5px; color: white" >Subir</a>
          </td>
        </tr>
        <?php 
      }
      ?> 
    
    </table>


   </section>

 </div>




</div>
</div>

<footer class="site-footer border-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 mb-lg-0 ">
        <div class="row">
         <div class="col-md-6 col-lg-6">
                         <!-- <form action="#" method="post">
                            <label for="email_subscribe" class="footer-heading">Comentario</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                   <input type="text" class="form-control py-5" id="email_subscribe" placeholder="Comentario">
                  <input type="submit" class="btn btn-sm btn-primary" value="Enviar">
                </div>
              </form>-->
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="block-5 mb-5">
               <h3 class="footer-heading mb-4">Datos de Contacto</h3>
               <ul class="list-unstyled">
                <li class="address">E30 antes de la entrada al canton Pujili La Victoria, Barrio Centro, Calle Vicente Rocafuerte y Adolfo Jimenez</li>
                <li class="phone"><a href="tel://032224485">+3 268 263 9</a></li>
                <li class="email">lavictoria@gmail.com</li>
              </ul>

            </div>
          </div>

        </div>
      </div>
      <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.291737107317!2d-78.68970398572695!3d-0.9308921356031277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d48a5bcfaf886f%3A0xabdef50cc7b4c2f1!2sParroquia+Rural+La+victoria!5e0!3m2!1ses!2sec!4v1547433259292" width="450" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

     </div>
     <div class="pie2">
      <br>
      <p>
        Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> Jefferson Moreno  ! Edgar Silva by <a>UTC</a>
      </p>
    </div>       

  </div>
</footer>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/aos.js"></script>

<script src="../js/main.js"></script>

</body>
</html>