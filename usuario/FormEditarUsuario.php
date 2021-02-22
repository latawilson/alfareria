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

$MM_restrictGoTo = "../loginres1.php";
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

<?php
require_once("../clases/cls_usuario.php");
$obj_alfareria= new usuario();
$row=$obj_alfareria->consultarid_cli($_GET['id_cli']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editar Usuario</title>
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
                <a href="index.php" class="js-logo-clone"><IMG src="../images/fon2.jpg"alt="Smiley face" width="425" ></a>
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
            <li><a href="../index.php">Inicio</a></li>
            <li class="has-children active">
              <a href="#">Informaci&oacuten</a>
              <ul class="dropdown">
                <li><a href="../proposito.php">Prop&oacutesito</a></li>
                <li><a href="../historia.php">Historia</a></li>
                <li><a href="../autorid.php">Autoridades</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="../alfareria.php">Alfarer&iacuteas</a>
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
                <li><a href="../decoracion.php?id_clas=2">Decoraci&oacuten</a></li>
              </ul>
            </li>
            
            
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="<?php echo $logoutAction ?>"><span class="icon icon-person"></span></a></li>
            
          </ul>
        </FONT>
      </div>
    </nav>
  </header>

  <div class="bg-light py-3">
    <div class="container">

      <div class="row">
        <div class="col-md-12 mb-0"><a class="col-me"href="../index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black1">Editar Informaci&oacuten</strong></div>
      </div>
    </div>
  </div>  

<!--     á -> &aacute;
&eacute -> &eacute;
&iacute -> &iacute;
&oacute -> &oacute;
ú -> &uacute;
&ntilde -> &ntilde;
-->
<div class="site-section">
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
 
 <div class="row">
  <div class="col-md-12">
    <h2 class="h3 mb-3 text-black" style=" margin-left: 480px; margin-right: -250px;" charset="utf-8"> INFORMACI&oacuteN</h2>
  </div>
  <div class="col-md-7">

    <form method="post" name="form1" action="editarUsuario.php"style=" margin-left: 250px; margin-right: -250px;"  >
      
      <div class="p-3 p-lg-5 border">
        <div class="form-group row">
          <div class="col-md-6">
            <label for="c_fname" class="text-black">Nombres <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="c_fname" name="nombre_cli" value="<?php echo($row['nombre_cli']); ?>" maxlength="15" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required>
          </div>
          <div class="col-md-6">
            <label for="c_lname" class="text-black">Apellidos <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="c_lname" name="apellido_cli" value="<?php echo($row['apellido_cli']); ?>" maxlength="15" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <label for="c_email" class="text-black">Usuario <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="c_email" name="usuario_cli" placeholder="" value="<?php echo($row['usuario_cli']); ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <label for="c_subject" class="text-black">Contrase&ntildea </label>
            <input type="password" class="form-control" id="c_subject" name="contrasenia_cli" value="<?php echo($row['contrasenia_cli']); ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label for="c_message" class="text-black">Tel&eacutefono </label>
            <input type="text" class="form-control" id="c_subject" name="telefono_cli" value="<?php echo($row['telefono_cli']); ?>"  maxlength="10" oninput="maxlengthNumber(this);" required onkeypress="return solonumeros(event)" onpaste="return false" required="">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <label for="c_message" class="text-black">Direcci&oacuten </label>
            <input type="text" class="form-control" id="c_subject" name="direccion_cli" value="<?php echo($row['direccion_cli']); ?>" maxlength="200"  required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
            <input name="id_cli" type="text" value="<?php echo($row['id_cli']); ?>"style="margin-bottom:-30px" >
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Editar Informacion" style="margin-top:-30px">
          </div>
        </div>
      </div>
    </form>
    
    <br>
  </div>

      <!--<div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">New York</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">London</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Canada</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>

          </div>
        </div>
      </div>
    </div>
  -->
  <footer class="site-footer border-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0 ">
          <div class="row">
           <div class="col-md-6 col-lg-6">
                       <!--   <form action="#" method="post">
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