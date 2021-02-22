<?php
require_once("../clases/cls_producto.php");
$obj_producto= new producto();
$row=$obj_producto->consultarid_pro($_GET['id_pro']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>La Victoria &mdash; Art&iacuteculos de cerámica</title>
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
           
            <li><a href="../contact.php">Contacto</a></li>
           
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="../loginres.php"><span class="icon icon-person"></span></a></li>
            <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">2</span>
                    </a>
                  </li> 
          </ul>
          </ul>
       
        </div>
      </nav>
    </header>

 
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">

          <div class="col-md-12 mb-0"><a class="col-me" href="../index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <a class="col-me"href="tienda.php">Tienda</a> <span class="mx-2 mb-0">/</span> <strong class="text-black1"><?php echo($row['nombre_pro']); ?></strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="../imagen_pro/<?php echo($row['imagen_pro']); ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo($row['nombre_pro']); ?></h2>
            <p>Descripci&oacuten: <?php echo($row['descripcion_pro']); ?></p>
            <p>Tama&ntildeo : <?php echo($row['tamanio_pro']); ?></p>
            <p>Promoci&oacuten: </p>
            <p class="mb-4"></p>
            <p><strong class="text-primary h4"> Precio: $ <?php echo($row['precio_pro']); ?></strong></p>
   
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <p><a href="cart.php" class="buy-now btn btn-sm btn-primary">Agregar al Carrito</a></p>

          </div>
        </div>
      </div>
    </div>



<!-- likes de facebook-->
<div class="facebook" style="padding: 30px;">
<center>
<div class="fb-like" data-href="http://localhost/alfareria_php_contrario/compras/producto1.php?id_pro=<?php echo($row['id_pro']);?>" data-width="200" data-layout="button" data-action="like" data-size="large" data-show-faces="true" ></div><hr style="width: 250px;">

<!-- Comentarios de facebook-->
<br>
<div class="fb-comments" data-href="http://localhost/alfareria_php_contrario/compras/producto1.php?id_pro=<?php echo($row['id_pro']);?>" data-width="700" data-numposts="5"></div>
</center>
</div>
<!-- Fin de comentarios de facebook-->

    <div class="site-section block-3 site-blocks-2 site-fo">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Mas Productos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="../images/tien2.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Medio pote</a></h3>
                    <p class="mb-0">Nuevo dise&ntildeo</p>
                    <p class="text-primary font-weight-bold">$15</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="../images/tien3.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Potet</a></h3>
                    <p class="mb-0">Nuevo dise&ntildeo</p>
                    <p class="text-primary font-weight-bold">$15,30</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="../images/tien4.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Tinaja</a></h3>
                    <p class="mb-0">Nuevo tama&ntildeo</p>
                    <p class="text-primary font-weight-bold">$62,40</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="../images/tien5.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Tinaja</a></h3>
                    <p class="mb-0">Nuevo color</p>
                    <p class="text-primary font-weight-bold">$40,55</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="../images/tien6.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Frecero</a></h3>
                    <p class="mb-0">Nuevo Producto</p>
                    <p class="text-primary font-weight-bold">$42,90</p>
                  </div>
                </div>
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