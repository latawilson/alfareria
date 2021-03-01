<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesi&oacuten Administrador|La Victoria</title>
    <link rel="stylesheet" href="css/sesion.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

    <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="logo">
          <center><IMG src="images/logue.png"alt="Smiley face" height="130" width="115"></center>
      </div>
      <div class="site-navbar" role="banner">
       <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <FONT FACE="Arial Rounded MT Bold" >
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="index.php">inicio</a></li>
            <li class="has-children active">
              <a href="#">informaci&oacuten</a>
             <ul class="dropdown">
                <li><a href="proposito.php">Proposito</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li><a href="autorid.php">Autoridades</a></li>
              </ul>
            </li>
            <li ><a href="alfareria.php">ALFARER&iacuteAS</a>
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
               <li><a href="decoracion.php?id_clas=2">DECORACI&oacuteN </a></li>
                 <li><a href="jardin.php?id_clas=1">JARDINER&iacuteA </a></li>
                  <li><a href="teja.php?id_clas=3">TEJA </a></li>
              </ul>
            </li>
                   
          </ul>
       
        </div>
      </nav>
</div>
    <div class="contenedor-form">
        <div class="toggle">
           
        </div>
        
         <div class="formulario">
            <h2>Iniciar Sesi&oacuten</h2>
            <form id="form1" name="form1" method="post" action="v_log1.php">
                <input id="sprytextfield1"  name="txt_usuario"type="text" placeholder="Usuario" required>
                <input id="sprypassword1" name="txt_clave" type="password" placeholder="Contraseña" required>
                <input name="btn_ingresar" type="submit" value="Iniciar Sesion">
            </form>
        </div>
        

        <div class="reset-password">
            <a href="#">Olvid&eacute mi Contrase&ntildea?</a>
        </div>
    </div>

    <footer>
     <div class="foot">
          
            <p>
                        Copyright &copy; All rights reserved | Alfarer&iacuteas La Victoria
            
            </p>
      
          
        </div>
    </footer>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</html>