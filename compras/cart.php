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

$MM_restrictGoTo = "../loginres2.php";
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
        echo '<script>window.location="cart.php"</script>';  

      }

    }

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
  <script type="text/javascript">
    function multiplicar(){
      var a;
      a=document.getElementById("v1").value;
      var b;
      b=document.getElementById("v2").value;
      total= parseInt(a)*parseInt(b);
      document.getElementById("res").value=total;
    }
    function multiplicar1(){
      var a;
      a=document.getElementById("v3").value;
      var b;
      b=document.getElementById("v4").value;
      total= parseInt(a)*parseInt(b);
      document.getElementById("res1").value=total;
    }
    function sumar(){
      var a;
      a=document.getElementById("res").value;
      var b;
      b=document.getElementById("res1").value;
      total= parseInt(a)+parseInt(b);
      document.getElementById("res2").value=total;
    };
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
              <a href="../alfareria.php">Alfarer&iacuteas</a>
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
                <li><a href="../decoracion.php">DECORACI&oacuteN </a></li>

              </ul>
            </li>

            <!--  <li><a href="../contact.php">Contacto</a></li>-->

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
        <div class="col-md-12 mb-0"><a class="col-me" href="../index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <a class="col-me" href="../alfa_pro.php?id_al=<?php echo $values["item_alfareria_id_al"]; ?>">Alfarer&iacutea</a> <span class="mx-2 mb-0">/</span><strong class="text-black1">Carrito de compras</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table" style="clear:both">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Imagen</th>
                  <th class="product-name">Alfarer&iacutea</th>
                  <th class="product-name">Producto</th>
                  <th class="product-price">Precio</th>
                  <th class="product-quantity">Cantidad</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Eliminar</th>
                </tr>
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
                      <td>
                        <img src="../imagen_pro/<?php echo $values["item_imagen_pro"]; ?>" alt="Image" class="img-fluid"></td>
                        <td>
                          <h2 class="h5 text-black"><?php echo $values["item_alfareria"]; ?></h2></td>
                          <td> <h2 class="h5 text-black"><?php echo $values["item_nombre"]; ?></h2></td>
                          <td>$<?php echo $values["item_precio"]; ?></td>
                          <td><?php echo $values["item_cantidad"]; ?></td>
                          <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                          <td><a  class="btn btn-primary btn-sm"href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>  "><span>X</span></a></td>
                        </tr>
                        <?php


                        $total = $total + ($values["item_cantidad"] * $values["item_precio"]);

                      }
                      ?>
                      <tr>
                        <td colspan="5" align="right">Total</td>
                        <td align="right">$ <?php echo number_format($total, 2) ?></td>
                        <td></td>
                      </tr>
                      <?php
                    }else{
                      ?>
                      <tr>
                        <td colspan="7" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                      </tr>
                      <?php
                    }
                    ?>



                  </tbody>
                </table>
              </div>
            </form>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <a href="cart.php"><button class="btn btn-primary btn-sm btn-block">Actualizar</button></a>
                </div>
                <div class="col-md-6">
                  <?php if (!empty($total)): ?>
                    <a  href="../alfa_pro2.php?id_al=<?php echo $values["item_alfareria_id_al"]; ?>"><button class="btn btn-outline-primary btn-sm btn-block">
                    Continuar Comprando</button></a>
                    <?php else: ?>
                      <a  href="../alfareria.php"><button class="btn btn-outline-primary btn-sm btn-block">
                        Continuar Comprando</button></a>
                     <?php endif ?>

                   </div>
                 </div>

               </div>

               <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                  <div class="col-md-7">

                    <?php if (!empty($total)): ?>
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Total Compra</h3>
                        </div>
                      </div>

                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">
                           $<?php echo  number_format($total, 2)?>
                         </strong>
                       </div>
                     </div>
                     <div class="row">

                      <div class="col-md-12">
                        <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php?usuario_cli=<?php echo $_SESSION['MM_Username'];?>'">Proceso de Pedido</button>
                      </div>
                    </div>
                    <?php else: ?>

                    <?php endif ?>



                 <!--  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black">
                       $<?php echo  number_format($total, 2)?>
                     </strong>
                   </div>
                 </div>
                 <div class="row">

                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php?usuario_cli=<?php echo $_SESSION['MM_Username'];?>'">Proceso de Pedido</button>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
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