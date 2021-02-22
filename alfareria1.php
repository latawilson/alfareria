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
           {a.src="images/vi1.jpg";} 
         if (step==0) 
           {a.src="images/alfare1.jpg";}
        }
 
       </script> 
     <script type="text/javascript">
      function cargarProducto(a){
        //alert("buuuuu");
        var data; 
        $.ajax({
          url:'Promocion/producto.php?id='+a.value,
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
        #alfareria{
          font-size: 18px;
          padding: 30px;


        }
         



       </style>

        }
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
              <a href="#">Alfarer&iacuteas</a>
            
                                <select class="dropdown"  onchange="cargarProducto(this)" name="alfareria_id_al" type="text" style="margin: 10px;   border-left:4px solid rgb(208,101,3, .7);
                   border-bottom:4px solid rgb(208,101,3, .7); height: 40px;"  >
                   <option  value="0"> Todas las Alfarer&iacuteas</option>
<?php
require_once("clases/cls_alfareria.php");
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
           
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">

                <li><a href="decoracion.php">DECORACI&oacuteN </a></li>
                <li><a href="jardin.php">JARDINER&iacuteA </a></li>
              </ul>
            </li>
            <li><a href="compras/tienda.php">tienda </a></li>
            <li><a href="contact.php">Contacto</a></li>
           
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="loginres.php"><span class="icon icon-person"></span></a></li>
            
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
    <div class="site-blocks-cover1" data-aos="fade">
      <img src="images/alfare1.jpg"  id="a" alt="Smiley face" width="100%" height="100%" >
      <div class="container">
           <FONT FACE="arial black"  SIZE=1.5>
          <div class="hero-text">
       <h2 class="mb-2" style="color: #fff;"> Alfarer&iacuteas del GAD La Victoria</h2>
     <p class="mb-4">La mejor artesan&iacutea para su hogar lo encuentrara ak&iacute </p>
      </div>
      </FONT>
    </div>
    </div>

   

        <div class="site-section site-blocks-2">
        <div class=" site-section-heading text-center pt-4">
<h2> Nuestras Productos</h2>
          </div>

      <div id="divProductos"  class="container" style="">
<?php
require_once("clases/cls_producto1.php");
$obj_producto= new producto();
$result=$obj_producto->consultar();
$datos= array();
?>
        <div class="row" name="producto_id_pro" type="text">
<?php
while($row= mysql_fetch_array($result))
{
?>  

          
<?php 
}
?>
        </div>
      </div>
    </div>



   
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