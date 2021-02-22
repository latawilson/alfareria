
<?php
session_start();
require_once '../clases/cls_conexion.php';
if(isset($_POST['agregar']))
{
    if(isset($_SESSION['add_carro']))
    {
        $item_array_id_cart = array_column($_SESSION['add_carro'],'item_id');
        if(!in_array($_GET['id'],$item_array_id_cart))
        {

            $count= count($_SESSION['add_carro']);
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_alfareria_id_al' => $_POST['hidden_alfareria_id_al'],
                'item_imagen_pro' => $_POST['hidden_imagen_pro'],
                'item_alfareria' => $_POST['hidden_alfareria'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_id_pro'    => $_POST['hidden_id_pro'],
                'item_cantidad'  => $_POST['cantidad'],
                
                  'item_subtotal'  => $_POST['subtotal'],
            );

            $_SESSION['add_carro'][$count]=$item_array;
        }
        else
            {
              echo '<script>alert("El Producto ya existe!");</script>';
            }
    }
    else
        {
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_imagen_pro' => $_POST['hidden_imagen_pro'],
                'item_alfareria_id_al' => $_POST['hidden_alfareria_id_al'],
                'item_alfareria' => $_POST['hidden_alfareria'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_id_pro'    => $_POST['hidden_id_pro'],
                'item_cantidad'  => $_POST['cantidad'],
              
                'item_subtotal'  => $_POST['subtotal'],
            );

            $_SESSION['add_carro'][0] = $item_array;
        }
}
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['item_id'] == $_GET['id'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El Producto Fue Eliminado!");</script>';
                
            }

        }

    }

}
?>

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

$MM_restrictGoTo = "../loginres.php";
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
$obj_cliente= new usuario();
$row=$obj_cliente->consultarid_alp($_GET['usuario_cli']);
?>
<!DOCTYPE html>
<?php

if (@!$_SESSION['MM_Username']) {

}
?>
<html lang="en">
  <head>
    <title>La Victoria &mdash; Realizar Pedido</title>
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
            <li><a href="../index.php">INICIO</a></li>
            <li class="has-children active">
              <a href="#">INFORMACI&oacuteN </a>
             <ul class="dropdown">
                <li><a href="../proposito.php">PROP&oacuteSITO </a></li>
                <li><a href="../historia.php">HISTORIA</a></li>
                <li><a href="../autorid.php">AUTORIDADES</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="../alfareria.php">Alfarer&iacuteas</a>
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
             <!--   <li><a href="../decoracion.php">DECORACI&oacuteN </a></li>-->

              </ul>
            </li>
        
            <!--<li><a href="../contact.php">Contacto</a></li>-->
           
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
       
           
          </ul>
          </ul>
       
        </div>
      </nav>
    </header>


    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a class="col-me"href="../index.php">Inicio</a><span class="mx-2 mb-0">/</span> <a class="col-me"href="../alfa_pro.php?id_al=<?php echo $values["item_alfareria_id_al"]; ?>">Alfarer&iacutea</a><span class="mx-2 mb-0">/</span> <a class="col-me" href="cart.php">Carrito de compras</a> <span class="mx-2 mb-0">/</span> <strong class="text-black1">Realizar pedido</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              <center><a href="" ><i class="fa fa-user fa-fw"></i>Bienvenido Usuario:  <strong  style="text-transform: uppercase;" ><?php echo $_SESSION['MM_Username'];?> </strong></a></center>
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
        <center>
          <div class="col-md-9">
            <form enctype="multipart/form-data" method="post" name="form1" action="agregarpedido.php?usuario_cli1=<?php echo $_SESSION['MM_Username'];?>">
            <div class="row mb-5">
              <div class="col-md-12">
                
                <h2 class="h3 mb-3 text-black">Datos del Pedido</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Nombre del cliente:</th>
                      <th style="text-transform: uppercase;" ><?php echo($row['nombre_cli']); ?>  <?php echo($row['apellido_cli']); ?></th>
                       <th style="display: none;"><input name="cliente_id_cli" type="text" id="names" value="<?php echo($row['id_cli']); ?>"></th>
                       <th style="display: none;"><input name="administrador_id_al" type="text" id="names" value="1"></th>
                    </thead>
                    <thead>
                      <th>Fecha de pedido:</th>
                      <th><label><?php echo date("m/d/Y"); ?></label></th>
                      <th style="display: none;"><input name="fecha_ped" type="text" id="names" value="<?php echo date("Y/m/d"); ?>"></th>
                      <th style="display: none;"><input name="estado_ped" type="text" id="names" value="pendiente"></th>
                    </thead>
                     <thead>
                      <th>Direcci&oacuten de entrega:</th>
                      <th><input style="text-transform: uppercase;"  name="direccion_entriega_ped" type="text" id="names" value="<?php echo($row['direccion_cli']); ?>"></th>
                    </thead>

                  </table>
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Sub-Total</th>
                    </thead>
                    <tbody>

            <?php
            if(!empty($_SESSION["add_carro"]))
            {
                $total = 0;
                foreach($_SESSION["add_carro"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td><?php echo $values["item_nombre"]; ?></td>
                        <td style="display: none;"><?php echo $values["item_id_pro"]; ?></td>
                        <td>$<?php echo $values["item_precio"]; ?></td>
                        <td><?php echo $values["item_cantidad"]; ?></td>
                        <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                        <input type="hidden" name="item[id_pro][]" value="<?php echo $values["item_id_pro"]; ?>">
                        <input type="hidden" name="item[cantidad][]" value="<?php echo $values["item_cantidad"]; ?>">
                        <input type="hidden" name="item[total][]" value="<?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?>">
                        <input type="hidden" name="item[subtotal][]" value="<?php echo number_format($values["item_subtotal"] - $values["item_cantidad"]);?>">


                       </tr>
                    <?php

                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);

                }
                ?>
                <tr>

                    <td class="text-black font-weight-bold">Total</td>
                    <td class="text-black">$ <?php echo number_format($total, 2); ?></td>
                    
                </tr>
                <?php
            }
                ?>

                    </tbody>
                  </table>
                  <input style="display: none;" type="text" name="total_ped" value="<?php echo number_format($total, 2); ?>"> 
                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Banco Pichincha</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Numero de cuenta: xxxxxxxxxx    Nombre: Luis</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Banco del pacifico</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">Numero de cuenta: xxxxxxxxxx    Nombre: Luis</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Cooperativa San Miguel de los Bancos</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0">Numero de cuenta: xxxxxxxxxx    Nombre: Luis</p>
                      </div>
                    </div>
                  </div>
                               <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Comprobante</h2>
                <div class="p-3 p-lg-5 border">
                  <input style="display: none;" name="fecha_compro_ped" type="text" id="names" value="<?php echo date("Y/m/d"); ?>">
                  <label for="c_code" class="text-black mb-3">Enviar una foto o pdf del comprobante del deposito.</label>
                  <div class="input-group w-75">
                    <input name="pdf_compro_ped" type="file" class="form-control" id="c_code" placeholder="Adjuntar Archivo" aria-label="Coupon Code" aria-describedby="button-addon2">
                   
                  </div>

                </div>
              </div>
            </div>

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit" >Guardar pedido</button>
                  </div>

                </div>
              </div>
            </from>
            </div> 
           </center>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

   <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0 ">
            <div class="row">
                 <div class="col-md-6 col-lg-6">
                        <!--  <form action="#" method="post">
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