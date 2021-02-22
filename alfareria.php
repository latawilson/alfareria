<!DOCTYPE html>
<html lang="en">
<head>
  <title>GAD La Victoria &mdash; Alfarer&iacuteas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css"> 
  <script language="javascript"> 
   step=0; 
   function autoImgFlip() { 
     if (step < 3) {step++;} 
     else {step=0;} 
     if (step==0) 
       {a.src="images/alfare2.jpg";}
     if (step==1) 
      {a.src="images/alfare2.jpg";} 
    setTimeout("autoImgFlip()", 3000); 
    if (step==2) 
     {a.src="images/redon2.jpg";} 
   if (step==0) 
     {a.src="images/alfare1.jpg";}
 }
 
</script> 

<style type="text/css">
  #alfareria{
    font-size: 18px;
    padding: 30px;


  }




</style>
</head>
<body onLoad="autoImgFlip();">
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
              <a href="alfareria.php">Alfarer&iacuteas</a>
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
            
          </ul>

        </div>
      </nav>
    </header>


    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a class="col-me"href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black1">Alfarer&iacuteas </strong></div>
        </div>
      </div>
    </div>  

    <br>
    <!-- <div> -->
     <!--      <img src="images/redon1.jpg"  id="a" alt="Smiley face" width="100%" height="100%" > -->
     <!--       <div class="container"> -->
       <!-- <FONT FACE="arial black"  SIZE=1.5> -->
        <!--           <div class="hero-text"> -->
         <!-- <h2 class="mb-2" style="color: #fff;"> Alfarer&iacuteas del GAD La Victoria</h2> -->
         <!-- <h2> class="mb-4">La mejor artesan&iacutea para su hogar lo encuentrara ak&iacute </p> -->
          <!--       </div> -->
        </FONT>
        <!--     </div> -->
        <!-- </div> -->



        <div class="site-section site-blocks-2">
          <div class=" site-section-heading text-center pt-4">
            <h2> Nuestras Alfarer&iacuteas</h2>
          </div>
          <?php
          require_once("clases/cls_alfareria.php");
          $obj_alfareria= new alfareria();
          $result=$obj_alfareria->consultar();
          $datos= array();
          ?>
          <div class="container">

            <div class="row">
              <?php
              while($row= mysql_fetch_array($result))
              {
                ?>  
                <div id="alfareria" class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="">
                  <a class="block-2-item" href="alfa_pro2.php?id_al=<?php echo($row['id_al']);?>">
                    <figure class="image" style="border-radius: 20px;">
                      <img src="imagen_alfa/<?php echo($row['imagen_al']); ?>" width="600" height="400"  >
                    </figure>
                    <div class="text">
                      <h3 href="alfa_pro2.php?id_al=<?php echo($row['id_al']);?>"><?php echo($row['nombre_al']); ?></h3>
                      <span class="text-uppercase"><?php echo($row['descripcion_al']); ?></span>
                    </div>
                  </a>
                </div>

                <?php 
              }
              ?>
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
                  <p>A solo cant&oacuten Pujil&iacute, env&iacuteos  fuera  y dentro de la provincia se  cobrara el env&iacuteo  </p>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1549038025859!6m8!1m7!1s7_xKUZW9nBpo8ZHMzIwJkw!2m2!1d-0.921031064427052!2d-78.69345090657485!3f0!4f0!5f1.1924812503605782" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

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

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

</body>
</html>