<?php
require_once("clases/cls_alfareria.php");
$obj_alfareria= new alfareria();
$row=$obj_alfareria->consultarid_al($_GET['id_al']);
?>
<?php
session_start();
require_once 'clases/cls_conexion.php';
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

  
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GAD La Victoria &mdash; Alfarer&iacutea &mdash;Producto </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/producto1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style1.css"> 
   <script type="text/javascript">
      function openVentana(){
        $(".ventana").slideDown("slow"); 
      }
      function closeVentana(){
        $(".ventana").slideUp("fast"); 
      }
       function openCarrito(){
        $(".ventana1").slideDown("slow"); 
      }
      function closeCarrito(){
        $(".ventana1").slideUp("fast"); 
      }
  </script>



    <script type="text/javascript">
      function cargarProducto(a){
       // alert("buuuuu");
        var data; 
        $.ajax({
          url:'Promocion/producto1.php?id='+a.value,
          type: 'GET',
          data: data,
          success: function(data){
            //alert(" aki estyo ")
            $("#divProductos").html(data);
          }
      })
    } 
  </script>

    <style type="text/css">
      
      .ventana{
        width: 100%;
        height:100%;
        position: fixed;
        background-image: url(images/font-tienda.png);
        top: 0;
        left: 0; 
        display: none;
        z-index: 2;


        }
        .form{
          width: 1200px;
          height: 500px;
          background-color: #fff;
          top: 50%;
          left: 50%;
          position: absolute;
          z-index: 1;
          margin-left: -600px;
          margin-top: -200px;
          border: solid 2px red;
           

        }
        .cerrar-vent{
       margin-left: 1110px;
       font-size: 18px;
       padding-top: 50PX;
     }
     .informacion-pro{
      margin-left: 30px;
      width: 600px;
          
     }
     .facebook{
      margin-left: 320px;
      margin-top: -200px;
      height: 150px;

     }
     .fb-like{
      margin-left: 100px;
      margin-top: 30px;
      text-align: center;
     }

       .ventana1{
        width: 100%;
        height:100%;
        position: absolute;
        top: 0;
        left: 0; 
        display: none;
        z-index: 2;
        
        }
        .form2{
          width: 500px;
          background-color: #fff;
          top: 50%;
          left: 50%;
          position: absolute;
          z-index: 1;
          margin-left: 100.5px;
          margin-top: -180px;
         
          
        }

     table{
  background-color: white;
  text-align: left;
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}

th, td{
  padding: 5px;

}

thead{
  background-color: #ddd;
  border-bottom: solid 2px #000;
  color: black;
}

tr:nth-child(even){
  background-color: #ddd;
}

tr:hover td{
  opacity: 0.3;
  color: black;
}
a .eliminar{
  background: orange;
  color: white;
  border-radius:5px;
  padding: 5px;

}
a:hover{

  color: red;

 

}
    </style> 
      
  </head>

  <body onLoad="autoImgFlip();">

     <!--plugines de fb -->
      <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3"></script>
      <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3"></script>
    <!--Fin plugin de megusta fb -->


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
                <a href="index.php" class="js-logo-clone"><IMG src="images/fon2.jpg"alt="Smiley face" width="425" ></a>
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
            <li><a href="index.php">inicio</a></li>
            <li class="has-children active">
              <a href="#">INFORMACI&oacuteN </a>
             <ul class="dropdown">
                <li><a href="proposito.php">PROP&oacuteSITO </a></li>
                <li><a href="historia.php">HISTORIA</a></li>
                <li><a href="autorid.php">AUTORIDADES</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="alfareria.php">Alfarer&iacutea</a>
              
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
                <li><a href="decoracion.php?id_clas=2">DECORACI&oacuteN </a></li>
                 <li><a href="jardin.php?id_clas=1">JARDINER&iacuteA </a></li>
                  <li><a href="teja.php?id_clas=3">TEJA </a></li>
              </ul>
            </li>
         <!-- <li><a href="contact.php">Contacto</a></li>-->
           
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="loginres1.php"><span class="icon icon-person"></span></a></li>
            
                 <li>
              <a href="javascript:openCarrito(); javascript:closeVentana(); " class="site-cart">
                <span class="icon icon-shopping_cart"></span>
                <span class="count"></span>
              </a>
            </li> 

          </ul>
       
        </div>
      </nav>
    </header>
 <div class="ventana">

   <div class="form">
    <br>
     <strong><a class="cerrar-vent" href="javascript:closeVentana();">Cerrar</a></strong> 

    <div class="site-section">
     <div class="informacion-pro">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <form method="post" action="alfa_pro.php?id_al=<?php echo($row['id_al']);?>;alfa_pro.php?action=add&id=2" >
            <img id="imagen_pro" alt="Image" class="img-fluid" width="300"  height="300" style="border: solid 1px red;">
            <div class="fb-like" data-href="http://localhost/alfafinal/alfa_pro.php?id_pro=<?php echo($row['id_pro']);?>" data-width="200" data-layout="button" data-action="like" data-size="large" data-show-faces="true" ></div><hr style="width: 250px;margin-left: 20px; ">
          </div>
          <div class="col-md-6">  
            <h2 class="text-black" style="text-transform: uppercase;" id="nombre_pro"  > </h2>
            <hr>
            <p align="justify" id="descripcion_pro" > </p>
            <p id="tamanio_pro" type="text"></p><hr>
             <p class="text-primary h4 ">Precio:<strong class="text-primary h4" id="precio_pro" type="text"> </strong></p>
             
        </div>
        <div class="facebook">
          <!-- likes de facebook-->
<div class="facebook" style="padding: 30px;">

<!-- Comentarios de facebook-->
<br>
<div class="fb-comments" data-href="http://localhost/alfafinal/alfa_pro.php?id_pro=<?php echo($row['id_pro']);?>" data-width="400" data-numposts="5"></div>
</center>
</div>
<!-- Fin de comentarios de facebook-->
          
        </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>



 <div class="ventana1">
   <div class="form2">
<div style="clear:both"></div>

    <div class="table-responsive">
      <br>
        <table class="table table-bordered">
         <thead>
           <tr>
             <th colspan="4">CARRO DE COMPRAS</th>
             
             <th><a  href=" javascript:closeCarrito();">Cerrar</a> </th>
           </tr>
        
         </thead>

            <tr>
                <th width="40%">Producto</th>
                <th width="10%">Precio</th>
                <th width="20%">Cantidad</th>
                <th width="25%">Sub-Total</th>
                <th width="5%">Eliminar</th>
            </tr>
            <?php
            if(!empty($_SESSION["add_carro"]))
            {
                $total = 0;
                foreach($_SESSION["add_carro"] as $keys => $values)
                {
                    ?>
                    <tr>
                        <td style="text-transform: uppercase;"><?php echo $values["item_nombre"]; ?></td>
                        <td>$<?php echo $values["item_precio"]; ?></td>
                        <td><?php echo $values["item_cantidad"]; ?></td>
                        <td>$ <?php echo number_format($values["item_cantidad"] * $values["item_precio"], 2);?></td>
                        <td><a href="alfa_pro.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">X</span></a></td>
                    </tr>
                    <?php

                    $total = $total + ($values["item_cantidad"] * $values["item_precio"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td><a href="compras/cart.php"><span class="text-danger">Guardar</span></a></td>
                </tr>
                <?php
            }else{
                ?>
                <tr>
                    <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

  </div>
</div>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a class="col-me"href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black1"><?php echo($row['nombre_al']); ?></strong></div>
        </div>
      </div>
    </div>  

<br>
    <div  class="site-blocks-cover2 "style="background-image: url(images/fondo_productos.png);   " data-aos="fade">
      <div class="container">
           <FONT FACE="arial black"  SIZE=2 >
          <div class="hero-text">
       <h1 class="mb-2"  style="text-transform: uppercase;margin-left: 100px; color:#FF3300" ><?php echo($row['nombre_al']); ?></h1>
       <p class="mb-4"style="margin-left: 250px;"> <?php echo($row['descripcion_al']); ?> </p>
      </div>
      </FONT>
    </div>
    </div> 

    <div class="site-section " data-aos="fade">
       <div class=" site-section-heading text-center pt-4">
<h2> Nuestros Productos</h2>
          </div>
          
<?php
 require_once ("clases/cls_producto.php");
 $obj_producto = new producto ();
 $resultalfa= $obj_producto->consult($_GET['id_al']);
?>
      <div class="container" >
        <div class="row" >
          <div size="<?php echo($row['id_al']); ?>" >
            
                        <?php
                        while($row= mysql_fetch_array($resultalfa))
                        {
                        ?>  
           
            <div class="contenedor-peq "  style=" width: 21%;  border: solid 1px #FF3300; ">
             <div class="info1">
             <center>
              <p class="titulo" style="text-transform: uppercase;"><?php echo($row['nombre_pro']); ?></p> </center> 
            
            </div>
             <form method="post" action="alfa_pro.php?id_al=<?php echo($row['alfareria_id_al']);?>;alfa_pro.php?action=add&id=<?php echo $row['id_pro'] ; ?> javascript:openCarrito();  " >
              <?php

            ?>
            <div class="imagen" >
              <img src="imagen_pro/<?php echo($row['imagen_pro']); ?>" class="imagen" >
              <center>
                  <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input   name="cantidad" type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            </center>
            </div>
            <div class="info">

            <p class="titulo ">Precio: <?php echo($row['precio_pro']); ?> $</p>

                <input style="display: none" type="hidden" name="hidden_imagen_pro" value="<?php echo $row['imagen_pro'];?>" />
                <input style="display: none" type="hidden" name="hidden_alfareria_id_al" value="<?php echo $row['alfareria_id_al'];?>" />
                <input style="display: none" type="hidden" name="hidden_alfareria" value="<?php echo $row['nombre_al'];?>" />
                
                <input style="display: none" type="hidden" name="hidden_nombre" value="<?php echo $row['nombre_pro'];?>" />
                <input style="display: none" type="hidden" name="hidden_precio" value="<?php echo $row['precio_pro'];?>" />
                <input style="display: none" type="hidden" name="hidden_id_pro" value="<?php echo $row['id_pro'];?>" />

                <input  class="btn-sm" style="margin-left: 25px; padding:5px 15px; background-color:rgb(255,170,10, .8); font-size: .8em; color:white;border-radius: 10px;" onclick="openCarrito();" type="submit" name="agregar" value="Agregar">


                <a class=" btn-sm link2" href="javascript:openVentana(); javascript:closeCarrito();" id="<?php echo($row['id_pro']); ?>"   onclick="cargarDetalle(this)"   ><span class="" ></span>Detalle</a>
            </div>
          </div>
            </form>   
      <?php 
                        }
                        ?>  
          </div>  









                       
        <div class="container">
        <div class="row">

                       
                      


        <div class="site-section site-blocks-2">
          <div class=" site-section-heading text-center pt-4">

          </div>
      <div class="container">
        <div class="row">

          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/IMA1.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3 href="#">Artesan&iacutea</h3>
                 <span class="text-uppercase">En nuestra tienda virtual encontrará productos de artesan&iacutea para su hogar, negocio, etc.</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/IMA2.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3 href="#">Decoraci&oacuten</h3>
                 <span class="text-uppercase">Disponemos de una amplia variedad para la decoraci&oacuten de tu hogar o para regalos.</span>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/IMA3.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3 href="#">Jard&iacuten</h3>
                <span class="text-uppercase">En nuestro centro, dispondrá de todo tipo de art&iacuteculos para decorar su jard&iacuten.</span>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>


<div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Env&iacuteo gratis</h2>
              <p>A solo cant&oacuten Pujil&iacute, env&iacuteos  fuera  y dentro de la provincia se  cobrara el env&iacuteo </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            
          
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Atenci&oacuten al cliente</h2>
              <p>Para cualquier inquietud estamos  a sus &oacuterdenes  desde el horario 9:00 am a 5:00 pm </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    
   <footer class="site-footer border-top" style="background: #fff;">
      <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0 ">
            <div class="row">
                 <div class="col-md-6 col-lg-6">
                          <form action="#" method="post">
                            <label for="email_subscribe" class="footer-heading">Comentario</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                   <input type="text" class="form-control py-5" id="email_subscribe" placeholder="Comentario">
                  <input type="submit" class="btn btn-sm btn-primary" value="Enviar">
                </div>
              </form>
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
 <script src="js/jquery.min.js"></script>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
  <script src="js/main.js"></script>
<!-- cantidad--> 
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

    <script type="text/javascript">
      function cargarDetalle(img){
       //alert("jahsahd");
<?php
require_once("clases/cls_producto.php");
$obj_producto= new producto();
$result=$obj_producto->consultar();
$datos= array();
?>
    <?php
while($row= mysql_fetch_array($result))
{
?>
      if(img.id==<?php echo ($row['id_pro']);?>){
         //alert("hjsdkfgh");
          document.getElementById("imagen_pro").src="imagen_pro/<?php echo ($row['imagen_pro']);?>";
           $("#id_pro").html("<?php echo ($row['id_pro']);?>");
          $("#nombre_pro").html("<?php echo ($row['nombre_pro']);?>");
          $("#cantidad_pro").html("Cantidad existente:  <?php echo ($row['cantidad_pro']);?>");
          $("#tamanio_pro").html("Tama&ntildeo:  <?php echo ($row['tamanio_pro']);?>");
          $("#descripcion_pro").html("Descripci&oacuten: <?php echo ($row['descripcion_pro']);?>");
          $("#precio_pro").html("  <?php echo ($row['precio_pro']);?>  $");        
    }
<?php 
}
?>
 
    
  }

    
    </script>
      

  </body>
</html>